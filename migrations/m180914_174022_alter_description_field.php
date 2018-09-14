<?php

use yii\db\Migration;

/**
 * Handles adding manual to table `seo`.
 */
class m180914_174022_alter_description_field extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->alterColumn('seo', 'description', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->alterColumn('seo', 'description', $this->string());
    }
}
