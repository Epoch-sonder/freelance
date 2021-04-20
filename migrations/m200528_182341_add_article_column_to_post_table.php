<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m200528_182341_add_article_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'time', $this->time()->after('date'));
        $this->addColumn('article', 'readtime', $this->integer()->notNull()->defaultValue(0)->after('date'));
        $this->addColumn('article', 'comments', $this->integer()->notNull()->defaultValue(0)->after('image'));
        $this->addColumn('article', 'engoy', $this->integer()->notNull()->defaultValue(0)->after('viewed'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
