<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "foundation_config".
 *
 * @property int $id
 * @property string $version_name
 * @property string $vision
 * @property string $mission
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $postal_code
 * @property int|null $is_active
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class FoundationConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%foundation_config}}';
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
            [['version_name', 'vision', 'mission'], 'required'],
            [['vision', 'mission', 'address'], 'string'],
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['version_name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['postal_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'version_name' => 'Nama Versi',
            'vision' => 'Visi',
            'mission' => 'Misi (Pisahkan dengan Enter)',
            'address' => 'Alamat',
            'phone' => 'Telepon/Fax',
            'email' => 'Email Resmi',
            'postal_code' => 'Kode Pos',
            'is_active' => 'Status Aktif',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    /**
     * Deactivates all other versions when one is activated.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->is_active) {
                static::updateAll(['is_active' => 0]);
            }
            return true;
        }
        return false;
    }
    
    /**
     * @return static|null The currently active configuration
     */
    public static function getActive()
    {
        return static::findOne(['is_active' => 1]) ?: static::find()->orderBy(['id' => SORT_DESC])->one();
    }
}
