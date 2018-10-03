<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property string $place
 * @property int $team_id
 *
 * @property Team $team
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date', 'place', 'team_id'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['team_id'], 'integer'],
            [['title', 'place'], 'string', 'max' => 255],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'date' => 'Дата',
            'place' => 'Место',
            'team_id' => 'Команда',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }
}
