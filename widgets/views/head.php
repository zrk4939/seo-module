<?php

/* @var $this \yii\web\View */

/* @var $model \zrk4939\modules\seo\models\Seo */
/* @var $canonicalUrl string */
/* @var $absoluteUrl string */
/* @var $addCanonical boolean */
/* @var $mobileUrl string */
/* @var $addAlternateMobile boolean */

if($addCanonical){
    $this->registerLinkTag([
        'rel' => 'canonical',
        'href' => $canonicalUrl,
    ]);
}

if($addAlternateMobile){
    $this->registerLinkTag([
        'rel' => 'alternate',
        'media' => "only screen and (max-width: 992px)",
        'href' => $mobileUrl,
    ]);
}

if (!empty($model->title)) {
    $this->title = $model->title;
}

if (!empty($model->description)) {
    $this->registerMetaTag([
        'name' => 'description',
        'content' => $model->description,
    ]);
}

if (!empty($model->keywords)) {
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => $model->keywords,
    ]);
}

// register og meta

$this->registerMetaTag([
    'property' => 'og:url',
    'content' => $absoluteUrl,
]);
$this->registerMetaTag([
    'property' => 'og:type',
    'content' => 'website',
]);
$this->registerMetaTag([
    'property' => 'og:locale',
    'content' => Yii::$app->formatter->locale,
]);
if (!empty($model->title)) {
    $this->registerMetaTag([
        'property' => 'og:title',
        'content' => $model->title,
    ]);
}
if (!empty($model->description)) {
    $this->registerMetaTag([
        'property' => 'og:description',
        'content' => $model->description,
    ]);
}
if (!empty($model->image_url)) {
    $this->registerMetaTag([
        'property' => 'og:image',
        'content' => $model->image_url,
    ]);
}
