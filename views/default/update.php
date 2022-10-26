<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model zrk4939\modules\seo\models\Seo */
/* @var $admin boolean */
/* @var $enabledTags array */

$this->title = 'Редактирование SEO: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="meta-update">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <?php $form = ActiveForm::begin(); ?>

    <?= $this->render('_form', [
        'model' => $model,
        'form' => $form,
        'admin' => $admin,
        'enabledTags' => $enabledTags,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
