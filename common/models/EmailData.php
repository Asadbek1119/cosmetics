<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "email_data".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $message
 * @property string|null $status
 * @property string|null $created_at
 */
class EmailData extends \yii\db\ActiveRecord
{
    const STATUS_VIEW = 0;
    const STATUS_VIEWED = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'name', 'phone'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['name', 'created_at'], 'string', 'max' => 255],
            ['phone', 'match', 'pattern' => '/\+[9][9][8] \([0-9][0-9]\) [0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Ismi'),
            'phone' => Yii::t('app', 'Telefon raqami'),
            'message' => Yii::t('app', 'Xabar matni'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
            'status' => Yii::t('app', 'Holati'),
        ];
    }

    public static function getStatusFilter()
    {
        return[
            self::STATUS_VIEW => "Ko'rilmagan",
            self::STATUS_VIEWED => "Ko'rilgan",
        ];
    }
    public function getStatusLabel()
    {
        return ArrayHelper::getValue(self::getStatusFilter(),$this->status);
    }

    public function getClearPhone()
    {
        return strtr($this->phone,
            [
                '(' => '',
                ')' => '',
                '-' => '',
                ' ' => '',
            ]);
    }
}
