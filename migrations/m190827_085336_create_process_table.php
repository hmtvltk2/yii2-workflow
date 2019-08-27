<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%process}}`.
 */
class m190827_085336_create_process_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%process}}', [
            'id' => $this->primaryKey(),
            'flow_id' => $this->integer(),
            'ref_id' => $this->integer(),
            'status' => $this->integer(),
            'created_by' => $this->integer(),
            'created_at' => $this->timestamp(),
            'finished_at' => $this->timestamp(),
            'completed' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%process}}');
    }
}
