<?php

use yii\db\Migration;

class m180708_174910_add_user_email_token extends Migration
{

    public function safeUp()
    {
        $this->addColumn('{{%user}}','email_confirm_token',$this->string()->unique()->after('email'));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}','email_confirm_token');
    }

}
