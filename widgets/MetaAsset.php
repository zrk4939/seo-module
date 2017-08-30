<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 10.10.2016
 * Time: 12:58
 */

namespace zrk4939\modules\seo\widgets;


use yii\web\AssetBundle;

class MetaAsset extends AssetBundle
{
    public $sourcePath = '@zrk4939/modules/seo/widgets/assets/dist';

    public $js = [
        'js/metaWidget.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}