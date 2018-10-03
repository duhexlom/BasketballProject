<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    public $file;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time(),
            ],
        ];
    }
    
    public function upload(\yii\web\UploadedFile $file)
    {
        $imageName = uniqid() . '.' . $file->extension;
        $file->saveAs(Yii::getAlias('@webroot') . '/uploads/image/' . $imageName);
        $this->image = $imageName;
    }
    
    public function getImage()
    {
        return '/uploads/image/' . $this->image; 
    }
    
    public function deleteImage()
    {
        unlink(Yii::getAlias('@webroot') . '/uploads/image/' . $this->image);
    }
}
