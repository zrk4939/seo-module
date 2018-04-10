<?php

/* @var $this \yii\web\View */
/* @var $model \zrk4939\modules\seo\models\Seo */
/* @var $canonicalUrl string */
/* @var $absoluteUrl string */
/* @var $addCanonical boolean */
/* @var $mobileUrl string */
/* @var $addAlternateMobile boolean */

$config = \zrk4939\modules\seo\SeoModule::getConfig();
$enabledTags = \zrk4939\modules\seo\SeoModule::getEnabledTags();

$description = $model->description . ' | ' . \zrk4939\modules\seo\SeoModule::getDescription();

if ($addCanonical) {
    $this->registerLinkTag([
        'rel' => 'canonical',
        'href' => $canonicalUrl,
    ]);
}

if ($addAlternateMobile) {
    $this->registerLinkTag([
        'rel' => 'alternate',
        'media' => "only screen and (max-width: 992px)",
        'href' => $mobileUrl,
    ]);
}

if (!empty($model->title) && isset($enabledTags['title'])) {
    $this->title = $model->title;
}

$this->title = $config['titlePrefix'] . $this->title . $config['titlePostfix'];

if (!empty($description) && isset($enabledTags['description'])) {
    $this->registerMetaTag([
        'name' => 'description',
        'content' => $description,
    ]);
}

if (!empty($model->keywords) && isset($enabledTags['keywords'])) {
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
if (!empty($model->title) && isset($enabledTags['title'])) {
    $this->registerMetaTag([
        'property' => 'og:title',
        'content' => $model->title,
    ]);
}
if (!empty($description) && isset($enabledTags['description'])) {
    $this->registerMetaTag([
        'property' => 'og:description',
        'content' => $description,
    ]);
}
if (!empty($model->image_url) && isset($enabledTags['og:image'])) {
    $this->registerMetaTag([
        'property' => 'og:image',
        'content' => Yii::$app->request->hostInfo . $model->image_url,
    ]);
}
