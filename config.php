<?php

return [
    'imedia' => [
        'billing' => [
            'api_url' => env('IMEDIA_BILLING_API_URL', 'http://14.232.245.102:8080'),
            'user_id' => env('IMEDIA_BILLING_USER_ID', '9pay_dev'),
            'user_password' => env('IMEDIA_BILLING_USER_PASSWORD', 'a1ec3b73f427c514ab64ce99c891b73f'),
            'imedia_public_key' => env('IMEDIA_BILLING_PUBLIC_KEY', 'D:\laragon\www\imedia\storage\credentials\imedia_publickey.pem'),
            '9pay_private_key' => env('IMEDIA_BILLING_9PAY_PRIVATE_KEY', 'D:\laragon\www\imedia\storage\credentials\9pay_imedia_billing_private.key'),
            '9pay_public_key' => env('IMEDIA_BILLING_9PAY_PUBLIC_KEY', 'D:\laragon\www\imedia\storage\credentials\9pay_imedia_billing_public.pem'),
        ]
    ]
];
