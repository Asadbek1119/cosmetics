<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_info".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $country
 * @property int|null $postcode
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $created_at
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address', 'city', 'country', 'phone', 'email', 'postcode'], 'required'],
            [['postcode'], 'integer'],
            [['email'], 'email'],
            [['first_name', 'last_name', 'address', 'city', 'country', 'phone', 'created_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'Ism'),
            'last_name' => Yii::t('app', 'Familya'),
            'address' => Yii::t('app', 'Manzil'),
            'city' => Yii::t('app', 'Shahar'),
            'country' => Yii::t('app', 'Davlat'),
            'postcode' => Yii::t('app', 'Pochta indeksi'),
            'phone' => Yii::t('app', 'Telefon raqam'),
            'email' => Yii::t('app', 'E-Pochta'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
        ];
    }
}
