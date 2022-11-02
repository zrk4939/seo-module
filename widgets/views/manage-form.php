<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \zrk4939\modules\seo\models\Seo */
/* @var $form ActiveForm */
/* @var $enabledTags array */

\zrk4939\modules\seo\widgets\MetaAsset::register($this);
?>
<div class="panel panel-danger">
    <div class="panel-heading">Мета информация</div>
    <div class="panel-body">
        <?= $form->field($model, 'manual')->checkbox() ?>

        <div class="col-md-6 manual-meta">
            <?php
            if (isset($enabledTags['title'])) {
                echo $form->field($model, 'title')->textInput();
            }

            if (isset($enabledTags['keywords'])) {
                echo $form->field($model, 'keywords')->textarea();
            }
            ?>
        </div>
        <div class="col-md-6 manual-meta">
            <?php
            if (isset($enabledTags['og:image'])) {
                echo $form->field($model, 'image_url')->textarea();
            }

            if (isset($enabledTags['description'])) {
                echo $form->field($model, 'description')->textarea();
            }
            ?>
        </div>
        <div class="col-md-6 manual-meta">
            <?= $form->field($model, 'disable_ending')->checkbox(); ?>
        </div>
    </div>
</div>