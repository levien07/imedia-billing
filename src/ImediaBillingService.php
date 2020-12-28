<?php

namespace NinePay\Imedia\Billing;

use GuzzleHttp\Client;
use NinePay\Imedia\Billing\Contracts\Area;
use NinePay\Imedia\Billing\Contracts\DataMap;
use NinePay\Imedia\Billing\Contracts\Logo;
use NinePay\Imedia\Billing\Contracts\Response;
use NinePay\Imedia\Billing\Contracts\Service;

/**
 * Class ImediaBillingService
 * @package OneSite\Imedia\Billing
 */
class ImediaBillingService implements ImediaBillingInterface
{
    const SUCCESS = 'SUCCESS';
    const PENDING = 'PENDING';
    const FAIL = 'FAIL';
    const PATH_PAYMENT = '/v1/services/paybill';
    const PATH_RESPONSE = '/v1/services/error_code';
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


    private $pathPayment;

    private $pathResponse;

    /**
     * @var array|mixed|null
     */

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = rtrim(config('imedia.billing.api_url'), '/');
        $this->userId = config('imedia.billing.user_id');
        $this->userPassword = config('imedia.billing.user_password');
        $this->npayPrivateKey = config('imedia.billing.9pay_private_key');
        $this->npayPublicKey = config('imedia.billing.9pay_public_key');
        $this->imediaPublicKey = config('imedia.billing.imedia_public_key');

        $this->pathPayment = ltrim(config('imedia.billing.path_payment'), '/');
        $this->pathResponse = ltrim(config('imedia.billing.path_response'), '/');

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

    /**
     * @var int
     */
    private $checkBalanceCode = 1013;
    /**
     * @var int
     */
    private $checkPayCode = 1011;
    /**
     * @var int
     */
    private $payBillCode = 1010;
    /**
     * @var int
     */
    private $getBillCode = 1009;

    /**
     * @param $params
     * @return array|array[]|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function getBill($params)
    {
        $serviceCode = !empty($params['service_code']) ? $params['service_code'] : '';
        $billingCode = !empty($params['billing_code']) ? $params['billing_code'] : '';
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $params = [
            'pr_code' => $this->getBillCode,
            'message' => [
                'username' => $this->getUserId(),
                'password' => $this->getUserPassword(),
                'service_code' => $serviceCode,
                'billing_code' => $billingCode,
                'partner_trans_id' => $transId,
            ]
        ];
        $params['message']['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl() .'/'.$this->pathPayment, [
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
            'data' => $this->processData($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    /**
     * @param $params
     * @return array|array[]|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function payBill($params)
    {
        $serviceCode = !empty($params['service_code']) ? $params['service_code'] : '';
        $billingCode = !empty($params['billing_code']) ? $params['billing_code'] : '';
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $reference_code = !empty($params['reference_code']) ? $params['reference_code'] : '';
        $amount = !empty($params['amount']) ? $params['amount'] : 0;
        $params = [
            'pr_code' => $this->payBillCode,
            'message' => [
                'username' => $this->getUserId(),
                'password' => $this->getUserPassword(),
                'service_code' => $serviceCode,
                'billing_code' => $billingCode,
                'partner_trans_id' => $transId,
                'reference_code' => $reference_code,
                'amount' => $amount
            ]
        ];
        $params['message']['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl().'/'.$this->pathPayment, [
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
            'data' => $this->processData($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    /**
     * @param $params
     * @return array|array[]|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkPay($params)
    {
        $originalTransId = !empty($params['original_trans_id']) ? $params['original_trans_id'] : '';
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $params = [
            'pr_code' => $this->checkPayCode,
            'message' => [
                'username' => $this->getUserId(),
                'password' => $this->getUserPassword(),
                'original_trans_id' => $originalTransId,
                'partner_trans_id' => $transId,
            ]
        ];
        $params['message']['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl().'/'.$this->pathPayment, [
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
            'data' => $this->processData($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    /**
     * @param $params
     * @return array|array[]|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkBalance($params)
    {
        $transId = !empty($params['partner_trans_id']) ? $params['partner_trans_id'] : '';
        $params = [
            'pr_code' => $this->checkBalanceCode,
            'message' => [
                'username' => $this->getUserId(),
                'password' => $this->getUserPassword(),
                'partner_trans_id' => $transId,
            ]
        ];
        $params['message']['authkey'] = $this->getSignature($params);
        $response = $this->getClient()->request('POST', $this->getApiUrl().'/'.$this->pathPayment, [
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
            'data' => $this->processData($response->getBody()->getContents()),
            'meta_data' => [
                'params' => $params,
                'headers' => $this->getHeaders()
            ]
        ];
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getResponseCode()
    {
        $response = $this->getClient()->request('GET', $this->getApiUrl().'/'.$this->pathResponse, [
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

    /**
     * @param array $params
     * @return array
     */
    public function getService($params=[])
    {
        return ['data' => json_encode(Service::listServices($params))];
    }

