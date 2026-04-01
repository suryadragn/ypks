<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "galleries".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Gallery extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galleries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['title', 'image'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
