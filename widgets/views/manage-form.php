<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model \zrk4939\modules\seo\models\Seo */
/* @var $form ActiveForm */
/* @var $enableTags array */

\zrk4939\modules\seo\widgets\MetaAsset::register($this);
?>
<div class="panel panel-danger">
    <div class="panel-heading">Мета информация</div>
    <div class="panel-body">
        <?= $form->field($model, 'manual')->checkbox() ?>

        <div class="col-md-6 manual-meta">
            <?php
            if (isset($enableTags['title'])) {
                echo $form->field($model, 'title')->textInput();
            }

            if (isset($enableTags['keywords'])) {
                echo $form->field($model, 'keywords')->textarea();
            }
            ?>
        </div>
        <div class="col-md-6 manual-meta">
            <?php
            if (isset($enableTags['og:image'])) {
                echo $form->field($model, 'image_url')->textarea();
            }

            if (isset($enableTags['description'])) {
                echo $form->field($model, 'description')->textarea();
            }
            ?>
        </div>
    </div>
</div>