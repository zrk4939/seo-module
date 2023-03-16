<?php

use zrk4939\modules\seo\SeoModule;

/* @var $this \yii\web\View */
/* @var $model \zrk4939\modules\seo\models\Seo */
/* @var $canonicalUrl string */
/* @var $absoluteUrl string */
/* @var $addCanonical boolean */
/* @var $mobileUrl string */
/* @var $addAlternateMobile boolean */
/* @var $page string */

$config = SeoModule::getConfig();
$enabledTags = SeoModule::getEnabledTags();

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

$this->title = ($model && $model->disable_ending) ? $this->title : $this->title . $config['titlePostfix'];
if ($config['addPageString'] && $page) {
    $this->title .= " {$config['pageDelimenter']} {$config['pageTitleString']} $page";
}

$defaultDescription = SeoModule::getDescription();

$description = (!empty($model->description))
    ? ($model->disable_ending || empty($defaultDescription)) ? $model->description : $model->description . ' | ' . $defaultDescription
    : Yii::$app->name;

if ($config['addPageString'] && $page) {
    $description .= " {$config['pageDelimenter']} {$config['pageDescriptionString']} $page";
}

$this->registerMetaTag(['property' => 'og:site_name ', 'content' => Yii::$app->name], 'og:site_name');
$this->registerMetaTag(['property' => 'og:locale', 'content' => $config['locale']], 'og:locale');
$this->registerMetaTag(['propery' => 'twitter:card', 'content' => 'summary'], 'twitter:card');

if (!empty($description) && isset($enabledTags['description'])) {
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
}

if (!empty($model->keywords) && isset($enabledTags['keywords'])) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords], 'keywords');
}

// register og & twitter meta
if (!isset($this->metaTags['og:type'])) {
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');
}

if (!isset($this->metaTags['og:url'])) {
    $this->registerMetaTag(['property' => 'og:url', 'content' => $absoluteUrl], 'og:url');
}

if (!empty($model->title) && isset($enabledTags['title'])) {
    $this->registerMetaTag(['property' => 'og:title', 'content' => $model->title], 'og:title');
    $this->registerMetaTag(['property' => 'twitter:title', 'content' => $model->title], 'twitter:title');
}
if (!empty($description) && isset($enabledTags['description'])) {
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description], 'og:description');
    $this->registerMetaTag(['property' => 'twitter:description', 'content' => $description], 'twitter:description');
}
if (!empty($model->image_url) && isset($enabledTags['og:image'])) {
    $this->registerMetaTag(['property' => 'og:image', 'content' => Yii::$app->request->hostInfo . $model->image_url], 'og:image');
    $this->registerMetaTag(['property' => 'twitter:image', 'content' => Yii::$app->request->hostInfo . $model->image_url], 'twitter:image');
}
