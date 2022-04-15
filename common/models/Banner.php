<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string|null $img
 * @property string  $title
 * @property string $subtitle
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property BannerLang[] $bannerLangs
 */
class Banner extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title','subtitle','description','button_label','created_at','updated_at'], 'string'],
            [['img'], 'image'],
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
                    'description',
                    'button_label',
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/banner/{id}',
                'url' => '/uploads/banner/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 870, 'height'=>431],
                ],
            ],
            [
                'class' => TimestampBehavior::class,
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
            'img' => Yii::t('app', 'Rasm'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' => Yii::t('app', 'Tahrirlangan vaqti'),
            'status' => Yii::t('app', 'Holati'),
            'title' => Yii::t('app', 'Sarlavha'),
            'subtitle' => Yii::t('app', 'Ikkinchi sarlavha'),
            'description' => Yii::t('app', 'Tavsif'),
            'button_label' => Yii::t('app', 'Tugma yorlig\'i'),
        ];
    }
    public static function getStatusFilter(){
        return[
            self::STATUS_ACTIVE => 'FAOL',
            self::STATUS_INACTIVE => 'FAOL EMAS',
        ];
    }

    /**
     * @throws \Exception
     */
    public function getStatusLabel(){
        return ArrayHelper::getValue(self::getStatusFilter(),$this->status);
    }

    public function getImage(){
        return $this->getThumbUploadUrl('img','thumb');
    }
}
