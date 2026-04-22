<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "institution_profiles".
 *
 * @property int $id
 * @property int $institution_id
 * @property string|null $content
 * @property string|null $vision
 * @property string|null $mission
 * @property string|null $history
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $tiktok
 * @property string|null $youtube
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Institution $institution
 */
class InstitutionProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%institution_profiles}}';
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
            [['institution_id'], 'required'],
            [['institution_id', 'created_at', 'updated_at'], 'integer'],
            [['content', 'vision', 'mission', 'history'], 'string'],
            [['facebook', 'instagram', 'tiktok', 'youtube'], 'string', 'max' => 255],
            [['institution_id'], 'unique'],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::class, 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institution_id' => 'Lembaga',
            'content' => 'Konten Utama',
            'vision' => 'Visi',
            'mission' => 'Misi',
            'history' => 'Sejarah',
            'facebook' => 'Facebook URL',
            'instagram' => 'Instagram URL',
            'tiktok' => 'TikTok URL',
            'youtube' => 'YouTube URL',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    /**
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::class, ['id' => 'institution_id']);
    }
}
