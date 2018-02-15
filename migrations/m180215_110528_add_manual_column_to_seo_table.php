<?php

use yii\db\Migration;

/**
 * Handles adding manual to table `seo`.
 */
class m180215_110528_add_manual_column_to_seo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('seo', 'manual', $this->boolean()->defaultValue(0)->after('image_url'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('seo', 'manual');
    }
}
