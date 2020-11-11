<?php

namespace OneSite\Imedia\Billing\Contracts;

class Service
{
    private static $serviceCode = [
        'EVN' => 'Dịch vụ thanh toán hóa đơn điện',
        'NHCM' => 'Dịch vụ hóa đơn nước HCM',
        'NDT' => 'Dịch vụ hóa đơn nước Đồng Tháp',
        'FECRDT' => 'Dịch vụ vay tiêu dùng FE',
        'HCDEBT' => 'Dịch vụ vay tiêu dùng Home Credit',
        'DNIWACO' => 'Dịch vụ nước Đồng Nai',
        'NHUE' => 'Dịch vụ nước Huế',
        'TGGWACO' => 'Dịch vụ nước Tiền Giang',
        'CTWACO' => 'Dịch vụ nước Cần Thơ',
        'PRUDENTIAL' => 'Dịch vụ thu hộ Prudential',
        'OCBCRDT' => 'Dịch vụ thu hộ OCB',
        'MCREDIT' => 'Dịch vụ thu hộ MCREDIT',
        'MSBCRDT' => 'Dịch vụ thu hộ MaritimeBank',
        'NCM' => 'Dịch vụ thu hộ nước Cà Mau',
        'HCDEBT' => 'Home Credit',
        'VAP' => 'Dịch vụ thu hộ Doctor Dong',
        'MIRAEASSET' => 'Dịch vụ thu hộ Mirae Asset',
        'ACSCRDT' => 'Dịch vụ thu hộ ACS',
        'ATMCRDT' => 'Thu hộ tài chính ATM Online',
        'THBVAG' => 'Bảo hiểm Bảo Việt',
        'BTAINS' => 'Bảo hiểm Bảo Tâm An',
        'SSTADSBILL' => 'Internet Nam Sài Gòn',
        'VEXERE' => 'Thu hộ vexere',
        'STCBILLING' => 'Internet và cố định SPT',
        'PRUFINANCE' => 'Thu hộ Shinhan Finance',
        'KPLUS' => 'Truyền hình K+',
        'AVG' => 'Truyền hình AVG',
        'VTVCAB' => 'Truyền hình VTVCab',
        'SHBFINANCE' => 'Thu hộ SHB Finance',
        'TOYOTA' => 'Thu hộ Toyota',
        'VT_CARD' => 'Dịch vụ thẻ cào viettel',
        'VT_Mobile' => 'Dịch vụ di động viettel (gạch cước trả sau)',
        'VT_InternetTV' => 'Dịch vụ Internet - Truyền hình viettel',
        'VT_LandLine' => 'Dịch vụ điện thoại cố định viettel',
        'VT_Homephone' => 'Dịch vụ vụ Homephone viettel
',
    ];
    public static function readMessageFromServiceCode($code)
    {
        return (!empty(self::$serviceCode[$code])) ? self::$serviceCode[$code] : '';
    }

}