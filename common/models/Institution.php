<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutions".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $logo
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Institution extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'logo', 'external_link', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at', 'is_active'], 'integer'],
            [['name', 'logo', 'external_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Lembaga',
            'description' => 'Deskripsi',
            'logo' => 'Logo',
            'external_link' => 'Link Eksternal',
            'is_active' => 'Status Aktif',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    public function getProfile()
    {
        return $this->hasOne(InstitutionProfile::class, ['institution_id' => 'id']);
    }
}
