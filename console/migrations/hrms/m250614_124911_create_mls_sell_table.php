<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_sell}}`.
 */
class m250614_124911_create_mls_sell_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_sell}}', [
            'id' => $this->primaryKey(),
            'sell_no' => $this->string()->notNull()->unique(),
            'month_year' => $this->string()->notNull(), // Format: YYYY-MM
            'open_date' => $this->integer()->notNull(), // Timestamp for opening date
            'close_date' => $this->integer()->null(), // Timestamp for closing date
            'remarks' => $this->text()->null(), // Additional remarks or notes
        
            'status' => $this->boolean()->defaultValue(0), // 1 for active, 0 for closed
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        // $this->addForeignKey('fk-supply-supplier_id', '{{%mls_supply}}', 'supplier_id', '{{%mls_supplier}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-sell-created_by', '{{%mls_sell}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-sell-updated_by', '{{%mls_sell}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-sell-deleted_by', '{{%mls_sell}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->createIndex('idx-sell-code', '{{%mls_sell}}', 'sell_no');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sell-created_by', '{{%mls_sell}}');
        $this->dropForeignKey('fk-sell-updated_by', '{{%mls_sell}}');
        $this->dropForeignKey('fk-sell-deleted_by', '{{%mls_sell}}');
        $this->dropIndex('idx-sell-code', '{{%mls_sell}}');
        $this->dropTable('{{%mls_sell}}');
    }
}
