<?php

use yii\db\Migration;

/**
 * Class m180926_172905_game
 */
class m180926_172905_game extends Migration {

    public function up() {
        $this->createTable('{{%game}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'date' => $this->dateTime()->notNull(),
            'place' => $this->string()->notNull(),
            'team_one_id' => $this->integer()->notNull(),
            'team_two_id' => $this->integer()->notNull(),
            'result' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_team_one_game', '{{%game}}', 'team_one_id', '{{%team}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_team_two_game', '{{%game}}', 'team_two_id', '{{%team}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down() {
        $this->dropForeignKey('fk_team_one_game', '{{%game}}');
        $this->dropForeignKey('fk_team_two_game', '{{%game}}');
        $this->dropTable('{{%game}}');
    }

}
