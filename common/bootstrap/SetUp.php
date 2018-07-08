<?php

namespace common\bootstrap;

use frontend\services\auth\PasswordResetService;
use services\contact\ContactService;
use yii\base\BootstrapInterface;
use yii\di\Instance;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

//        $container->set('user.password_reset',function () use ($app){
//            return new PasswordResetService([$app->params['supportEmail'] => $app->name . ' robot']);
//        });

        //создаться олин раз
        $container->setSingleton(PasswordResetService::class);
        //регитрируем mailer
        $container->setSingleton('super_mailer',function() use ($app) {
            return $app->mailer;
        });

        $container->setSingleton(ContactService::class,[],[
            $app->params['adminEmail'],
            Instance::of('super_mailer')
        ]);

// можно и так если нужно прокинуть только конфиги
//        $container->setSingleton(PasswordResetService::class,[],[
//            [$app->params['supportEmail'] => $app->name . ' robot']
//        ]);
    }
}