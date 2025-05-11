<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%re_registration}}`.
 */
class m250711_114028_create_re_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%re_registration}}', [
            'id' => $this->primaryKey(),
            'prev_semreg' => $this->string(255)->notNull(),
            'prev_srd2' => $this->string(255)->notNull(),
            'std_relId' => $this->integer()->notNull(),
            'prev_gas_relId' => $this->integer()->notNull(),
            'new_gas_relId' => $this->integer(),
            'course_relId' => $this->integer()->notNull(),
            'new_coff2det_relId' => $this->integer(),
            'trail_count' => $this->smallInteger(1)->notNull(),
            'reg_approved' => $this->smallInteger(1)->defaultValue(0),
            'reg_approved_at' => $this->integer(),
            'reg_approved_by' => $this->integer(),
            'dept_approved' => $this->smallInteger(1)->defaultValue(0),
            'dept_approved_at' => $this->integer(),
            'dept_approved_by' => $this->integer(),
            'admin_processed' => $this->smallInteger(1)->defaultValue(0),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()->null(),
            'deleted_by' => $this->integer()->null(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'data' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk-re_registration-prev_gas_relId','{{%re_registration}}','prev_gas_relId','{{%w_group_assignment}}','id','RESTRICT','RESTRICT');
        $this->addForeignKey('fk-re_registration-new_gas_relId','{{%re_registration}}','new_gas_relId','{{%w_group_assignment}}','id','RESTRICT','RESTRICT');

        $this->addForeignKey('fk-re_registration-std_relId','{{%re_registration}}','std_relId','{{%student}}','id','RESTRICT','RESTRICT');
        $this->addForeignKey('fk-re_registration-course_relId','{{%re_registration}}','course_relId','{{%course}}','id','RESTRICT','RESTRICT');
        $this->addForeignKey('fk-re_registration-new_coff2det_relId','{{%re_registration}}','new_coff2det_relId','{{%course_offering2_detail}}','id','RESTRICT','RESTRICT');

        $this->addForeignKey('fk-re_registration-reg_approved_by','{{%re_registration}}','reg_approved_by','{{%user}}','id','RESTRICT','RESTRICT');
        $this->addForeignKey('fk-re_registration-dept_approved_by','{{%re_registration}}','dept_approved_by','{{%user}}','id','RESTRICT','RESTRICT');
        
        $this->addForeignKey('fk-re_registration-created_by','{{%re_registration}}','created_by','{{%user}}','id','RESTRICT','RESTRICT');
        $this->addForeignKey('fk-re_registration-updated_by','{{%re_registration}}','updated_by','{{%user}}','id','RESTRICT','CASCADE');
        $this->addForeignKey('fk-re_registration-deleted_by','{{%re_registration}}','deleted_by','{{%user}}','id','SET NULL','RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-re_registration-created_by', '{{%re_registration}}');
        $this->dropForeignKey('fk-re_registration-updated_by', '{{%re_registration}}');
        $this->dropForeignKey('fk-re_registration-deleted_by', '{{%re_registration}}');
        $this->dropTable('{{%re_registration}}');
    }
}
