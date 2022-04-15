<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "footer_business".
 *
 * @property int $id
 * @property int|null $status
 * @property string $week_days
 * @property string $work_hours
 *
 * @property FooterBusinessLang[] $footerBusinessLangs
 */
class FooterBusiness extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'footer_business';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['week_days','work_hours'], 'string'],
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
                    'week_days',
                    'work_hours',
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
            'week_days' => Yii::t('app', 'Hafta kunlari'),
            'week_hours' => Yii::t('app', 'Soatlar'),
            'status' => Yii::t('app', 'Holati'),
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
}
