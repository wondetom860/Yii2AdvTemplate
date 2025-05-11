<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gc_student}}`.
 */
class m250715_172811_create_gc_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gc_student}}', [
            'id' => $this->primaryKey(),
            'entry_relId' => $this->integer()->notNull(),
            'graduation_mode' => $this->smallInteger(1)->defaultValue(1)->comment('1:normal,2:delayed'),
            'total_credit_hr' => $this->integer(5)->notNull(),
            'course_count' => $this->smallInteger(3)->notNull(),
            'total_gps' => $this->decimal(7,4)->notNull(),
            'cgpa' => $this->decimal(7,3)->notNull(),
            'sgpa' => $this->decimal(7,3),
            'major_gpa' => $this->decimal(7,3),
            'last_srd2_relId' => $this->integer(),

            'reg_approved' => $this->smallInteger(1)->defaultValue(NULL),
            'reg_approved_at' => $this->integer(),
            'reg_approved_by' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);
        $this->addForeignKey('fk-gc_student-entry_relId', '{{%gc_student}}', 'entry_relId', '{{%gc_entry}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_student-last_srd2_relId', '{{%gc_student}}', 'last_srd2_relId', '{{%semester_registration_2_detail}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_student-reg_approved_by', '{{%gc_student}}', 'reg_approved_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('fk-gc_student-created_by', '{{%gc_student}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_student-updated_by', '{{%gc_student}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-gc_student-deleted_by', '{{%gc_student}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-gc_student-entry_relId', '{{%gc_student}}');
        $this->dropForeignKey('fk-gc_student-last_srd2_relId', '{{%gc_student}}');
        $this->dropForeignKey('fk-gc_student-reg_approved_by', '{{%gc_student}}');

        $this->dropForeignKey('fk-gc_student-created_by', '{{%gc_student}}');
        $this->dropForeignKey('fk-gc_student-updated_by', '{{%gc_student}}');
        $this->dropForeignKey('fk-gc_student-deleted_by', '{{%gc_student}}');
        $this->dropTable('{{%gc_student}}');
    }
}
