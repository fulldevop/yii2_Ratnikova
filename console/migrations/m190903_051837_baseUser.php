<?php

use yii\db\Migration;

/**
 * Class m190903_051837_baseUser
 */
class m190903_051837_baseUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$user = new \common\models\User();
		$user->username = 'admin';
		$user->auth_key = 'sdd';
		$user->password_hash = Yii::$app->security->generatePasswordHash('123456');
		$user->email = 'test@test.ru';
		$user->status = \common\models\User::STATUS_ACTIVE;

		if (!$user->save()) {
			return false;
		}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190903_051837_baseUser cannot be reverted.\n";

        return false;
    }
    */
}
