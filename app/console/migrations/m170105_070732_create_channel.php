<?php

use yii\db\Migration;

class m170105_070732_create_channel extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%channel}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('the row primary key'),
            'uid' => $this->integer(1)->notNull()->unsigned()->comment('user id'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)->unsigned()->comment('channel status 0:playback 1:live'),
            'created_at' => $this->integer(1)->unsigned()->notNull()->comment('open channel timestamp'),
            'updated_at' => $this->integer(1)->unsigned()->notNull()->comment('channel update timestamp'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%channel}}');
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
