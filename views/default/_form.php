<?php

use mihaildev\elfinder\InputFile;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model zrk4939\modules\seo\models\Seo */
/* @var $form yii\widgets\ActiveForm */
/* @var $admin boolean */
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
                    <?= $form->field($model, 'title')->textInput() ?>
                    <?= $form->field($model, 'image_url')->textInput(); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'description')->textarea() ?>
                    <?= $form->field($model, 'keywords')->textarea() ?>
                </div>
            </div>
        </div>
    </div>

</div>
