<?php

namespace zrk4939\modules\seo\controllers;

use zrk4939\modules\seo\models\Seo;
use yii\web\Controller;

class MetaController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = ($id) ? Seo::findOne($id) : new Seo();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }

        return $this->redirect(['/' . $model->url]);
    }
}