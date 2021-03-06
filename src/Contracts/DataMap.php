<?php

namespace NinePay\Imedia\Billing\Contracts;

class DataMap
{
    private static $mapCode = [
        'NBH' => 'PNNQ00',
        'NDH' => 'PA01',
        'PTO' => 'PA02',
        'QNH' => 'PA03',
        'TNN' => 'PA04',
        'BGG' => 'PA05',
        'THA' => 'PA07',
        'TBH' => 'PA09',
        'YBI' => 'PA10',
        'LSN' => 'PA11',
        'TQG' => 'PA12',
        'NAN' => 'PA13',
        'CBG' => 'PA14',
        'SLA' => 'PA15',
        'HTH' => 'PA16',
        'HBH' => 'PA17',
        'LCI' => 'PA18',
        'DBN' => 'PA19',
        'HGG' => 'PA20',
        'BNH' => 'PA22',
        'HYN' => 'PA23',
        'HNM' => 'PA24',
        'VPC' => 'PA25',
        'BKN' => 'PA26',
        'LCU' => 'PA29',
        'BPC' => 'PB01',
        'BTN' => 'PB02',
        'LDG' => 'PB03',
        'BDG' => 'PB04',
        'TNH' => 'PB05',
        'LAN' => 'PB06',
        'DTP' => 'PB07',
        'BTE' => 'PB09',
        'VLG' => 'PB10',
        'CTO' => 'PB11',
        'AGG' => 'PB12',
        'KGG' => 'PB13',
        'CMU' => 'PB14',
        'VTU' => 'PB15',
        'TVH' => 'PB16',
        'STG' => 'PB17',
        'NTN' => 'PB18',
        'BLU' => 'PB19',
        'HUG' => 'PB2001',
        'QBH' => 'PC01',
        'QTI' => 'PC02',
        'TTH' => 'PC03',
        'QNM' => 'PC05',
        'QNI' => 'PC06',
        'BDH' => 'PC07',
        'PYN' => 'PC08',
        'GLI' => 'PC10',
        'KTM' => 'PC11',
        'DLK' => 'PC12',
        'DKG' => 'PC13',
        'HNI' => 'PD',
        'HCM' => 'PE',
        'DNI' => 'PK',
        'HDG' => 'PM',
        'DNG' => 'PP01',
        'KHA' => 'PQ',
    ];

    public static function readMapCode($code)
    {
        return (!empty(self::$mapCode[$code])) ? self::$mapCode[$code] : '';
    }

}