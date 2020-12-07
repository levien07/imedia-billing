<?php

namespace NinePay\Imedia\Billing\Contracts;

class Service
{
    private static $serviceCode = [
        'EVN' => [
            'name' => 'Điện lực',
            'label' => 'Điện lực'
        ],
        'VT_LandLine' => [
            'label' => 'Điện thoại cố định Viettel',
            'name' => 'Dịch vụ điện thoại cố định Viettel'
        ],
        'VT_Homephone' => [
            'label' => 'Homephone Viettel',
            'name' => 'Dịch vụ Homephone Viettel'
        ],
        'SST' => [
            'label' => 'Nam Sài Gòn',
            'name' => 'Dịch vụ điện thoại cố định Nam Sài Gòn'
        ],
        'VNPT_' => [
            'label' => 'VNPT',
            'name' => 'Dịch vụ điện thoại cố định VNPT'
        ],
        'STCBILLING' => [
            'label' => 'SPT',
            'name' => 'Dịch vụ điện thoại cố định SPT'
        ],
        'TSVN' => [
            'label' => 'Vinaphone',
            'name' => 'Trả sau Vinaphone'
        ],
        'TSMB' => [
            'label' => 'Mobifone',
            'name' => 'Trả sau Mobiphone'
        ],
        'VT_Mobile' => [
            'label' => 'Viettel',
            'name' => 'Trả sau Viettel '
        ],
        'NHCM' => [
            'label' => 'Nước Hồ Chí Minh',
            'name' => 'Nước Hồ Chí Minh'
        ],
        'NDT' => [
            'label' => 'Nước Đồng Tháp',
            'name' => 'Nước Đồng Tháp'
        ],
        'NHUE' => [
            'label' => 'Nước Huế',
            'name' => 'Nước Huế'
        ],
        'TGGWACO' => [
            'label' => 'Nước Tiền Giang',
            'name' => 'Nước Tiền Giang'
        ],
        'NCM' => [
            'label' => 'Nước Cà Mau',
            'name' => 'Nước Cà Mau'
        ],
        'NCT' => [
            'label' => 'Nước Cần Thơ',
            'name' => 'Nước Cần Thơ'
        ],
        'ADS_SST' => [
            'label' => 'Nam Sài Gòn',
            'name' => 'Internet Nam Sài Gòn'
        ],
        'ADS_SPT' => [
            'label' => 'SPT',
            'name' => 'Internet SPT'
        ],
        'ADS_HTVTMS' => [
            'label' => 'HTV - TMS',
            'name' => 'Internet HTV - TMS'
        ],
        'ADS_VPNT_' => [
            'label' => 'VNPT',
            'name' => 'Internet VNPT'
        ],
        'ADS_FPT' => [
            'label' => 'FPT',
            'name' => 'Internet FPT'
        ],
        'ADS_TV_VT' => [
            'label' => 'Viettel',
            'name' => 'Truyền hình Viettel'
        ],
        'TV_FPT' => [
            'label' => 'FPT',
            'name' => 'Truyền hình FPT'
        ],
        'TV_VTC' => [
            'label' => 'VTC',
            'name' => 'Truyền hình VTC'
        ],
        'TV_MOBI' => [
            'label' => 'MobiTV',
            'name' => 'Truyền hình MobiTV'
        ],
        'TV_MY' => [
            'label' => 'MyTV',
            'name' => 'Truyền hình MyTV'
        ],
        'KPLUS' => [
            'label' => 'K+',
            'name' => 'Truyền hình K+'
        ],
        'TV_AVG' => [
            'label' => 'AVG',
            'name' => 'Truyền hình AVG'
        ],
        'VTVCAB' => [
            'label' => 'VTVCAB',
            'name' => 'Truyền hình VTVCAB'
        ],
        'TV_VNPT_' => [
            'label' => 'VNPT',
            'name' => 'Truyền hình VNPT'
        ],
        'FECRDT' => [
            'label' => 'FE Credit',
            'name' => 'Tài chính FE Credit'
        ],
        'HCDEBT' => [
            'label' => 'Home Credit',
            'name' => 'Tài chính Home Credit'
        ],
        'OCBCRDT' => [
            'label' => 'OCB',
            'name' => 'Tài chính OCB'
        ],
        'MCREDIT' => [
            'label' => 'MCredit',
            'name' => 'Tài chính MCredit'
        ],
        'ATMCRDT' => [
            'label' => 'ATM Online',
            'name' => 'Tài chính ATM Online'
        ],
        'MSBCRDT' => [
            'label' => 'MSB',
            'name' => 'Tài chính MSB'
        ],
        'VAP' => [
            'label' => 'Doctor Dong',
            'name' => 'Tài chính Doctor Dong'
        ],
        'MIRAEASSET' => [
            'label' => 'Mirae Asset',
            'name' => 'Tài chính Mirae Asse'
        ],
        'ACSCRDT' => [
            'label' => 'ACS',
            'name' => 'Tài chính ACS'
        ],
        'VEXERE' => [
            'label' => 'Vexere',
            'name' => 'Tài chính Vexere'
        ],
        'PRUDFINANCE' => [
            'label' => 'Shinhan Finance',
            'name' => 'Tài chính Shinhan Finance'
        ],
        'SHBFINANCE' => [
            'label' => 'SHB Finance',
            'name' => 'Tài chính SHB Finance'
        ],
        'TOYOTA' => [
            'label' => 'Toyota',
            'name' => 'Tài chính Toyota'
        ],
        'PRUDENTINAL' => [
            'label' => 'Prudentinal',
            'name' => 'Bảo hiểm Prudentinal'
        ],
        'BTAINS' => [
            'label' => 'Bảo Tâm An',
            'name' => 'Bảo hiểm Bảo Tâm An'
        ]
    ];

