<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property Game[] $games
 * @property Game[] $games0
 * @property Training[] $trainings
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['team_one_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames0()
    {
        return $this->hasMany(Game::className(), ['team_two_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainings()
    {
        return $this->hasMany(Training::className(), ['team_id' => 'id']);
    }
}
