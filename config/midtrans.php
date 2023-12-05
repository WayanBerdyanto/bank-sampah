<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'merchant_id'=> env('MIDTRANS_MERCHANT_ID'),
    'client_key'=> env('MIDTRANS_CLIENT_KEY'),
    'server_key'=> env('MIDTRANS_SERVER_KEY'),
    'is_production' => false,
    'snap_url' => env('MIDTRANS_SNAP_URL'),
];