    /**
     * @param string $serviceCode
     * @return array
     */
    public function getLogoService($serviceCode = '')
    {
        return ['data' => json_encode(Logo::getLogoService($serviceCode))];
    }

    /**
     * @return string[]
     */
    private function getHeaders()
    {
        return [
            'Authorization' => "Basic " . base64_encode($this->getUserId() . ":" . $this->getUserPassword()),
            "Content-Type" => "application/json"
        ];
    }

    /**
     * @param $area
     * @param $status
     * @return string
     */
    public function getRandomBillCode($area, $status)
    {
        $areaCode = DataMap::readMapCode($area);
        switch ($status) {
            case self::SUCCESS:
                return $areaCode . randomStringImedia() . '_S';
                break;
            case self::FAIL:
                return $areaCode . randomStringImedia() . '_F';
                break;
            case self::PENDING:
                return $areaCode . randomStringImedia() . '_P';
                break;
        }
    }

    /**
     * @param $code
     * @param $area
     * @return string
     */
    public function getServiceCode($code, $area)
    {
        if(in_array($code,['VNPT_','ADS_VPNT_','TV_VNPT_']))
        {
            return $code . $area;
        }
        return $code;
    }

    public function listArea()
    {
        return Area::listArea();
    }

    public function getServiceName($code)
    {
        return Service::getServiceName($code);
    }

    /**
     * @param array $params
     * @return string
     */
    private function getSignature(array $params)
    {
        switch ($params['pr_code']) {
            case $this->getBillCode:
                $signdata = 'get_bill' . '#' . $params['message']['username'] . '#' . $params['message']['password'] . '#' . $params['message']['partner_trans_id'] . '#' . $params['message']['billing_code'] . '#' . $params['message']['service_code'];
                break;
            case $this->payBillCode:
                $signdata = 'pay_bill' . '#' . $params['message']['username'] . '#' . $params['message']['password'] . '#' . $params['message']['partner_trans_id'] . '#' . $params['message']['billing_code'] . '#' . $params['message']['service_code'] . '#' . $params['message']['reference_code'] . '#' . $params['message']['amount'];
                break;
            case $this->checkPayCode:
                $signdata = 'check_pay' . '#' . $params['message']['username'] . '#' . $params['message']['password'] . '#' . $params['message']['partner_trans_id'] . '#' . $params['message']['original_trans_id'];
                break;
            case $this->checkBalanceCode:
                $signdata = 'check_balance' . '#' . $params['message']['username'] . '#' . $params['message']['password'] . '#' . $params['message']['partner_trans_id'];
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

    /**
     * @param $return
     * @return false|string
     */
    private function processData($return)
    {
        $data=json_decode($return);
        if (isset($data->data->final_status)) {
            $data->return_message = Response::readMessageFromResponseCode($data->data->final_status);
        }
        return json_encode($data);
    }

}
