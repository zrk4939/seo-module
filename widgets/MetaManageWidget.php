<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 10.10.2016
 * Time: 11:30
 */

namespace zrk4939\modules\seo\widgets;


use yii\widgets\ActiveForm;
use zrk4939\modules\seo\models\Seo;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\db\ActiveRecord;

class MetaManageWidget extends Widget
{
    /**
     * @var ActiveRecord|null
     */
    public $url = null;

    /**
     * @var ActiveForm
     */
    public $form;

    /**
     * @var Seo|null
     */
    protected $meta = null;

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (empty($this->url)) {
            throw new InvalidConfigException('Не указана форма!');
        }

        if (empty($this->url)) {
            throw new InvalidConfigException('Не указан URL!');
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        if (!empty($this->url)) {
            $this->meta = Seo::findOne(['url' => $this->url]);
        }
        $this->populateMeta();

        return $this->render('manage-form', [
            'form' => $this->form,
            'model' => $this->meta,
            'enabledTags' => \zrk4939\modules\seo\SeoModule::getEnabledTags(),
        ]);
    }

    protected function populateMeta()
    {
        if (empty($this->meta)) {
            $this->meta = new Seo();
        }
    }
}