<?php

namespace OneSite\Imedia\Billing;

use GuzzleHttp\Client;
use OneSite\Imedia\Billing\Contracts\Response;

/**
 * Class ImediaBillingService
 * @package OneSite\Imedia\Billing
 */
class ImediaBillingService implements ImediaBillingInterface
{
    const SUCCESS='SUCCESS';
    const PENDING='PENDING';
    const FAIL='FAIL';
    /**
     * @var Client
     */
    private $client;

    /**
     * @var array|mixed|null
     */
    private $apiUrl;
    /**
     * @var array|mixed|null
     */
    private $userId;
    /**
     * @var array|mixed|null
     */
    private $userPassword;
    /**
     * @var array|mixed|null
     */
    private $npayPrivateKey;
    /**
     * @var array|mixed|null
     */
    private $npayPublicKey;
    private $imediaPublicKey;

    /**
     * @var array|mixed|null
     */

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = config('imedia.billing.api_url');
        $this->userId = config('imedia.billing.user_id');
        $this->userPassword = config('imedia.billing.user_password');
        $this->npayPrivateKey = config('imedia.billing.9pay_private_key');
        $this->npayPublicKey = config('imedia.billing.9pay_public_key');
        $this->imediaPublicKey = config('imedia.billing.imedia_public_key');

    }

    /**
     * @return array|mixed|null
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return array|mixed|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return array|mixed|null
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @return array|mixed|null
     */
    public function getNpayPrivateKey()
    {
        return $this->npayPrivateKey;
    }
    public function getImediaPublicKey()
    {
        return $this->imediaPublicKey;
    }
    private $checkBalanceCode = 1013;

    private $checkPayCode = 1011;

    private $payBillCode = 1010;

    private $getBillCode = 1009;

    /**
     * @return array|mixed|null
     */

    public function getNpayPublicKey()
    {
        return $this->npayPublicKey;
    }

    public function getAmount($amount)
    {
        return str_pad($amount, 10, "0", STR_PAD_LEFT) . '00';
    }

    public function getBill($params)
    {
        $serviceCode = !empty($params['service_code']) ? $params['service_code'] : '';
        $billingCode = !empty($params['billing_code']) ? $params['billing_code'] : '';
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $params = [
            'pr_code' => $this->getBillCode,
            'username' => $this->getUserId(),
            'password' => $this->getUserPassword(),
            'service_code' => $serviceCode,
            'billing_code' => $billingCode,
            'partner_trans_id' => $transId,
        ];
        $params['authkey'] = $this->getSignature($params);
        print_r($params);die;
    }

    public function payBill($params)
    {

    }

    public function cancelPay($params)
    {

    }

    public function checkPay($params)
    {

    }

    public function checkBalance($params)
    {

    }

    public function getResponseCode()
    {
        $response = $this->getClient()->request('GET', $this->getApiUrl() . "/v1/sandbox/services/error_code", [
            'http_errors' => false,
            'verify' => false,
            'headers' => ["Content-Type" => "application/json"],
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            $result = json_decode($response->getBody()->getContents());
            return [
                'error' => [
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                    'status_code' => Response::readMessageFromResponseCode($result->code)
                ]
            ];
        }
        return [
            'data' => json_encode($response->getBody()->getContents()),
        ];
    }

    private function getHeaders()
    {
        return [
            'Authorization' => "Basic " . base64_encode($this->getUserId() . ":" . $this->getUserPassword()),
            "Content-Type" => "application/json"
        ];
    }

    public  function getRandomBillCode($status)
    {
        switch ($status) {
            case self::SUCCESS:
                return randomStringImedia().'_S';
                break;
            case self::FAIL:
                return randomStringImedia().'_F';
                break;
            case self::PENDING:
                return randomStringImedia().'_P';
                break;
        }
    }

    private function getSignature(array $params)
    {
        $signdata='';
        switch ($params['pr_code']) {
            case $this->getBillCode:
                $signdata='get_bill'.'#'.$params['username'].'#'.$params['password'].'#'.$params['partner_trans_id'].'#'.$params['billing_code'].'#'.$params['service_code'];
                break;
            case $this->payBillCode:
                $signdata='pay_bill'.'#'.$params['username'].'#'.$params['password'].'#'.$params['partner_trans_id'].'#'.$params['billing_code'].'#'.$params['service_code'].'#'.$params['reference_code'].'#'.$params['amount'];
                break;
            case $this->checkPayCode:
                $signdata='check_pay'.'#'.$params['username'].'#'.$params['password'].'#'.$params['partner_trans_id'].'#'.$params['original_trans_id'];
                break;
            case $this->checkBalanceCode:
                $signdata='check_balance'.'#'.$params['username'].'#'.$params['password'].'#'.$params['partner_trans_id'];
                break;
        }
        $privateKey = file_get_contents($this->getImediaPublicKey());
        $privateKeyId = openssl_pkey_get_private($privateKey);
        openssl_sign($signdata, $binarySignature, $privateKeyId, OPENSSL_ALGO_MD5);
        return base64_encode($binarySignature);
    }

}
