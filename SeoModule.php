<?php

namespace zrk4939\modules\seo;


use zrk4939\modules\seo\models\Seo;
use Yii;

class SeoModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'zrk4939\modules\seo\controllers';

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
}