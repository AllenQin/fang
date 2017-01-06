<?php

use yii\db\Migration;

class m170106_033507_create_live extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%live}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('the row primary key'),
            'channel_id' => $this->integer(11)->notNull()->unsigned()->comment('channel id'),
            'url' => $this->string()->notNull()->comment('video url'),
            'app' => $this->string()->notNull()->comment('stream app name'),
            'stream' => $this->string()->notNull()->comment('stream name'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)->unsigned()->comment('live status 0: not yet started, 1: already start'),
            'created_at' => $this->integer(1)->unsigned()->notNull()->comment('created timestamp'),
            'updated_at' => $this->integer(1)->unsigned()->notNull()->comment('updated timestamp'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%live}}');
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
