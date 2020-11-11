<?php


namespace OneSite\Napas\Billing;


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
    public function cancelPay($params);

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

}
