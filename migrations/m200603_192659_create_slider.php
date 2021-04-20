<?php

use yii\db\Migration;

/**
 * Class m200603_192659_create_slider
 */
class m200603_192659_create_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->string(),
            'image'=>$this->string(),
            'number'=>$this->integer(),
            'href'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200603_192659_create_slider cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200603_192659_create_slider cannot be reverted.\n";

        return false;
    }
    */
}
