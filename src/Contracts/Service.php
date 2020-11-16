<?php

namespace OneSite\Imedia\Billing\Contracts;

class Service
{
    private static $serviceCode = [
        'evn_phone' => [
            'EVN' => 'Dịch vụ thanh toán hóa đơn điện',
            'VT_Mobile' => 'Dịch vụ di động Viettel (Trả trước và trả sau)',
            'VT_LandLine' => 'Dịch vụ điện thoại cố định Viettel',
            'VT_Homephone' => 'Dịch vụ Homephone Viettel',
            'TSVN' => 'Trả sau Vinaphone',
            'TSMB' => 'Trả sau Mobiphone',
            'SST' => 'Dịch vụ cố định Nam Sài Gòn',
            'VNPT_' => 'Hóa đơn cố định VNPT',
            'STCBILLING' => 'Cố định SPT',
        ],
        'water' => [
            'NHCM' => 'Nước Hồ Chí Minh',
            'NDT' => 'Nước Đồng Tháp',
            'NHUE' => 'Nước Huế',
            'TGGWACO' => 'Nước Tiền Giang',
            'NCM' => 'Nước Cà Mau',
            'NCT' => 'Nước Cần Thơ',
        ],
        'internet' => [
            'ADS_TV_VT' => 'Internet - Truyền Hình Viettel',
            'ADS_SST' => 'Internet Nam Sài Gòn',
            'ADS_SPT' => 'Internet SPT',
            'ADS_HTVTMS' => 'Internet HTV - TMS',
            'ADS_VPNT_' => 'Internet VNPT',
            'ADS_FPT' => 'Internet FPT',
            'TV_FPT' => 'Truyền hình FPT',
            'TV_VTC' => 'Truyền hình VTC',
            'TV_MOBI' => 'Truyền hình MobiTV',
            'TV_MY' => 'Truyền hình MyTV',
            'KPLUS' => 'Truyền hình K+',
            'TV_AVG' => 'Truyền hình AVG',
            'VTVCAB' => 'Truyền hình VTVCAB',
            'TV_VNPT_' => 'Truyền hình VNPT',
        ],
        'credit' => [
            'FECRDT' => 'Vay tiêu dùng FE Credit',
            'HCDEBT' => 'Vay tiêu dùng Home Credit',
            'PRUDENTINAL' => 'Thu hộ Prudentinal',
            'OCBCRDT' => 'Thu hộ OCB',
            'MCREDIT' => 'Thu hộ MCredit',
            'ATMCRDT' => 'Thu hộ ATM Online',
            'MSBCRDT' => 'Thu hộ MSB',
            'VAP' => 'Thu hộ Doctor Dong',
            'MIRAEASSET' => 'Thu hộ Mirae Asset',
            'ACSCRDT' => 'Thu hộ ACS',
            'BTAINS' => 'Bảo hiểm Bảo Tâm An',
            'VEXERE' => 'Thu hộ Vexere',
            'PRUDFINANCE' => 'Thu hộ Shinhan Finance',
            'SHBFINANCE' => 'Thu hộ SHB Finance',
            'TOYOTA' => 'Thu hộ Toyota',
        ]

    ];

    public static function listServices($params)
    {
        $list = [];
        foreach (self::$serviceCode as $key_ser=> $services) {
            foreach ($services as $key => $service) {
                if($params) {
                    if (in_array($key, $params)) {
                        $list[$key_ser][] = [
                            'code' => $key,
                            'name' => $service
                        ];
                    }
                }else{
                    $list[$key_ser][] = [
                        'code' => $key,
                        'name' => $service
                    ];
                }
            }
        }
        return $list;
    }

}