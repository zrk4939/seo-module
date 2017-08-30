<?php

use yii\db\Migration;

/**
 * Handles the creation of table `seo`.
 */
class m170830_090755_create_seo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seo', [
            'id' => $this->primaryKey(),
            'url' => $this->string(255)->notNull()->unique(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'keywords' => $this->string(255),
            'image_url' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seo');
    }
}
