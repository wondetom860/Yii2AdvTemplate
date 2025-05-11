<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exempted_course}}`.
 */
class m250728_172445_create_exempted_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exempted_course}}', [
            'id' => $this->primaryKey(),
            'ts_relId' => $this->integer()->notNull(),
            'course_code' => $this->string(20)->notNull(),
            'course_name' => $this->string(255)->notNull(),
            'course_hours' => $this->smallInteger()->notNull(),
            'grade_obtained' => $this->string(3)->notNull(),
            'grade_point' => $this->decimal(3, 2)->notNull()->defaultValue(0.00),
            'grade_point_sum' => $this->decimal(5, 2)->notNull()->defaultValue(0.00),
            'equivalent_course_ids' => $this->text()->null(),
            'approved' => $this->smallInteger(1)->notNull()->defaultValue(0)->comment('0: not approved, 1: approved'),
            
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-exempted_course-ts_relId', '{{%exempted_course}}', 'ts_relId', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-exempted_course-created_by', '{{%exempted_course}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-exempted_course-updated_by', '{{%exempted_course}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-exempted_course-deleted_by', '{{%exempted_course}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-exempted_course-created_by', '{{%exempted_course}}');
        $this->dropForeignKey('fk-exempted_course-updated_by', '{{%exempted_course}}');
        $this->dropForeignKey('fk-exempted_course-deleted_by', '{{%exempted_course}}');
        $this->dropTable('{{%exempted_course}}');
    }
}
