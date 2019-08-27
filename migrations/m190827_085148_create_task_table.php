<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m190827_085148_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'process_id' => $this->integer(),
            'completed' => $this->boolean(),
            'created_at' => $this->timestamp(),
            'finished_at' => $this->timestamp(),
            'assignee' => $this->integer(),
            'node_code' => $this->string(),
            'group' => $this->string(),
            'permission' => $this->string(),
            'view' => $this->string(),
            'flow_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
