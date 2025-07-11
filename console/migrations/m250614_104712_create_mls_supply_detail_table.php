<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_supply_detail}}`.
 */
class m250614_104712_create_mls_supply_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_supply_detail}}', [
            'id' => $this->primaryKey(),
            'supply_id' => $this->integer()->notNull(), // Foreign key to mls_supply
            'product_id' => $this->integer()->notNull(), // Foreign key to mls_product
            'items' => $this->integer()->notNull(), // Number of items in the supply
            'price_per_item' => $this->decimal(10, 2)->notNull(), // Price per item
            'item_approved' => $this->integer()->null(), // Number of items approved after negotiation
            'price_approved' => $this->decimal(10, 2)->null(), // Approved price per item after negotiation
            'total_price' => $this->decimal(10, 2)->notNull(), // Total price for the supply detail
        
            'status' => $this->boolean()->defaultValue(1), // 1 for active, 0 for inactive
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        $this->addForeignKey('fk-supply_detail-supply_id', '{{%mls_supply_detail}}', 'supply_id', '{{%mls_supply}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-supply_detail-product_id', '{{%mls_supply_detail}}', 'product_id', '{{%mls_product}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-supply_detail-created_by', '{{%mls_supply_detail}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-supply_detail-updated_by', '{{%mls_supply_detail}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-supply_detail-deleted_by', '{{%mls_supply_detail}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-supply_detail-created_by', '{{%mls_supply_detail}}');
        $this->dropForeignKey('fk-supply_detail-updated_by', '{{%mls_supply_detail}}');
        $this->dropForeignKey('fk-supply_detail-deleted_by', '{{%mls_supply_detail}}');
        $this->dropForeignKey('fk-supply_detail-supply_id', '{{%mls_supply_detail}}');
        $this->dropForeignKey('fk-supply_detail-product_id', '{{%mls_supply_detail}}');
        $this->dropTable('{{%mls_supply_detail}}');
    }
}
