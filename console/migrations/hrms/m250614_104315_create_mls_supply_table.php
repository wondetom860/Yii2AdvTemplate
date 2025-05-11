<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_supply}}`.
 */
class m250614_104315_create_mls_supply_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_supply}}', [
            'id' => $this->primaryKey(),
            'supplier_id' => $this->integer()->notNull(),
            'code' => $this->string()->notNull()->unique(),
            'total_price_supplier' => $this->decimal(10, 2)->notNull(), // Total price from supplier
            'total_price_customer' => $this->decimal(10, 2), // Total price for customer
            'approved_price' => $this->decimal(10, 2)->null(), // Approved price after negotiation
            'approved_by' => $this->integer()->null(), // User who approved the supply
            'approved_at' => $this->integer()->null(), // Timestamp of approval
        
            'status' => $this->boolean()->defaultValue(1), // 1 for active, 0 for inactive
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        $this->addForeignKey('fk-supply-supplier_id', '{{%mls_supply}}', 'supplier_id', '{{%mls_supplier}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-supply-created_by', '{{%mls_supply}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-supply-updated_by', '{{%mls_supply}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-supply-deleted_by', '{{%mls_supply}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->createIndex('idx-supply-code', '{{%mls_supply}}', 'code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-supply-created_by', '{{%mls_supply}}');
        $this->dropForeignKey('fk-supply-updated_by', '{{%mls_supply}}');
        $this->dropForeignKey('fk-supply-deleted_by', '{{%mls_supply}}');
        $this->dropForeignKey('fk-supply-supplier_id', '{{%mls_supply}}');
        $this->dropIndex('idx-supply-code', '{{%mls_supply}}');
        $this->dropTable('{{%mls_supply}}');
    }
}
