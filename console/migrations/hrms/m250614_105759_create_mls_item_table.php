<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_item}}`.
 */
class m250614_105759_create_mls_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_item}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'available_amount' => $this->integer()->notNull(),
            'supply_price_per_unit' => $this->decimal(10,2),
            'selling_price_per_unit' => $this->decimal(10,2),

            'status' => $this->boolean()->defaultValue(1), // 1 for active, 0 for inactive
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-item-created_by', '{{%mls_item}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-item-updated_by', '{{%mls_item}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-item-deleted_by', '{{%mls_item}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');
        $this->addForeignKey('fk-item-product_id', '{{%mls_item}}', 'product_id', '{{%mls_product}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-item-created_by', '{{%mls_item}}');
        $this->dropForeignKey('fk-item-updated_by', '{{%mls_item}}');
        $this->dropForeignKey('fk-item-deleted_by', '{{%mls_item}}');
        $this->dropForeignKey('fk-item-product_id', '{{%mls_item}}');
        $this->dropTable('{{%mls_item}}');
    }
}
