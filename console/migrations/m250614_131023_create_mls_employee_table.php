<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mls_employee}}`.
 */
class m250614_131023_create_mls_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mls_employee}}', [
            'id' => $this->primaryKey(),
            'person_relId' => $this->integer()->notNull(), // Foreign key to person table
            'department_id' => $this->integer()->notNull(), // Foreign key to department table
            'full_name' => $this->string()->notNull(),
            'marital_status' => $this->integer(1)->notNull(), // Unique email for the employee
            'card_number' => $this->string()->notNull()->unique(), // Unique card number for the employee
            'card_status' => $this->integer(1)->notNull()->defaultValue(1), // Status of the card (e.g., active, inactive)
            'date_issued' => $this->date()->notNull(), // Date when the card was issued
            'date_expired' => $this->date()->notNull(), // Date when the card expires
            'approved_by' => $this->integer()->null(), // Foreign key to user who approved the employee
            'approved_at' => $this->integer()->null(), // Timestamp when the employee was approved
            'approved_status' => $this->boolean()->defaultValue(0), // 1 for approved, 0 for pending
            'approved_note' => $this->text()->null(), // Note regarding the approval status
            
            'status' => $this->boolean()->defaultValue(0), // 1 for active, 0 for closed
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('fk-employee-created_by', '{{%mls_employee}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-employee-updated_by', '{{%mls_employee}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-employee-deleted_by', '{{%mls_employee}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->addForeignKey('fk-employee-person_relId', '{{%mls_employee}}', 'person_relId', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-employee-department_id', '{{%mls_employee}}', 'department_id', '{{%loq_position_detail}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx-employee-card_number', '{{%mls_employee}}', 'card_number');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropForeignKey('fk-employee-created_by', '{{%mls_employee}}');
        $this->dropForeignKey('fk-employee-updated_by', '{{%mls_employee}}');
        $this->dropForeignKey('fk-employee-deleted_by', '{{%mls_employee}}');

        $this->dropForeignKey('fk-employee-person_relId', '{{%mls_employee}}');
        $this->dropForeignKey('fk-employee-department_id', '{{%mls_employee}}');
        $this->dropIndex('idx-employee-card_number', '{{%mls_employee}}');

        $this->dropTable('{{%mls_employee}}');
    }
}
