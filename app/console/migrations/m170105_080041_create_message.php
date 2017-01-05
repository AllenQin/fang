<?php

use yii\db\Migration;

class m170105_080041_create_message extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('the row primary key'),
            'uid' => $this->integer(1)->notNull()->unsigned()->comment('user id'),
            'channel_id' => $this->integer(11)->notNull()->unsigned()->comment('channel id'),
            'type' => $this->smallInteger(1)->notNull()->defaultValue(1)->unsigned()->comment('message type 1:msg 2:action'),
            'content' => $this->string()->notNull()->comment('message content'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)->unsigned()->comment('play status 0:already deleted 1:normal status'),
            'created_at' => $this->integer(1)->unsigned()->notNull()->comment('created timestamp'),
            'updated_at' => $this->integer(1)->unsigned()->notNull()->comment('updated timestamp'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%message}}');
        return true;
    }
}
