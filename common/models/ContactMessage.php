<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "contact_messages".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property int|null $is_read
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class ContactMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contact_messages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            [['body'], 'string'],
            [['is_read', 'created_at', 'updated_at'], 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Pengirim',
            'email' => 'Alamat Email',
            'subject' => 'Subjek',
            'body' => 'Pesan',
            'is_read' => 'Sudah Dibaca',
            'created_at' => 'Dikirim Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }
}
