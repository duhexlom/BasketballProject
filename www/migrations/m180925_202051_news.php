<?php

use yii\db\Migration;

/**
 * Class m180925_202051_news
 */
class m180925_202051_news extends Migration
{
   public function up()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