    private static $serviceData = [
        'evn' => [
            'name' => 'Điện',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'EVN' => 'Điện lực'
            ]
        ],
        'phone' => [
            'name' => 'Điện thoại cố định',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'VT_LandLine' => 'Điện thoại cố định Viettel',
                'VT_Homephone' => 'Homephone Viettel',
                'SST' => 'Nam Sài Gòn',
                'VNPT_' => 'VNPT',
                'STCBILLING' => 'SPT'
            ]
        ],
        'postpaid' => [
            'name' => 'Trả sau',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'TSVN' => 'Vinaphone',
                'TSMB' => 'Mobifone',
                'VT_Mobile' => 'Viettel'
            ]
        ],
        'water' => [
            'name' => 'Nước',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'NHCM' => 'Nước Hồ Chí Minh',
                'NDT' => 'Nước Đồng Tháp',
                'NHUE' => 'Nước Huế',
                'TGGWACO' => 'Nước Tiền Giang',
                'NCM' => 'Nước Cà Mau',
                'NCT' => 'Nước Cần Thơ'
            ],
        ],
        'internet' => [
            'name' => 'Internet',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'ADS_SST' => 'Nam Sài Gòn',
                'ADS_SPT' => 'SPT',
                'ADS_HTVTMS' => 'HTV - TMS',
                'ADS_VPNT_' => 'VNPT',
                'ADS_FPT' => 'FPT',
            ],
        ],
        'tv' => [
            'name' => 'Truyền hình',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'ADS_TV_VT' => 'Viettel',
                'TV_FPT' => 'FPT',
                'TV_VTC' => 'VTC',
                'TV_MOBI' => 'MobiTV',
                'TV_MY' => 'MyTV',
                'KPLUS' => 'K+',
                'TV_AVG' => 'AVG',
                'VTVCAB' => 'VTVCAB',
                'TV_VNPT_' => 'VNPT'
            ],
        ],
        'credit' => [
            'name' => 'Tài chính',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'FECRDT' => 'FE Credit',
                'HCDEBT' => 'Home Credit',
                'OCBCRDT' => 'OCB',
                'MCREDIT' => 'MCredit',
                'ATMCRDT' => 'ATM Online',
                'MSBCRDT' => 'MSB',
                'VAP' => 'Doctor Dong',
                'MIRAEASSET' => 'Mirae Asset',
                'ACSCRDT' => 'ACS',
                'VEXERE' => 'Vexere',
                'PRUDFINANCE' => 'Shinhan Finance',
                'SHBFINANCE' => 'SHB Finance',
                'TOYOTA' => 'Toyota'
            ],
        ],
        'insurrance' => [
            'name' => 'Bảo hiểm',
            'logo' => '',
            'is_active' => true,
            'items' => [
                'PRUDENTINAL' => 'Prudentinal',
                'BTAINS' => 'Bảo Tâm An'
            ]
        ]
    ];


    public static function listServices($params)
    {
        $list = [];
        foreach (self::$serviceData as $key_ser => $services) {
            $result = [
                'code' => $key_ser,
                'name' => $services['name'],
                'logo' => $services['logo'],
                'is_active' => $services['is_active']
            ];

            $items = [];
            foreach ($services['items'] as $key => $service) {
                if ($params) {
                    if (in_array($key, $params)) {
                        $items[] = [
                            'logo' => Logo::getLogoService($key),
                            'code' => $key,
                            'name' => $service
                        ];
                    }
                } else {
                    $items[] = [
                        'logo' => Logo::getLogoService($key),
                        'code' => $key,
                        'name' => $service
                    ];
                }
            }

            $result['items'] = $items;

            $list[] = $result;
        }
        return $list;
    }

    public static function getServiceName($code)
    {
        return  self::$serviceCode[$code]['name'] ?? '' ;
    }
}