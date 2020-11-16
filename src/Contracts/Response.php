<?php

namespace NinePay\Imedia\Billing\Contracts;

class Response
{
    private static $responseCode = [
        '00' => 'Giao dịch thành công',
        '888' => 'Giao dịch thanh toán đã được hủy thành công',
        '99' => 'Đang chờ xử lý',
        '999' => 'Hủy Pending Giao dịch Hủy đang được xử lý',
        '18' => 'Giao dịch thất bại.',
        '202' => 'Thất bại Thông tin giao dịch không đúng (thông tin dữ liệu không đúng định dạng, vượt quá độ dài,…)',
        '204' => 'Thất bại pr_code không hợp lệ',
        '205' => 'Thất bại Giao dịch trùng lặp',
        '206' => 'Thất bại không tìm thấy thông tin đối tác trên hệ thống',
        '207' => 'Thất bại chỹ ký authkey không hợp lệ',
        '208' => 'Thất bại số tiền thanh toán không hợp lệ',
        '209' => 'Thất bại mã dịch vụ không đúng hoặc không hoạt động',
        '210' => 'Thất bại sai thông tin username,password',
        '211' => 'Thất bại mã giao dịch không tồn tại',
        '213' => 'Thất bại Mã giao dịch đối tác không hợp lệ.',
        '214' => 'Thất bại mã giao dịch gốc rỗng hoặc trống.',
        '215' => 'Thất bại giao dịch không được phép hủy',
        '301' => 'Thất bại chưa cấu hình phí dịch vụ.',
        '302' => 'Thất bại chưa cấu hình cổng dịch vụ.',
        '303' => 'Thất bại cổng dịch vụ bị tắt.',
        '304' => 'Thất bại chưa kích hoạt thông tin đối tác.',
        '305' => 'Thất bại chưa cấu hình thông tin đối tác.',
        '310' => 'Thất bại trừ tiền thất bại,số dư tài khoản đối tác không đủ để thực hiện giao dịch.',
        '318' => 'Thất bại trừ tiền thất bại.',
        '399' => 'Thất bại trừ tiền timeout.',
        '416' => 'Thất bại mã khách hàng không tồn tại.',
        '417' => 'Thất bại giao dịch thanh toán đã bị hủy.',
        '418' => 'Thất bại đã tồn tại giao dịch hủy đang được xử lý.',
        '419' => 'Thất bại mã khách hàng không đúng hoặc chưa hỗ trợ thanh toán.',
        '422' => 'Thất bại không thể thực hiện giao dịch.',
        '423' => 'Thất bại lỗi thanh toán, vui lòng thử lại sau.',
        '424' => 'Thất bại lỗi hạch toán tài khoản thanh toán.',
        '425' => 'Thất bại giao dịch thất bại.',
        '426' => 'Thất bại giao dịch thất bại.',
        '427' => 'Thất bại lỗi hệ thống thanh toán.',
        '428' => 'Thất bại quý khách không còn nợ cước dịch vụ.',
        '429' => 'Thất bại mã thanh toán không còn tồn tại.',
        '431' => 'Thất bại Đối tác thanh toán dịch vụ tạm ngừng phục vụ',
        '432' => 'Thất bại Số điện thoại không hợp lệ hoặc không đủ điều kiện thanh toán',
        '433' => 'Thất bại lỗi xảy ra khi truy vấn tài khoản.',
        '439' => 'Thất bại gạch nợ thuê bao thất bại.',
        '440' => 'Thất bại số điện thoại không hợp lệ.',
        '441' => 'Thất bại giao dịch gốc không tồn tại.',
        '438' => 'Thất bại lỗi hệ thống phía nhà cung cấp dịch vụ.',
        '420' => 'Thất bại hệ thống nhà cung cấp dịch vụ đang tạm ngưng phục vụ.',
        '421' => 'Thất bại hệ thống nhà cung cấp đang nâng cấp, bảo dưỡng.',
    ];

    public static function readMessageFromResponseCode($code)
    {
        return (!empty(self::$responseCode[$code])) ? self::$responseCode[$code] : '';
    }


}