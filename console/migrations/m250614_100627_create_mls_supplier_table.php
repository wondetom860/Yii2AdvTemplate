<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%supplier}}`.
 */
class m250614_100627_create_mls_supplier_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_supplier}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'code' => $this->string()->notNull()->unique(),
            'contact_person' => $this->string()->null(),

            'status' => $this->boolean()->defaultValue(1), // 1 for active, 0 for inactive
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-supplier-created_by','{{%mls_supplier}}','created_by','{{%user}}','id','RESTRICT','RESTRICT');
        $this->addForeignKey('fk-supplier-updated_by','{{%mls_supplier}}','updated_by','{{%user}}','id','RESTRICT','CASCADE');
        $this->addForeignKey('fk-supplier-deleted_by','{{%mls_supplier}}','deleted_by','{{%user}}','id','SET NULL','RESTRICT');
        $this->createIndex('idx-supplier-email', '{{%mls_supplier}}', 'email');
        $this->createIndex('idx-supplier-code', '{{%mls_supplier}}', 'code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-supplier-created_by', '{{%mls_supplier}}');
        $this->dropForeignKey('fk-supplier-updated_by', '{{%mls_supplier}}');
        $this->dropForeignKey('fk-supplier-deleted_by', '{{%mls_supplier}}');
        $this->dropIndex('idx-supplier-email', '{{%mls_supplier}}');
        $this->dropIndex('idx-supplier-code', '{{%mls_supplier}}');
        $this->dropTable('{{%mls_supplier}}');
    }
}
