<?php

namespace zrk4939\modules\seo\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "meta".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $image_url
 * @property boolean $manual
 * @property integer $created_at
 * @property integer $updated_at
 * @property boolean $status
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url', 'title', 'keywords', 'image_url'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['url'], 'unique'],
            [['manual', 'status'], 'boolean'],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => false,
            'url' => 'URL',
            'title' => 'Заголовок (title)',
            'keywords' => 'Ключевые слова (keywords)',
            'description' => 'Описание (description)',
            'image_url' => 'Фото',
            'manual' => 'Указать вручную',
            'status' => 'Активно'
        ];
    }
}
