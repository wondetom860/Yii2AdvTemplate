<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_sell_detail}}`.
 */
class m250614_125423_create_mls_sell_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_sell_detail}}', [
            'id' => $this->primaryKey(),
            'sell_id' => $this->integer()->notNull(), // Foreign key to mls_sell
            'item_id' => $this->integer()->notNull(), // Foreign key to mls_item
            'amount_avaialble' => $this->integer()->notNull(), // Number of items available for sale
            'amount_sold' => $this->integer()->notNull(), // Number of items sold
            'selling_price' => $this->decimal(10, 2)->notNull(), // Price per item
            'max_limit' => $this->integer()->null(), // Maximum limit of items that can be sold
            'group_for_item' => $this->integer()->null(), // Grouping for items, if applicable
            'amount_per_group' => $this->integer()->null(), // Amount per group, if applicable
        
            'status' => $this->boolean()->defaultValue(0), // 1 for active, 0 for closed
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        $this->addForeignKey('fk-sell_detail-created_by', '{{%mls_sell_detail}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-sell_detail-updated_by', '{{%mls_sell_detail}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-sell_detail-deleted_by', '{{%mls_sell_detail}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->addForeignKey('fk-sell_detail-sell_id', '{{%mls_sell_detail}}', 'sell_id', '{{%mls_sell}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-sell_detail-item_id', '{{%mls_sell_detail}}', 'item_id', '{{%mls_item}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sell_detail-sell_id', '{{%mls_sell_detail}}');
        $this->dropForeignKey('fk-sell_detail-item_id', '{{%mls_sell_detail}}');
        $this->dropForeignKey('fk-sell_detail-created_by', '{{%mls_sell_detail}}');
        $this->dropForeignKey('fk-sell_detail-updated_by', '{{%mls_sell_detail}}');
        $this->dropForeignKey('fk-sell_detail-deleted_by', '{{%mls_sell_detail}}');
        $this->dropTable('{{%mls_sell_detail}}');
    }
}
