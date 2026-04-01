<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_permissions".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 */
class MasterPermission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['description'], 'string'],
            [['code', 'name'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
