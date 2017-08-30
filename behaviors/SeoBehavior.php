<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 30.08.2017
 * Time: 12:50
 */

namespace zrk4939\modules\seo\behaviors;


use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\db\AfterSaveEvent;
use zrk4939\modules\seo\models\Seo;
use yii\bootstrap\Html;
use Yii;

class SeoBehavior extends Behavior
{
    public $nameAttribute = 'name';
    public $urlAttribute = 'url';

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'saveSeo',
            ActiveRecord::EVENT_AFTER_UPDATE => 'saveSeo',
        ];
    }

    /**
     * @param AfterSaveEvent $model
     */
    public function saveSeo($event)
    {
        $model = $event->sender;

        $modelSlug = $model->getAttribute('slug');
        $modelOldSlug = $model->getOldAttribute('slug');

        if ($modelSlug != $modelOldSlug) {
            $oldMeta = Seo::find()->where(['url' => $model->{$this->urlAttribute}])->one();
            if ($oldMeta)
                $oldMeta->delete();
        }

        $meta = Seo::find()->where(['url' => $model->{$this->urlAttribute}])->one();

        if (!$meta) {
            $meta = new Seo();
            $meta->setAttribute('url', $model->{$this->urlAttribute});
        }

        $meta->load(Yii::$app->request->post());

        if ($meta->manual == 0) {
            $meta->setAttribute('title', Html::encode($model->{$this->nameAttribute}));
        }

        $meta->save();
    }
}