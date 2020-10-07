<?php

return [
    'secret' => env('VOYAGER_RECAPTCHA_SECRET'),
    'sitekey' => env('VOYAGER_RECAPTCHA_SITEKEY'),
    'options' => [
        'timeout' => 30,
    ],
];
