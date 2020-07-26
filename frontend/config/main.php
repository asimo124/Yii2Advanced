<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'multipart/form-data' => 'yii\web\MultipartFormDataParser'
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
            'loginUrl' => null,
            'enableAutoLogin' => true
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'enableCsrfValidation'=>true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                /*[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'patient'
                ],*/
                'auth/index' => 'auth/index',
            ],
        ],
        'i18n' => [
            'translations' => [
                'conquer/oauth2' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@conquer/oauth2/messages',
                ],
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'myserver' => [
                    'class' => 'yii\authclient\OAuth2',
                    'clientId' => 'advancedApi',
                    'clientSecret' => '39472349jhf4075ur543RU0UL',
                    'tokenUrl' => 'https://advancedapi.hawleywebdesign.com/auth/token',
                    'authUrl' => 'https://advancedapi.hawleywebdesign.com/auth/index',
                    'apiBaseUrl' => 'https://advancedapi.hawleywebdesign.com/api',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '172.68.133.110', '172.68.132.61', '172.68.143.134', '172.68.132.115',
            '172.69.22.238', '162.158.255.96', '172.68.132.229', '172.68.143.86', '172.68.189.243', '69.232.99.200'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '172.68.133.110', '172.68.132.61', '172.69.23.107', '172.68.132.115',
            '172.68.143.86', '172.69.22.238', '162.158.255.96', '172.68.132.229', '172.68.143.86', '172.68.189.243',
            '172.68.132.253', '69.232.99.200'],
    ];
}

return $config;
