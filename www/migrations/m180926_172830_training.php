<?php

use yii\db\Migration;

/**
 * Class m180926_172830_training
 */
class m180926_172830_training extends Migration {

    public function up() {
        $this->createTable('{{%training}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'date' => $this->dateTime()->notNull(),
            'place' => $this->string()->notNull(),
            'team_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_team_training', '{{%training}}', 'team_id', '{{%team}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down() {
        $this->dropForeignKey('fk_team_training' , '{{%training}}');
        $this->dropTable('{{%training}}');
    }

}
