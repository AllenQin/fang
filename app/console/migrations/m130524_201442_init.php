<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('the row primary key'),
            'username' => $this->string()->notNull()->unique()->comment('username'),
            'auth_key' => $this->string(32)->notNull()->comment('id auth key'),
            'password_hash' => $this->string()->notNull()->comment('user password'),
            'password_reset_token' => $this->string()->unique()->comment('user password token'),
            'email' => $this->string()->notNull()->unique()->comment('user email'),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)->unsigned()->comment('user status 1:already active, 10:not active'),
            'created_at' => $this->integer(1)->unsigned()->notNull()->comment('user register timestamp'),
            'updated_at' => $this->integer(1)->unsigned()->notNull()->comment('user info update timestamp'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
