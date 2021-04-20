<?php

use yii\db\Migration;

/**
 * Class m200528_141709_revise
 */
class m200528_141709_revise extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('revise', [
            'id' => $this->primaryKey(),
            'article_id'=>$this->integer(),
            'ip'=>$this->string(45),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200528_141709_revise cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200528_141709_revise cannot be reverted.\n";

        return false;
    }
    */
}
