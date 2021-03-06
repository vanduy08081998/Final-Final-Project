<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', 'AVoCCe7dYAM9wd4Uh-G1rYJiygcqS3B8ZQVVHzDRU0qVnf7I3XsXDdnG0EIG_pXpYThvtskM1JrPemmx'),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EMNELGxc04Y49z47_MoGj6IZahZR_O0ZGQAGymtvICNjpEpPs7vCNGQ3CYAhf73Mq-XQA-7I1PKcut_E'),
        'app_id'            => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', 'AVp_4ja740CjV7Pvx0bz1yOsERCeZwxLbI1U3chccVivE9Uu3TX9zaNwcPTUYlzdVctfsKPvNN9teDbd'),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', 'EOaeFFLUj4OvugzyGcs45BTBLehZXON-j5O_tF-Uj1yk_kOazd7Nkwa-2KL4vzGUONASmq8s7t1YVCBD'),
        'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
