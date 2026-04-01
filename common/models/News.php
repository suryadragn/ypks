<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $image
 * @property string|null $author
 * @property string|null $publish_date
 * @property string|null $category
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class News extends \yii\db\ActiveRecord
{


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
            [['content', 'image', 'author', 'publish_date', 'category', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 10],
            [['title'], 'required'],
            [['content'], 'string'],
            [['publish_date'], 'safe'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'image', 'author', 'category'], 'string', 'max' => 255],
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
            'content' => 'Content',
            'image' => 'Image',
            'author' => 'Author',
            'publish_date' => 'Publish Date',
            'category' => 'Category',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
