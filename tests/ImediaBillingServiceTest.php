<?php

namespace NinePay\Imedia\Billing;


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
        $serviceCode = 'VNPT_';
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
            'billing_code' => 'PB12Lo2HJq1tSY_S',
            'reference_code' => 'PB12LO2HJQ1TSY_S-69665033-ZFEvJ8ukHC',
            'amount' => 100000,
            'partner_trans_id' => 'ZFEvJ8ukHC',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testCheckPay()
    {
        $data = $this->service->checkPay([
            'original_trans_id' => 'ZFEvJ8ukHC',
            'partner_trans_id' => 'ZFEvJ8ukHC',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testBalance()
    {
        $data = $this->service->checkBalance([
            'partner_trans_id' => 'ZFEvJ8ukHC',
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
        $data = $this->service->getService();
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }
    public function testArea()
    {
        $data = $this->service->listArea();
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }
}
