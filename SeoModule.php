<?php

namespace zrk4939\modules\seo;


use zrk4939\modules\seo\models\Seo;
use Yii;

class SeoModule extends \yii\base\Module
{
    public $titlePostfix = '';

    public $enabledTags = [
        'title',
        'description',
        'keywords',
        'og:image'
    ];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'zrk4939\modules\seo\controllers';

    public $defaultDescription = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }

    /**
     * @return array|null|Seo
     */
    public static function getMeta()
    {
        $url = (Yii::$app->request->url === '') ? '/' : Yii::$app->request->url;
        $model = Seo::find()->where(['url' => $url])->one();
        return $model;
    }

    /**
     * @return string
     */
    public static function getDescription()
    {
        return SeoModule::getInstance()->defaultDescription;
    }

    /**
     * @return array
     */
    public static function getConfig()
    {
        $module = SeoModule::getInstance();

        return [
            'titlePostfix' => $module->titlePostfix,
        ];
    }

    /**
     * @return array
     */
    public static function getEnabledTags()
    {
        $tags = SeoModule::getInstance()->enabledTags;

        return array_combine($tags, $tags);
    }
}