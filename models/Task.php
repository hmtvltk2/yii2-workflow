<?php

namespace contrib\workflow\models;

use appname\models\User;
use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property int $process_id
 * @property bool $completed
 * @property string $created_at
 * @property string $finished_at
 * @property int $assignee
 * @property string $node_code
 * @property string $group
 * @property string $permission
 * @property string $view
 * @property int $flow_id
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_id'], 'required'],
            [['process_id', 'assignee', 'flow_id'], 'default', 'value' => null],
            [['process_id', 'assignee', 'flow_id'], 'integer'],
            [['completed'], 'boolean'],
            [['created_at', 'finished_at'], 'safe'],
            [['name', 'node_code', 'group', 'permission', 'view'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'process_id' => 'Process ID',
            'completed' => 'Completed',
            'created_at' => 'Created At',
            'finished_at' => 'Finished At',
            'assignee' => 'Assignee',
            'node_code' => 'Node Code',
            'group' => 'Group',
            'permission' => 'Permission',
            'view' => 'View',
            'flow_id' => 'Flow ID',
        ];
    }

    public function getProcess()
    {
        return $this->hasOne(Process::className(), ['id' => 'process_id']);
    }

    public function getAssigneeUser()
    {
        return $this->hasOne(User::className(), ['id' => 'assignee']);
    }
}
