<?php

namespace backend\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class TestBehaviors extends Behavior
{
    public $text;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'onBeforeSave'
        ];
    }

    public function onBeforeSave($event)
    {
        $model = $this->owner;
        $model->{$this->text} = $this->text . 'TEST';
    }
}