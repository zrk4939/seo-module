<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model zrk4939\modules\seo\models\Seo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-view">

    <!--<h1><? /*= Html::encode($this->title) */ ?></h1>-->

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'url',
            /*[
                'attribute' => 'url',
                'format' => 'url',
                'value' => Yii::$app->frontendUrlManager->baseUrl . $model->url,
            ],*/
            'title',
            'keywords',
            'description',
        ],
    ]) ?>

</div>
