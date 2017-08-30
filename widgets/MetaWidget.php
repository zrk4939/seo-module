<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 10.10.2016
 * Time: 11:30
 */

namespace zrk4939\modules\seo\widgets;

use zrk4939\modules\seo\models\Seo;
use Yii;
use yii\base\Widget;

class MetaWidget extends Widget
{
    public $addCanonical = true;
    public $addAlternateMobile = false;

    public function run()
    {
        $url = (Yii::$app->request->url === '') ? '/' : Yii::$app->request->url;
        $model = Seo::find()->where(['url' => $url])->one();

        if (empty($model)) {
            return false;
        }

        return $this->render('head', [
            'model' => $model,
            'canonicalUrl' => $this->getCanonicalUrl($model),
            'absoluteUrl' => $this->getAbsoluteUrl($model),
            'addCanonical' => $this->addCanonical,
            'addAlternateMobile' => $this->addAlternateMobile,
            'mobileUrl' => $this->getMobileUrl($model)
        ]);
    }

    /**
     * @param $model
     * @return string
     */
    public function getCanonicalUrl($model)
    {
        if (Yii::$app->has('frontendUrlManager')) {
            return Yii::$app->frontendUrlManager->getBaseUrl() . $model->url;
        }

        return $this->getAbsoluteUrl($model);
    }

    /**
     * @param $model
     * @return string
     */
    public function getAbsoluteUrl($model)
    {
        return Yii::$app->urlManager->getBaseUrl() . $model->url;
    }

    /**
     * @param $model
     * @return string
     */
    public function getMobileUrl($model)
    {
        if (Yii::$app->has('mobileUrlManager')) {
            return Yii::$app->mobileUrlManager->getBaseUrl() . $model->url;
        }

        return null;
    }
}