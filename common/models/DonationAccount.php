<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donation_account".
 *
 * @property int $id
 * @property string $bank_name
 * @property string $account_number
 * @property string $account_holder
 * @property string|null $contact_name
 * @property string|null $contact_phone
 * @property int|null $is_active
 */
class DonationAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%donation_account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_name', 'account_number', 'account_holder'], 'required'],
            [['is_active'], 'integer'],
            [['bank_name', 'account_holder', 'contact_name'], 'string', 'max' => 100],
            [['account_number'], 'string', 'max' => 50],
            [['contact_phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_name' => 'Nama Bank',
            'account_number' => 'Nomor Rekening',
            'account_holder' => 'Atas Nama',
            'contact_name' => 'Kontak Person (Nama)',
            'contact_phone' => 'Nomor WhatsApp CP',
            'is_active' => 'Aktif',
        ];
    }

    /**
     * Relasi ke model SocialProgram
     */
    public function getSocialPrograms()
    {
        return $this->hasMany(SocialProgram::class, ['donation_account_id' => 'id']);
    }
}
