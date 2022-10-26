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
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use zrk4939\modules\seo\models\Seo;
use yii\helpers\Html;
use Yii;
use zrk4939\modules\seo\SeoModule;

class SeoBehavior extends Behavior
{
    /**
     * @var string|false $titleAttribute
     */
    public $titleAttribute = 'name';

    /**
     * @var string|false $descriptionAttribute
     */
    public $descriptionAttribute = 'text';

    /**
     * @var string|false $keywordsAttribute
     */
    public $keywordsAttribute = false;

    /**
     * @var string|false $urlAttribute
     */
    public $urlAttribute = 'url';

    /**
     * @var string|false $imageUrlAttribute
     */
    public $imageUrlAttribute = 'image';

    public $countWords = 20;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'saveSeo',
            ActiveRecord::EVENT_AFTER_UPDATE => 'saveSeo',
        ];
    }

    /**
     * @param AfterSaveEvent $event
     */
    public function saveSeo($event)
    {
        /* @var ActiveRecord $model */
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

        if (is_a(Yii::$app, 'yii\web\Application')) {
            $meta->load(Yii::$app->request->post());
        }

        if ($meta->manual == 0) {
            if ($model->{$this->titleAttribute}) {
                $meta->setAttribute('title', Html::encode($model->{$this->titleAttribute}));
            }
            if ($model->{$this->descriptionAttribute}) {
                $meta->setAttribute('description', StringHelper::truncateWords(html_entity_decode(strip_tags($model->{$this->descriptionAttribute})), $this->countWords));
            }
            if ($model->{$this->keywordsAttribute}) {
                $meta->setAttribute('keywords', Html::encode($model->{$this->keywordsAttribute}));
            }
        }

        if ($this->imageUrlAttribute && !empty($image_url = ArrayHelper::getValue($model, $this->imageUrlAttribute))) {
            $meta->setAttribute('image_url', $image_url);
        }

        $meta->save();
    }
}