<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gc_entry}}`.
 */
class m250715_165810_create_gc_entry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gc_entry}}', [
            'id' => $this->primaryKey(),
            'admission_relId' => $this->integer()->notNull(),
            'program_relId' => $this->integer()->notNull(),
            'dept_relId' => $this->integer()->notNull(),
            'spec_relId' => $this->integer(),
            'acad_year_relId' => $this->integer()->notNull(),
            'senate_approve_date' => $this->integer()->notNull(),
            'header_title' => $this->string(),


            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),

        ]);
        $this->addForeignKey('fk-gc_entry-admission_relId', '{{%gc_entry}}', 'admission_relId', '{{%admission}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_entry-program_relId', '{{%gc_entry}}', 'program_relId', '{{%program}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_entry-dept_relId', '{{%gc_entry}}', 'dept_relId', '{{%department}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_entry-spec_relId', '{{%gc_entry}}', 'spec_relId', '{{%specialization}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_entry-acad_year_relId', '{{%gc_entry}}', 'acad_year_relId', '{{%ac_academic_year}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('fk-gc_entry-created_by', '{{%gc_entry}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk-gc_entry-updated_by', '{{%gc_entry}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-gc_entry-deleted_by', '{{%gc_entry}}', 'deleted_by', '{{%user}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-gc_entry-admission_relId', '{{%gc_entry}}');
        $this->dropForeignKey('fk-gc_entry-program_relId', '{{%gc_entry}}');
        $this->dropForeignKey('fk-gc_entry-dept_relId', '{{%gc_entry}}');
        $this->dropForeignKey('fk-gc_entry-spec_relId', '{{%gc_entry}}');
        $this->dropForeignKey('fk-gc_entry-acad_year_relId', '{{%gc_entry}}');

        $this->dropForeignKey('fk-gc_entry-created_by', '{{%gc_entry}}');
        $this->dropForeignKey('fk-gc_entry-updated_by', '{{%gc_entry}}');
        $this->dropForeignKey('fk-gc_entry-deleted_by', '{{%gc_entry}}');

        $this->dropTable('{{%gc_entry}}');
    }
}
