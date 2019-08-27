<?php

namespace contrib\workflow\models;

use contrib\workflow\Constant;
use contrib\workflow\Helper;
use Yii;

class Node
{
    public $flowDeninitionId;
    public $name;
    public $code;
    public $type;
    public $condition;
    public $view;
    public $assignType;
    public $assignValue;
    public $prevConditionResult;
    public $previous = [];
    public $nexts = [];

    public function createTask($processId)
    {
        $task = new Task();
        $task->process_id = $processId;
        $task->flow_id = $this->flowDeninitionId;
        $task->name = $this->name;
        $task->view = $this->view;
        $task->completed = false;
        $task->created_at = Helper::now();
        $task->node_code = $this->code;
        switch ($this->assignType) {
            case Constant::ASSIGN_OWNER:
                $process = $this->getProcess($processId);
                $task->assignee = $process->created_by;
                break;
            case Constant::ASSIGN_USER:
                $task->assignee = $this->assignValue;
                break;
            case Constant::ASSIGN_GROUP:
                $task->group = $this->assignValue;
                break;
            case Constant::ASSIGN_PERMISSION:
                $task->permission = $this->assignValue;
                break;
        }
        Yii::info($task->group, 'DEBUGLOG');
        Yii::info($this->assignType, 'DEBUGLOG');
        $task->save();
        return $task;
    }

    private function getProcess($id)
    {
        if (($model = Process::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The process does not exist.');
    }
}
