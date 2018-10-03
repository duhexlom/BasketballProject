<?php

use yii\db\Migration;

/**
 * Class m180926_172801_team
 */
class m180926_172801_team extends Migration
{
   public function up()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%team}}');
    }
}