<?php

use yii\db\Schema;
use yii\db\Migration;

class m150911_104408_1 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //create group table
        $this->createTable('{{%group}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
        //create application to group table
        $this->createTable('{{%application_to_group}}', [
            'id' => Schema::TYPE_PK,
            'application_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        $this->addForeignKey(
            'fk_application_id',
            "{{%application_to_group}}",
            'application_id',
            '{{%application}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_group_id',
            "{{%application_to_group}}",
            'group_id',
            '{{%group}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%application_to_group}}');
        $this->dropTable('{{%group}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
