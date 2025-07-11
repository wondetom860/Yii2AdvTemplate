<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_cart_item}}`.
 */
class m250614_133022_create_mls_cart_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_cart_item}}', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer()->notNull(), // Foreign key to mls_cart
            'item_id' => $this->integer()->notNull(), // Foreign key to mls_item
            'sell_detail_id' => $this->integer()->null(), // Foreign key to mls_sell_detail, if applicable
            'quantity' => $this->integer()->notNull(), // Quantity of the item in the cart
            'quantity_allowed' => $this->integer()->null(), // Quantity allowed for the item, if applicable
            'price_per_item' => $this->decimal(10, 2)->notNull(), // Price per item in the cart
            'total_price' => $this->decimal(10, 2)->notNull(), // Total price for the items in the cart
            'group_shared_id' => $this->integer()->null(), // Foreign key to mls_share_item, if applicable

            'status' => $this->boolean()->defaultValue(0), // 1 for active, 0 for closed
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-cart_item-created_by', '{{%mls_cart_item}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-cart_item-updated_by', '{{%mls_cart_item}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-cart_item-deleted_by', '{{%mls_cart_item}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->addForeignKey('fk-cart_item-cart_id', '{{%mls_cart_item}}', 'cart_id', '{{%mls_cart}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-cart_item-item_id', '{{%mls_cart_item}}', 'item_id', '{{%mls_item}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-cart_item-sell_detail_id', '{{%mls_cart_item}}', 'sell_detail_id', '{{%mls_sell_detail}}', 'id', 'SET NULL', 'RESTRICT');
        $this->addForeignKey('fk-cart_item-group_shared_id', '{{%mls_cart_item}}', 'group_shared_id', '{{%mls_share_item}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-cart_item-created_by', '{{%mls_cart_item}}');
        $this->dropForeignKey('fk-cart_item-updated_by', '{{%mls_cart_item}}');
        $this->dropForeignKey('fk-cart_item-deleted_by', '{{%mls_cart_item}}');

        $this->dropForeignKey('fk-cart_item-cart_id', '{{%mls_cart_item}}');
        $this->dropForeignKey('fk-cart_item-item_id', '{{%mls_cart_item}}');
        $this->dropForeignKey('fk-cart_item-sell_detail_id', '{{%mls_cart_item}}');
        $this->dropForeignKey('fk-cart_item-group_shared_id', '{{%mls_cart_item}}');

        $this->dropTable('{{%mls_cart_item}}');
    }
}
