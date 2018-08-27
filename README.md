Config
---------------
```php
...
'bootstrap' => ['seo'],
...
'modules' => [
    ...
    'seo' => [
        'class' => 'zrk4939\modules\seo\SeoModule',
    ],
    ...
],
```

Migrations
----------------
```
php yii migrate --migrationPath=@vendor/zrk4939/seo-module/migrations --interactive=0
```

Layout
---------------
```html
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <?= \zrk4939\modules\seo\widgets\MetaWidget::widget() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
```
