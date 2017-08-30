<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel zrk4939\modules\seo\models\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SEO';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-index">

    <!--<h1><? /*= Html::encode($this->title) */ ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
//            'url:url',
            'title',
            'keywords',
            'description',

            ['class' => 'domain\helpers\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
