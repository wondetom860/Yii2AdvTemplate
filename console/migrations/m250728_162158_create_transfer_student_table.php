<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transfer_student}}`.
 */
class m250728_162158_create_transfer_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transfer_student}}', [
            'id' => $this->primaryKey(),
            'std_relId' => $this->integer()->notNull(),
            'transfered_from' => $this->string(255)->notNull(),
            'year_admitted' => $this->string()->notNull()->defaultValue('2019/20'),
            'year_transfered' => $this->integer()->notNull()->comment("link to school year id"),
            'sgpa' => $this->decimal(5, 3)->notNull()->defaultValue(0.00),
            'cgpa' => $this->decimal(5, 3)->notNull()->defaultValue(0.00),
            'exempted_course_ids' => $this->text()->null(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-transfer_student-created_by', '{{%transfer_student}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-transfer_student-updated_by', '{{%transfer_student}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-transfer_student-deleted_by', '{{%transfer_student}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');

        $this->addForeignKey('fk-transfer_student-year_transfered', '{{%transfer_student}}', 'year_transfered', '{{%ac_academic_year}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-transfer_student-std_relId', '{{%transfer_student}}', 'std_relId', '{{%student}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transfer_student-year_transfered', '{{%transfer_student}}');
        $this->dropForeignKey('fk-transfer_student-std_relId', '{{%transfer_student}}');
        
        $this->dropForeignKey('fk-transfer_student-created_by', '{{%transfer_student}}');
        $this->dropForeignKey('fk-transfer_student-updated_by', '{{%transfer_student}}');
        $this->dropForeignKey('fk-transfer_student-deleted_by', '{{%transfer_student}}');
        $this->dropTable('{{%transfer_student}}');
    }
}
