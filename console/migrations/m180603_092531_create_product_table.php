<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180603_092531_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'status' => $this->integer(1),
            'cost' => $this->decimal(11,2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
