<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model \zrk4939\modules\seo\models\Seo */
/* @var $form ActiveForm */

\zrk4939\modules\seo\widgets\MetaAsset::register($this);
?>
<div class="panel panel-danger">
    <div class="panel-heading">Мета информация</div>
    <div class="panel-body">
        <?= $form->field($model, 'manual')->checkbox() ?>

        <div class="col-md-6 manual-meta">
            <?= $form->field($model, 'title')->textInput() ?>
            <?= $form->field($model, 'keywords')->textarea() ?>

        </div>
        <div class="col-md-6 manual-meta">
            <?= $form->field($model, 'image_url')->textInput(); ?>
            <?= $form->field($model, 'description')->textarea() ?>
        </div>
    </div>
</div>