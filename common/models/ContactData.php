<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "contact_data".
 *
 * @property int $id
 * @property string|null $icon
 * @property string|null $title
 * @property string|null $subtitle
 * @property int|null $status
 *
 * @property ContactDataLang[] $contactDataLangs
 */
class ContactData extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['icon','title','subtitle'], 'string', 'max' => 255],
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
                    'title',
                    'subtitle',
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
            'icon' => Yii::t('app', 'Ikonka'),
            'title' => Yii::t('app', 'Sarlavha'),
            'subtitle' => Yii::t('app', 'Ikkinchi sarlavha'),
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
