<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banner_ad".
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 */
class BannerAd extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner_ad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255],
            [['img'], 'image'],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/banner_ad/{id}',
                'url' => '/uploads/banner_ad/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 570, 'height'=>270],
                ],
            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
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
