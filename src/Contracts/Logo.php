<?php


namespace NinePay\Imedia\Billing\Contracts;


class Logo
{
    private static $data = [
        'EVN' => '',
        'VT_Mobile' => '11',
        'VT_LandLine' => '',
        'VT_Homephone' => '',
        'TSVN' => '',
        'TSMB' => '',
        'SST' => '',
        'VNPT_' => 'HN',
        'STCBILLING' => '',

        'NHCM' => '',
        'NDT' => '',
        'NHUE' => '',
        'TGGWACO' => '',
        'NCM' => '',
        'NCT' => '',

        'ADS_TV_VT' => '',
        'ADS_SST' => '',
        'ADS_SPT' => '',
        'ADS_HTVTMS' => '',
        'ADS_VPNT_' => '',
        'ADS_FPT' => '',
        'TV_FPT' => '',
        'TV_VTC' => '',
        'TV_MOBI' => '',
        'TV_MY' => '',
        'KPLUS' => '',
        'TV_AVG' => '',
        'VTVCAB' => '',
        'TV_VNPT_' => '',

        'FECRDT' => '',
        'HCDEBT' => '',
        'PRUDENTINAL' => '',
        'OCBCRDT' => '',
        'MCREDIT' => '',
        'ATMCRDT' => '',
        'MSBCRDT' => '',
        'VAP' => '',
        'MIRAEASSET' => '',
        'ACSCRDT' => '',
        'BTAINS' => '',
        'VEXERE' => '',
        'PRUDFINANCE' => '',
        'SHBFINANCE' => '',
        'TOYOTA' => ''
    ];

    public static function getLogoService($serviceCode = '')
    {
        if (!empty(self::$data[$serviceCode])) {
            return self::$data[$serviceCode];
        }

        foreach (self::$data as $code => $logo) {
            if (is_numeric(strpos($serviceCode, $code)) && strpos($serviceCode, $code) == 0) {
                return $logo;
            }
        }

        return self::$data;
    }
}