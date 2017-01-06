<?php

use yii\db\Migration;

class m170106_071518_create_apply extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%apply}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('the row primary key'),
            'uid' => $this->integer(1)->notNull()->unsigned()->comment('user id'),
            'phone' => $this->string(20)->notNull()->comment('contact phone'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)->unsigned()->comment('apply status 0:pending 1:passed 2: not passed'),
            'created_at' => $this->integer(1)->unsigned()->notNull()->comment('apply timestamp'),
            'updated_at' => $this->integer(1)->unsigned()->notNull()->comment('update timestamp'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%apply}}');
        return true;
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
