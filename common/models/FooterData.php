<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "footer_data".
 *
 * @property int $id
 * @property int|null $status
 * @property string| $address
 * @property string| $phone
 * @property string| $email
 *
 * @property FooterDataLang[] $footerDataLangs
 */
class FooterData extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'footer_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['address','email',], 'string'],
            ['phone', 'match', 'pattern' => '/\+[9][9][8] \([0-9][0-9]\) [0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]/'],
        ];
    }
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'Uzbek',
                    'ru' => 'Русский',
                    'en' => 'English',
                ],
                'attributes' => [
                    'address',
                    'phone',
                    'email',
                ]
            ],
        ];
    }

    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Holati'),
            'phone' => Yii::t('app', 'Telefon raqam'),
            'email' => Yii::t('app', 'E-Pochta'),
            'address' => Yii::t('app', 'Manzil'),
        ];
    }
    public static function getStatusFilter()
    {
        return [
            self::STATUS_ACTIVE => 'FAOL',
            self::STATUS_INACTIVE => 'FAOL EMAS',
        ];
    }

    public function getStatusLabel()
    {
        return ArrayHelper::getValue(self::getStatusFilter(), $this->status);
    }
    public function clearPhone()
    {
        return strtr($this->phone,[
            '(' => '',
            ')' => '',
            '-' => '',
            ' ' => '',
        ]);
    }
}
