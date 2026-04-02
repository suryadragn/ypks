<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "social_program_type".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 *
 * @property SocialProgram[] $socialPrograms
 */
class SocialProgramType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%social_program_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'icon'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Referensi',
            'description' => 'Deskripsi',
            'icon' => 'Ikon (FontAwesome)',
        ];
    }

    /**
     * Gets query for [[SocialPrograms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSocialPrograms()
    {
        return $this->hasMany(SocialProgram::class, ['type_id' => 'id']);
    }
}
