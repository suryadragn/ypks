<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Page extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['title', 'slug'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
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
            'slug' => 'Slug',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
