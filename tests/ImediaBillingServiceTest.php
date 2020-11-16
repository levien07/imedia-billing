<?php

namespace OneSite\Imedia\Billing;


use PHPUnit\Framework\TestCase;

/**
 * Class ImediaBillingServiceTest
 * @package OneSite\Imedia\Billing
 */
class ImediaBillingServiceTest extends TestCase
{

    private $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new ImediaBillingService();
    }

    /**
     *
     */
    public function tearDown(): void
    {
        $this->service = null;

        parent::tearDown();
    }

    public function testGetBill()
    {
        $areaCode = 'AGG';
        $serviceCode = 'EVN';
        $data = $this->service->getBill([
            'service_code' => $this->service->getServiceCode($serviceCode, $areaCode),
            'billing_code' => $this->service->getRandomBillCode($areaCode, 'SUCCESS'),
            'partner_trans_id' => randomStringImedia(),
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testPayBill()
    {
        $data = $this->service->payBill([
            'service_code' => 'EVN',
            'billing_code' => 'PB12MYE50RO1JB_S',
            'reference_code' => 'PB12MYE50RO1JB_S-68386717-ffTsCayKV2',
            'amount' => 100000,
            'partner_trans_id' => 'ffTsCayKV2',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testCheckPay()
    {
        $data = $this->service->checkPay([
            'original_trans_id' => 'ffTsCayKV2',
            'partner_trans_id' => 'ffTsCayKV2',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testBalance()
    {
        $data = $this->service->checkBalance([
            'partner_trans_id' => 'QZ8Yi6a9L4',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testResponseCode()
    {
        $data = $this->service->getResponseCode();
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }
    public function testServices()
    {
        $params=['EVN','VNPT_','NHCM','TOYOTA'];
        $data = $this->service->getService($params);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

}
