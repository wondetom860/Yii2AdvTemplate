<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_cart}}`.
 */
class m250614_132308_create_mls_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_cart}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer()->notNull(), // Foreign key to mls_employee
            'sell_id' => $this->integer()->notNull(), // Foreign key to mls_sell, can be null if not yet sold
            'cart_number' => $this->string()->notNull()->unique(), // Unique cart number
            'cart_date' => $this->date()->notNull(), // Date of the cart
            'remarks' => $this->text()->null(), // Additional remarks or notes
            'total_price' => $this->decimal(10, 2)->notNull(), // Total price of the cart
            'paid_status' => $this->boolean()->defaultValue(0), // 1 for paid, 0 for unpaid
            'paid_amount' => $this->decimal(10, 2)->defaultValue(0.00), // Amount paid, default to 0
            'paid_date' => $this->date()->null(), // Date of payment, can be null if not yet paid
            'paid_by' => $this->integer()->null(), // User who made the payment, can be null if not yet paid
            'paid_method' => $this->string()->null(), // Payment method, can be null if not yet paid
            'paid_reference' => $this->string()->null(), // Reference for the payment, can be null if not yet paid
            'paid_status' => $this->boolean()->defaultValue(0), // 1 for paid, 0 for unpaid
            'checked_out' => $this->boolean()->defaultValue(0), // 1 for checked out, 0 for not checked out
            'checked_out_at' => $this->date()->null(), // Date of checkout, can be null if not yet checked out
        
            'status' => $this->boolean()->defaultValue(0), // 1 for active, 0 for closed
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('fk-cart-created_by', '{{%mls_cart}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-cart-updated_by', '{{%mls_cart}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-cart-deleted_by', '{{%mls_cart}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->addForeignKey('fk-cart-employee_id', '{{%mls_cart}}', 'employee_id', '{{%mls_employee}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-cart-sell_id', '{{%mls_cart}}', 'sell_id', '{{%mls_sell}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx-cart-cart_number', '{{%mls_cart}}', 'cart_number');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-cart-created_by', '{{%mls_cart}}');
        $this->dropForeignKey('fk-cart-updated_by', '{{%mls_cart}}');
        $this->dropForeignKey('fk-cart-deleted_by', '{{%mls_cart}}');

        $this->dropForeignKey('fk-cart-employee_id', '{{%mls_cart}}');
        $this->dropForeignKey('fk-cart-sell_id', '{{%mls_cart}}');
        $this->dropIndex('idx-cart-cart_number', '{{%mls_cart}}');

        $this->dropTable('{{%mls_cart}}');
    }
}
