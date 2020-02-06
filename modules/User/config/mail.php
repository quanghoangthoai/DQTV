<?php

return [
    'new_user' => [
        'name' => 'new_user',
        'title' => 'Khôi phục mật khẩu',
        'description' => 'Gửi mail khi cần khôi phục mật khẩu',
        'variables' => [
            [
                'code' => '{email}',
                'title' => 'Email'
            ],
            [
                'code' => '{password}',
                'title' => 'Mật khẩu'
            ],
            [
                'code' => '{email}',
                'title' => 'Email'
            ],
            [
                'code' => '{fullname}',
                'title' => 'Họ tên'
            ],
            [
                'code' => '{link_callback}',
                'title' => 'Liên kết chuyển hướng'
            ]
        ]
    ]
];