<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%flow_definition}}`.
 */
class m190827_084723_create_flow_definition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%flow_definition}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'schema' => $this->text(),
            'ref_type' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%flow_definition}}');
    }
}
