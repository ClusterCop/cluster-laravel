<?php

return array(

    'IOSUser'     => array(
        'environment' => env('IOS_USER_ENV', 'development'),
        'certificate' => app_path().'/apns/user/tranxit_user_live.pem',
        'passPhrase'  => env('IOS_USER_PUSH_PASS', 'appoets123$'),
        'service'     => 'apns'
    ),
    'IOSProvider' => array(
        'environment' => env('IOS_PROVIDER_ENV', 'development'),
        'certificate' => app_path().'/apns/provider/tranxit_provider_live.pem',
        'passPhrase'  => env('IOS_PROVIDER_PUSH_PASS', 'appoets123$'),
        'service'     => 'apns'
    ),
    'AndroidUser' => array(
        'environment' => env('ANDROID_USER_ENV', 'production'),
        'apiKey'      => env('ANDROID_USER_PUSH_KEY', 'AAAAYq30mWI:APA91bEVIztswzyKNrRMgMTT0YSDtTUKde0FW38DvBtEtmvzF5dvBseZUMV22orfVfU9nZCP06P3tuA6JYt4F7CWI-GUyL_D-yrIwYco9jpXt2nhQK3iHLvPzN7TICR_-rRc78Nt0j9Q'),
        'service'     => 'fcm'
    ),
    'AndroidProvider' => array(
        'environment' => env('ANDROID_PROVIDER_ENV', 'production'),
        'apiKey'      => env('ANDROID_PROVIDER_PUSH_KEY', 'AAAAYq30mWI:APA91bEVIztswzyKNrRMgMTT0YSDtTUKde0FW38DvBtEtmvzF5dvBseZUMV22orfVfU9nZCP06P3tuA6JYt4F7CWI-GUyL_D-yrIwYco9jpXt2nhQK3iHLvPzN7TICR_-rRc78Nt0j9Q'),
        'service'     => 'fcm'
    ),
);