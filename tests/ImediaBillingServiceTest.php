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
        $data = $this->service->getBill([
            'service_code' => 'ENV',
            'billing_code' => $this->service->getRandomBillCode('SUCCESS'),
            'partner_trans_id' => randomStringImedia(),
        ]);
        echo "\n" . json_encode($data);
        return $this->assertTrue(true);
    }
    public function testPayBill()
    {
        $data = $this->service->payBill([
            'service_code' => 'ENV',
            'billing_code' => '',
            'reference_code' => '',
            'amount' => 50000,
            'partner_trans_id' => '',
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
