<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_product}}`.
 */
class m250614_103445_create_mls_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'code' => $this->string()->notNull()->unique(),
            'product_name' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'supply_origin' => $this->string()->notNull(),// e.g., "Local", "Imported"
            'unit' => $this->string()->notNull(), // e.g., "kg", "pcs", "liters"
            'min_shelf_load' => $this->integer()->notNull(), // Minimum shelf load quantity

            'status' => $this->boolean()->defaultValue(1), // 1 for active, 0 for inactive
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        $this->addForeignKey('fk-product-category_id', '{{%mls_product}}', 'category_id', '{{%mls_product_category}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx-product-code', '{{%mls_product}}', 'code');
        $this->addForeignKey('fk-product-created_by', '{{%mls_product}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-product-updated_by', '{{%mls_product}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-product-deleted_by', '{{%mls_product}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-created_by', '{{%mls_product}}');
        $this->dropForeignKey('fk-product-updated_by', '{{%mls_product}}');
        $this->dropForeignKey('fk-product-deleted_by', '{{%mls_product}}');
        $this->dropForeignKey('fk-product-category_id', '{{%mls_product}}');
        $this->dropIndex('idx-product-code', '{{%mls_product}}');
        $this->dropTable('{{%mls_product}}');
    }
}
