<?php

namespace console\controllers;

use yii\console\Controller;

class DaemonController extends Controller
{
    public function actionInitClient($count_row = 10,$delete = null)
    {
        if (\Yii::$app->db->getTableSchema('{{%client}}', true) !== null){

//            if ($delete != null && $delete == 'del'){
//                $clients = Client::deleteAll();
//            }


            $start = microtime(true);
            $data = array();
            $count = 0;
            for ($i = 0; $i<$count_row; $i++){

                $fake = \Faker\Factory::create();
                $name = $fake->name('male');
                $email = $fake->email;
                $data [] = [$name,$email];
                $count++;
            }

        \Yii::$app->db->createCommand()->batchInsert('client',['name','email'],$data)->execute();

            echo $count_row . ' - фейковых клиентов записано в бд' . PHP_EOL .
                'Время выполнения - ' .((int)microtime(true) - (int)$start) . ' сек.' . PHP_EOL.
                'Памяти выделено - ' . memory_get_usage() . ' байт' .PHP_EOL;

        } else {

            echo 'Такой таблицы нет' . PHP_EOL;
        }
    }
}