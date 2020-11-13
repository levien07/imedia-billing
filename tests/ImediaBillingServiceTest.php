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
            'service_code' => 'ENV',
            'billing_code' => 'PA05PB12YX2JK2JMSY_S-2787305-kygaClXSWS',
            'reference_code' => 'EVN-HNI',
            'amount' => 100000,
            'partner_trans_id' => 'kygaClXSWS',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testCheckPay()
    {
        $data = $this->service->checkPay([
            'original_trans_id' => '',
            'partner_trans_id' => '',
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }

    public function testBalance()
    {
        $data = $this->service->checkBalance([
            'partner_trans_id' => '',
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


}
