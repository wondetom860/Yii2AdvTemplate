<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_product_category}}`.
 */
class m250614_103148_create_mls_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'code' => $this->string()->notNull()->unique(),
            'status' => $this->boolean()->defaultValue(1), // 1 for active, 0 for inactive
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-product_category-created_by', '{{%mls_product_category}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-product_category-updated_by', '{{%mls_product_category}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-product_category-deleted_by', '{{%mls_product_category}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');
        $this->createIndex('idx-product_category-code', '{{%mls_product_category}}', 'code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product_category-created_by', '{{%mls_product_category}}');
        $this->dropForeignKey('fk-product_category-updated_by', '{{%mls_product_category}}');
        $this->dropForeignKey('fk-product_category-deleted_by', '{{%mls_product_category}}');
        $this->dropIndex('idx-product_category-code', '{{%mls_product_category}}');
        $this->dropTable('{{%mls_product_category}}');
    }
}
