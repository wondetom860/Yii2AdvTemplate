<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_share_item}}`.
 */
class m250614_130301_create_mls_share_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_share_item}}', [
            'id' => $this->primaryKey(),
            'sell_detail_id' => $this->integer()->notNull(), // Foreign key to mls_sell_detail
            'item_id' => $this->integer()->notNull(), // Foreign key to mls_item
            'group_code' => $this->string(10)->notNull(), // Number of items available for sharing
            'group_size' => $this->integer()->null(), // Size of the group for sharing, if applicable
            'amount_per_group' => $this->integer()->null(), // Amount per group, if applicable
            'amount_per_person' => $this->integer()->null(), // Amount per person, if applicable
            'members' => $this->text()->null(), // List of members in the group, if applicable
            'membres_count' => $this->integer()->null(), // Count of members in the group, if applicable
        
            'status' => $this->boolean()->defaultValue(0), // 1 for active, 0 for closed
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('fk-share_item-created_by', '{{%mls_share_item}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-share_item-updated_by', '{{%mls_share_item}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-share_item-deleted_by', '{{%mls_share_item}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->addForeignKey('fk-share_item-sell_detail_id', '{{%mls_share_item}}', 'sell_detail_id', '{{%mls_sell_detail}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-share_item-item_id', '{{%mls_share_item}}', 'item_id', '{{%mls_item}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx-share_item-group_code', '{{%mls_share_item}}', 'group_code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-share_item-created_by', '{{%mls_share_item}}');
        $this->dropForeignKey('fk-share_item-updated_by', '{{%mls_share_item}}');
        $this->dropForeignKey('fk-share_item-deleted_by', '{{%mls_share_item}}');

        $this->dropIndex('idx-share_item-group_code', '{{%mls_share_item}}');
        $this->dropForeignKey('fk-share_item-sell_detail_id', '{{%mls_share_item}}');
        $this->dropForeignKey('fk-share_item-item_id', '{{%mls_share_item}}');
        
        $this->dropTable('{{%mls_share_item}}');
    }
}
