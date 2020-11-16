<?php

namespace NinePay\Imedia\Billing\Contracts;

class Area
{
    private static $areaCode = [
        'NBH' => 'Ninh Bình',
        'NDH' => 'Nam Định',
        'PTO' => 'Phú Thọ',
        'QNH' => 'Quảng Ninh',
        'TNN' => 'Thái Nguyên',
        'BGG' => 'Bắc Giang',
        'THA' => 'Thanh Hóa',
        'TBH' => 'Thái Bình',
        'YBI' => 'Yên Bái',
        'LSN' => 'Lạng Sơn',
        'TQG' => 'Tuyên Quang',
        'NAN' => 'Nghệ An',
        'CBG' => 'Cao Bằng',
        'SLA' => 'Sơn La',
        'HTH' => 'Hà Tĩnh',
        'HBH' => 'Hòa Bình',
        'LCI' => 'Lào Cai',
        'DBN' => 'Điện Biên',
        'HGG' => 'Hà Giang',
        'BNH' => 'Bắc Ninh',
        'HYN' => 'Hưng Yên',
        'HNM' => 'Hà Nam',
        'VPC' => 'Vĩnh Phúc',
        'BKN' => 'Bắc Cạn',
        'LCU' => 'Lai Châu',
        'BPC' => 'Bình Phước',
        'BTN' => 'Bình Thuận',
        'LDG' => 'Lâm Đồng',
        'BDG' => 'Bình Dương',
        'TNH' => 'Tây Ninh',
        'LAN' => 'Long An',
        'DTP' => 'Đồng Tháp',
        'BTE' => 'Bến Tre',
        'VLG' => 'Vĩnh Long',
        'CTO' => 'Cần Thơ',
        'AGG' => 'An Giang',
        'KGG' => 'Kiên Giang',
        'CMU' => 'Cà Mau',
        'VTU' => 'Vũng Tàu',
        'TVH' => 'Trà Vinh',
        'STG' => 'Sóc Trăng',
        'NTN' => 'Ninh Thuận',
        'BLU' => 'Bạc Liêu',
        'HUG' => 'Hậu Giang',
        'QBH' => 'Quảng Bình',
        'QTI' => 'Quảng Trị',
        'TTH' => 'Thừa Thiên Huế',
        'QNM' => 'Quảng Nam',
        'QNI' => 'Quảng Ngãi',
        'BDH' => 'Bình Định',
        'PYN' => 'Phú Yên',
        'GLI' => 'Gia Lai',
        'KTM' => 'Kom Tum',
        'DLK' => 'Đắc Lắc',
        'DKG' => 'Đắc Nông',
        'HNI' => 'Hà Nội',
        'HCM' => 'Hồ Chí Minh',
        'DNI' => 'Đồng Nai',
        'HDG' => 'Hải Dương',
        'DNG' => 'Đà nẵng',
        'KHA' => 'Khánh Hòa',
    ];
    public static function readAreaCode($code)
    {
        return (!empty(self::$areaCode[$code])) ? self::$areaCode[$code] : '';
    }

    public static function listArea()
    {
        return self::$areaCode;
    }
}