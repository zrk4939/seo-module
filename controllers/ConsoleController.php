<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 21.03.2017
 * Time: 10:07
 */

namespace zrk4939\modules\seo\controllers;

use domain\modules\content\models\Content;
use zrk4939\modules\seo\models\Seo;
use Yii;
use yii\console\Controller;
use yii\helpers\Html;

class ConsoleController extends Controller
{

    public function actionIndex()
    {
        $success = 0;
        $errors  = 0;
        $contents = Content::find()->active()->all();

        foreach ($contents as $content){
            $result = $this->saveMeta($content);
            if($result == true){
                $success++;
            }
            else{
                $errors++;
            }
        }
        echo "Successfully created {$success} metas\n";
        echo "Errors {$errors} metas\n";
    }

    /**
     * @param Content $model
     * @return bool
     */
    protected function saveMeta($model)
    {
        $modelSlug      = $model->getAttribute('slug');
        $modelOldSlug   = $model->getOldAttribute('slug');

        if($modelSlug != $modelOldSlug){
            $oldMeta = Seo::find()->where(['url' => $this->getContentUrl($model, $modelOldSlug)])->one();
            if($oldMeta)
                $oldMeta->delete();
        }

        $meta = Seo::find()->where(['url' => $model->getUrl()])->one();

        if(!$meta){
            $meta = new Seo();
            $meta->setAttribute('url', $model->getUrl());
            $meta->setAttribute('title', Html::encode($model->name));
            $meta->setAttribute('description', Html::encode($model->text_preview));

            $model->preview_load = unserialize($model->preview_image) ?: [];
            if(!empty($model->preview_load)){
                $meta->setAttribute('image_url', Yii::$app->frontendUrlManager->baseUrl . '/uploads/content/' . $model->id . '/' . current($model->preview_load));
            }
        }

        return $meta->save();
    }

    /**
     * @param Content $model
     * @param $slug string
     * @return string
     */
    protected function getContentUrl($model, $slug)
    {
        $url = '';
        foreach ($model->parents as $parent) {
            if ($parent->depth > 0) {
                $url .= "/{$parent->slug}";
            }
        }
        $url .= "/{$slug}";

        return $url;
    }
}
