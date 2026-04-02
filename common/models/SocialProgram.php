<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "social_program".
 *
 * @property int $id
 * @property int $type_id
 * @property string $title
 * @property string $slug
 * @property string|null $summary
 * @property string|null $content
 * @property string|null $image
 * @property float|null $target_amount
 * @property float|null $current_amount
 * @property int|null $status
 * @property bool|null $is_featured
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SocialProgramType $type
 */
class SocialProgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%social_program}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'title'], 'required'],
            [['type_id', 'created_at', 'updated_at', 'donation_account_id'], 'integer'],
            [['content'], 'string'],
            [['target_amount', 'current_amount'], 'number'],
            [['status', 'is_featured'], 'boolean'],
            [['title', 'slug', 'image'], 'string', 'max' => 255],
            [['summary'], 'string', 'max' => 500],
            [['slug'], 'unique'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SocialProgramType::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Jenis Program',
            'title' => 'Judul Program',
            'slug' => 'Slug',
            'summary' => 'Ringkasan',
            'content' => 'Konten/Deskripsi Lengkap',
            'image' => 'Gambar/Cover',
            'target_amount' => 'Target Dana (Rp)',
            'current_amount' => 'Dana Terkumpul (Rp)',
            'status' => 'Status',
            'is_featured' => 'Program Unggulan',
            'created_at' => 'Tgl Dibuat',
            'updated_at' => 'Tgl Pembaruan',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(SocialProgramType::class, ['id' => 'type_id']);
    }

    /**
     * Relasi ke model DonationAccount (Referensi Rekening)
     */
    public function getDonationAccount()
    {
        return $this->hasOne(DonationAccount::class, ['id' => 'donation_account_id']);
    }
}
