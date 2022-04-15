<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "footer_links".
 *
 * @property int $id
 * @property string|null $url
 * @property string $name
 * @property string|null $created_at
 * @property int|null $status
 *
 * @property FooterLinksLang[] $footerLinksLangs
 */
class FooterLinks extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'footer_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['url', 'created_at','name'], 'string', 'max' => 255],
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
                    'name',
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
            'url' => Yii::t('app', 'Havolalar yo\'li'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
            'name' => Yii::t('app', 'Nomi'),
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
