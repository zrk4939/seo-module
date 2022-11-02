<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model zrk4939\modules\seo\models\Seo */
/* @var $form yii\widgets\ActiveForm */
/* @var $admin boolean */
/* @var $enabledTags array */
?>

<div class="meta-form">

    <div class="panel panel-success">
        <div class="panel-heading">
            <?= Html::tag('h3', 'Мета информация', ['class' => 'panel-title']) ?>
        </div>
        <div class="panel-body">
            <?php if ($admin) echo $form->field($model, 'url')->textInput(['maxlength' => true]); ?>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (isset($enabledTags['title'])) {
                        echo $form->field($model, 'title')->textInput();
                    }

                    if (isset($enabledTags['keywords'])) {
                        echo $form->field($model, 'keywords')->textarea();
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if (isset($enabledTags['og:image'])) {
                        echo $form->field($model, 'image_url')->textarea();
                    }

                    if (isset($enabledTags['description'])) {
                        echo $form->field($model, 'description')->textarea();
                    }
                    ?>
                </div>
            </div>

            <?= $form->field($model, 'disable_ending')->checkbox(); ?>
        </div>
    </div>

</div>
