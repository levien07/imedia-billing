<?php

return [
    'imedia' => [
        'billing' => [
            'api_url' => env('IMEDIA_BILLING_API_URL', null),
            'user_id' => env('IMEDIA_BILLING_USER_ID',null),
            'user_password' => env('IMEDIA_BILLING_USER_PASSWORD',null),
            'imedia_public_key' => env('IMEDIA_BILLING_PUBLIC_KEY', null),
            '9pay_private_key' => env('IMEDIA_BILLING_9PAY_PRIVATE_KEY', null),
            '9pay_public_key' => env('IMEDIA_BILLING_9PAY_PUBLIC_KEY', null),
        ]
    ]
];
