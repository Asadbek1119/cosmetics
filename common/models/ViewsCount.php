<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "views_count".
 *
 * @property int $id
 * @property int|null $blog_news_id
 * @property int|null $user_id
 * @property string|null $created_at
 *
 * @property BlogNews $blogNews
 * @property User $user
 */
class ViewsCount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'views_count';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_news_id', 'user_id'], 'integer'],
            [['created_at'], 'string', 'max' => 255],
            [['blog_news_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogNews::className(), 'targetAttribute' => ['blog_news_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'blog_news_id' => Yii::t('app', 'Yangilik ID'),
            'user_id' => Yii::t('app', 'Foydalanuvchi ID'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
        ];
    }

    /**
     * Gets query for [[BlogNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogNews()
    {
        return $this->hasOne(BlogNews::className(), ['id' => 'blog_news_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
