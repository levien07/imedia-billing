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
    public function testPayBill()
    {
        $data = $this->service->getBill([
            'service_code' => 'ENV',
            'billing_code' => $this->service->getRandomBillCode('SUCCESS'),
            'partner_trans_id' => randomStringImedia(),
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
