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
    const SUCCESS = 'SUCCESS';
    const PENDING = 'PENDING';
    const FAIL = 'FAIL';

    const PATH_PAYMENT = '/v1/sandbox/services/paybill';
    const PATH_RESPONSE = '/v1/sandbox/services/error_code';
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
        $response = $this->getClient()->request('POST', $this->getApiUrl() . self::PATH_PAYMENT, [
            'http_errors' => false,
            'verify' => false,
            'headers' => $this->getHeaders(),
            'body' => json_encode($params)
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            return [
                'error' => [
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                    'status_code' => $statusCode
                ],
                'meta_data' => [
                    'params' => $params,
                    'headers' => $this->getHeaders()
                ]
            ];
        }
        return [
            'data' => json_encode($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    public function payBill($params)
    {
        $serviceCode = !empty($params['service_code']) ? $params['service_code'] : '';
        $billingCode = !empty($params['billing_code']) ? $params['billing_code'] : '';
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $reference_code = !empty($params['reference_code']) ? $params['reference_code'] : '';
        $amount = !empty($params['amount']) ? $params['amount'] : 0;
        $params = [
            'pr_code' => $this->payBillCode,
            'username' => $this->getUserId(),
            'password' => $this->getUserPassword(),
            'service_code' => $serviceCode,
            'billing_code' => $billingCode,
            'partner_trans_id' => $transId,
            'reference_code' => $reference_code,
            'amount' =>$amount,
        ];
        $params['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl() . self::PATH_PAYMENT, [
            'http_errors' => false,
            'verify' => false,
            'headers' => $this->getHeaders(),
            'body' => json_encode($params)
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            return [
                'error' => [
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                    'status_code' => $statusCode
                ],
                'meta_data' => [
                    'params' => $params,
                    'headers' => $this->getHeaders()
                ]
            ];
        }
        return [
            'data' => json_encode($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    public function checkPay($params)
    {
        $originalTransId = !empty($params['original_trans_id']) ? $params['original_trans_id'] : '';
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $params = [
            'pr_code' => $this->checkPayCode,
            'username' => $this->getUserId(),
            'password' => $this->getUserPassword(),
            'original_trans_id' => $originalTransId,
            'partner_trans_id' => $transId,
        ];
        $params['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl() . self::PATH_PAYMENT, [
            'http_errors' => false,
            'verify' => false,
            'headers' => $this->getHeaders(),
            'body' => json_encode($params)
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            return [
                'error' => [
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                    'status_code' => $statusCode
                ],
                'meta_data' => [
                    'params' => $params,
                    'headers' => $this->getHeaders()
                ]
            ];
        }
        return [
            'data' => json_encode($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    public function checkBalance($params)
    {
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $params = [
            'pr_code' => $this->checkBalanceCode,
            'username' => $this->getUserId(),
            'password' => $this->getUserPassword(),
            'partner_trans_id' => $transId,
        ];
        $params['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl() . self::PATH_PAYMENT, [
            'http_errors' => false,
            'verify' => false,
            'headers' => $this->getHeaders(),
            'body' => json_encode($params)
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            return [
                'error' => [
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                    'status_code' => $statusCode
                ],
                'meta_data' => [
                    'params' => $params,
                    'headers' => $this->getHeaders()
                ]
            ];
        }
        return [
            'data' => json_encode($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    public function getResponseCode()
    {
        $response = $this->getClient()->request('GET', $this->getApiUrl() . self::PATH_RESPONSE, [
            'http_errors' => false,
            'verify' => false,
            'headers' => ["Content-Type" => "application/json"],
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            return [
                'error' => [
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                    'status_code' => $statusCode
                ],
                'meta_data' => [
                    'headers' => $this->getHeaders()
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

    public function getRandomBillCode($status)
    {
        switch ($status) {
            case self::SUCCESS:
                return randomStringImedia() . '_S';
                break;
            case self::FAIL:
                return randomStringImedia() . '_F';
                break;
            case self::PENDING:
                return randomStringImedia() . '_P';
                break;
        }
    }

    private function getSignature(array $params)
    {
        switch ($params['pr_code']) {
            case $this->getBillCode:
                $signdata = 'get_bill' . '#' . $params['username'] . '#' . $params['password'] . '#' . $params['partner_trans_id'] . '#' . $params['billing_code'] . '#' . $params['service_code'];
                break;
            case $this->payBillCode:
                $signdata = 'pay_bill' . '#' . $params['username'] . '#' . $params['password'] . '#' . $params['partner_trans_id'] . '#' . $params['billing_code'] . '#' . $params['service_code'] . '#' . $params['reference_code'] . '#' . $params['amount'];
                break;
            case $this->checkPayCode:
                $signdata = 'check_pay' . '#' . $params['username'] . '#' . $params['password'] . '#' . $params['partner_trans_id'] . '#' . $params['original_trans_id'];
                break;
            case $this->checkBalanceCode:
                $signdata = 'check_balance' . '#' . $params['username'] . '#' . $params['password'] . '#' . $params['partner_trans_id'];
                break;
            default:
                $signdata = '';
                break;
        }
        $privateKey = file_get_contents($this->getNpayPrivateKey());
        $binary_signature = "";
        openssl_sign($signdata, $binary_signature, $privateKey, "SHA256");
        return base64_encode($binary_signature);
    }

}
