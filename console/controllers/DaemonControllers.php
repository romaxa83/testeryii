<?php
namespace console\controllers;

use yii\web\Controller;

class DaemonControllers extends Controller
{
    public function actionInitClient()
    {
        for ($i = 0; $i<100; $i++){
            $fake = \Faker\Factory::create();
        }
    }
}