<?php


namespace NinePay\Imedia\Billing\Contracts;


class Logo
{
    private static $data = [
        'EVN' => 'https://storage.googleapis.com/npay/images/evn-1607004903.png',
        'VT_Mobile' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VT_Mobile.png',
        'VT_LandLine' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VT_LandLine.png',
        'VT_Homephone' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VT_Homephone.png',
        'TSVN' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TSVN.png',
        'TSMB' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TSMB.png',
        'SST' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/SST.png',
        'VNPT_' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VNPT_.png',
        'STCBILLING' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/STCBILLING.png',

        'NHCM' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/NHCM.png',
        'NDT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/NDT.png',
        'NHUE' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/NHUE.png',
        'TGGWACO' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TGGWACO.png',
        'NCM' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/NCM.png',
        'NCT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/NCT.png',

        'ADS_TV_VT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ADS_TV_VT.png',
        'ADS_SST' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ADS_SST.png',
        'ADS_SPT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ADS_SPT.png',
        'ADS_HTVTMS' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ADS_HTVTMS.png',
        'ADS_VPNT_' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ADS_VPNT_.png',
        'ADS_FPT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ADS_FPT.png',
        'TV_FPT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TV_FPT.png',
        'TV_VTC' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TV_VTC.png',
        'TV_MOBI' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TV_MOBI.png',
        'TV_MY' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TV_MY.png',
        'KPLUS' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/KPLUS.png',
        'TV_AVG' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TV_AVG.png',
        'VTVCAB' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VTVCAB.png',
        'TV_VNPT_' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TV_VNPT_.png',

        'FECRDT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/FECRDT.png',
        'HCDEBT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/HCDEBT.png',
        'PRUDENTINAL' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/PRUDENTINAL.png',
        'OCBCRDT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/OCBCRDT.png',
        'MCREDIT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/MCREDIT.png',
        'ATMCRDT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ATMCRDT.png',
        'MSBCRDT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/MSBCRDT.png',
        'VAP' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VAP.png',
        'MIRAEASSET' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/MIRAEASSET.png',
        'ACSCRDT' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/ACSCRDT.png',
        'BTAINS' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/BTAINS.png',
        'VEXERE' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/VEXERE.png',
        'PRUDFINANCE' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/PRUDFINANCE.png',
        'SHBFINANCE' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/SHBFINANCE.png',
        'TOYOTA' => 'http://storage.googleapis.com/npay/assets/static/v4/icon/bl/TOYOTA.png'
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