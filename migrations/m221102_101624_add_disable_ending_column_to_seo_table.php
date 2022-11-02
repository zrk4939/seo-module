<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%seo}}`.
 */
class m221102_101624_add_disable_ending_column_to_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%seo}}', 'disable_ending', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%seo}}', 'disable_ending');
    }
}
