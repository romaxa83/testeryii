<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180603_092603_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'order_id' => $this->integer(11),
            'amount' => $this->integer(11),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'foreign_key_product',
            'order','product_id',
            'product','id',
            'CASCADE',
            'NO ACTION'
        );

        $this->addForeignKey(
            'foreign_key_client',
            'order','order_id',
            'client','id',
            'CASCADE',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'foreign_key_product',
            'order'
        );
        $this->dropForeignKey(
            'foreign_key_client',
            'order'
        );
        $this->dropTable('order');
    }
}
