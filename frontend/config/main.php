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
                // Public homepage, and default route
                '' => 'auth/guest',

                // OAUTH2 ENDPOINTS
                'auth/index' => 'auth/index',
                'auth/token' => 'auth/token',
                'auth' => 'auth/index',
                'token' => 'auth/token',
                'auth-as-user' => 'auth/auth-as-user',



                'GET recipes' => 'ri-recipe/index',
                'recipes' => 'frontend/options',

                // Top Recipes
                'GET top-recipes/top-recipes' => 'top-recipes/top-recipes',
                'GET top-recipes/shopping-list' => 'top-recipes/shopping-list',
                'GET top-recipes/ingredients-by-price' => 'top-recipes/ingredients-by-price',
                'POST top-recipes/shopping-list' => 'top-recipes/shopping-list',

                'top-recipes/top-recipes' => 'frontend/options',
                'top-recipes/shopping-list' => 'frontend/options',
                'top-recipes/ingredients-by-price' => 'frontend/options',
                'top-recipes/shopping-list' => 'frontend/options',

                // Home Inventory
                'GET home-inventory-form/home-inventory' => 'home-inventory-form/home-inventory',
                'POST home-inventory-form/remove-ingredient' => 'home-inventory-form/remove-ingredient',
                'POST home-inventory-form/update-recipe-ingredients' => 'home-inventory-form/update-recipe-ingredients',

                'home-inventory-form/home-inventory' => 'frontend/options',
                'home-inventory-form/remove-ingredient' => 'frontend/options',
                'home-inventory-form/update-recipe-ingredients' => 'frontend/options',

                // Ingredients Form
                'GET recipe-form/recipes' => 'recipe-form/recipes',
                'GET recipe-form/ingredients' => 'recipe-form/ingredients',
                'POST recipe-form/update-ingredient' => 'recipe-form/update-ingredient',
                'POST recipe-form/add-ingredient' => 'recipe-form/add-ingredient',
                'POST recipe-form/remove-ingredient-from-recipe' => 'recipe-form/remove-ingredient-from-recipe',
                'POST recipe-form/update-recipe-ingredients' => 'recipe-form/update-recipe-ingredients',

                'recipe-form/recipes' => 'frontend/options',
                'recipe-form/ingredients' => 'frontend/options',
                'recipe-form/update-ingredient' => 'frontend/options',
                'recipe-form/add-ingredient' => 'frontend/options',
                'recipe-form/remove-ingredient-from-recipe' => 'frontend/options',
                'recipe-form/update-recipe-ingredients' => 'frontend/options',

                // Recipe Form
                'POST recipe-form/create' => 'recipe-form/create',
                'POST recipe-form/update' => 'recipe-form/update',
                'GET recipe-form/view' => 'recipe-form/view',
                'GET recipe-form/proteins' => 'recipe-form/proteins',
                'GET recipe-form/recipe-styles' => 'recipe-form/recipe-styles',
                'GET recipe-form/taste-levels' => 'recipe-form/taste-levels',
                'GET recipe-form/difficulty-levels' => 'recipe-form/difficulty-levels',

                'recipe-form/create' => 'frontend/options',
                'recipe-form/update' => 'frontend/options',
                'recipe-form/view' => 'frontend/options',
                'recipe-form/proteins' => 'frontend/options',
                'recipe-form/recipe-styles' => 'frontend/options',
                'recipe-form/taste-levels' => 'frontend/options',
                'recipe-form/difficulty-levels' => 'frontend/options',


                /*/
                'POST districts' => 'district/create',
                'GET districts/<id:\d+>' => 'district/view',
                'GET districts/<id:\d+>/subscriptions' => 'district/subscriptions',
                'GET districts/<id:\d+>/support' => 'district/support',
                'GET districts/<id:\d+>/timezone' => 'district/timezone',
                'PUT,PATCH districts/<id:\d+>' => 'district/update',
                'DELETE districts/<id:\d+>' => 'district/delete',
                'districts/<id:\d+>' => 'frontend/options',
                'districts/<id:\d+>/subscriptions' => 'frontend/options',
                'districts/<id:\d+>/timezone' => 'frontend/options',
                'districts' => 'frontend/options',
                //*/


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
        /*/
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'multipart/form-data' => 'yii\web\MultipartFormDataParser'
            ],
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
        ],
        //*/
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'myserver' => [
                    'class' => 'yii\authclient\OAuth2',
                    'clientId' => 'advancedApi',
                    'clientSecret' => '39472349jhf4075ur543RU0UL',
                    'tokenUrl' => 'https://advancedapi.hawleywebdesign.com/auth/token',
                    'authUrl' => 'https://advancedapi.hawleywebdesign.com/auth/index',
                    'apiBaseUrl' => 'https://advancedapi.hawleywebdesign.com/',
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
            '172.69.22.238', '162.158.255.96', '172.68.132.229', '172.68.143.86', '172.68.189.243', '69.232.99.200',
            '162.158.*.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '172.68.133.110', '172.68.132.61', '172.69.23.107', '172.68.132.115',
            '172.68.143.86', '172.69.22.238', '162.158.255.96', '172.68.132.229', '172.68.143.86', '172.68.189.243',
            '172.68.132.253', '69.232.99.200', '162.158.*.*'],
    ];
}

return $config;
