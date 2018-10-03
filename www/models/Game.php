<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property string $place
 * @property int $team_one_id
 * @property int $team_two_id
 * @property int $result
 *
 * @property Team $teamOne
 * @property Team $teamTwo
 */
class Game extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['title', 'date', 'place', 'team_one_id', 'team_two_id', 'result'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['team_one_id', 'team_two_id', 'result'], 'integer'],
            [['title', 'place'], 'string', 'max' => 255],
            [['team_one_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_one_id' => 'id']],
            [['team_two_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_two_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'date' => 'Дата',
            'place' => 'Площадка',
            'team_one_id' => 'Первая команда',
            'team_two_id' => 'Вторая команда',
            'result' => 'Результат',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamOne() {
        return $this->hasOne(Team::className(), ['id' => 'team_one_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamTwo() {
        return $this->hasOne(Team::className(), ['id' => 'team_two_id']);
    }

    public static function getResultLabel($result = null) {
        $results = [
            0 => 'Ожидается',
            1 => 'Победа команды 1',
            2 => 'Победа команды 2',
            3 => 'Ничья',
            4 => 'Отменена'
        ];

        return $result ? $results[$result] : $results;
    }

}
