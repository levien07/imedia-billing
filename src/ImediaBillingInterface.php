<?php


namespace NinePay\Imedia\Billing;


/**
 * Interface NapasBillingInterface
 * @package OneSite\Napas\Billing
 */
interface ImediaBillingInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function getBill($params);

    /**
     * @param $params
     * @return mixed
     */
    public function payBill($params);


    /**
     * @param $params
     * @return mixed
     */
    public function checkPay($params);

    /**
     * @param $params
     * @return mixed
     */
    public function checkBalance($params);

    /**
     * @return mixed
     */
    public function getResponseCode();

    /**
     * @param $params
     * @return mixed
     */
    public function getService($params);

    public function listArea();


}
