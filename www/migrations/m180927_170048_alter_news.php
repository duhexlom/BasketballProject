<?php

use yii\db\Migration;

/**
 * Class m180927_170048_alter_news
 */
class m180927_170048_alter_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('{{%news}}', 'image', $this->string()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%news}}', 'image');
    }

}
