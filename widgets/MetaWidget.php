<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 10.10.2016
 * Time: 11:30
 */

namespace zrk4939\modules\seo\widgets;

use yii\db\ActiveRecord;
use zrk4939\modules\seo\models\Seo;
use Yii;
use yii\base\Widget;

class MetaWidget extends Widget
{
    public $addCanonical = true;
    public $addAlternateMobile = false;

    public function run()
    {
        $url = (Yii::$app->request->url === '') ? '/' : parse_url(Yii::$app->request->url, PHP_URL_PATH);
        $model = Seo::find()->where(['url' => $url])->one();
        $page = Yii::$app->request->get('page');

        return $this->render('head', [
            'model' => $model,

            'addCanonical' => $this->addCanonical,
            'canonicalUrl' => $this->getAbsoluteUrl($model),

            'absoluteUrl' => $this->getAbsoluteUrl($model),

            'addAlternateMobile' => $this->addAlternateMobile,
            'mobileUrl' => $this->getMobileUrl($model),

            'page' => $page,
        ]);
    }

    /**
     * @param ActiveRecord $model
     * @return string
     */
    public function getAbsoluteUrl($model)
    {
        if (empty($model)) {
            return Yii::$app->request->absoluteUrl;
        }

        return Yii::$app->urlManager->getHostInfo() . $model->getAttribute('url');
    }

    /**
     * @param ActiveRecord $model
     * @return string
     * TODO
     */
    public function getMobileUrl($model)
    {
        return null;
    }
}