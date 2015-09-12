<?php

use yii\db\Schema;
use yii\db\Migration;

class m150911_093700_0 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%application}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'info' => Schema::TYPE_TEXT,
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pic' => Schema::TYPE_BOOLEAN,
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%application}}');
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
