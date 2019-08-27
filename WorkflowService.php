<?php

namespace contrib\workflow;

use contrib\workflow\models\Flow;
use contrib\workflow\models\FlowDefinition;
use contrib\workflow\models\Process;
use contrib\workflow\models\Task;
use yii\web\NotFoundHttpException;

class WorkflowService
{
    public static function createFlow($flowId)
    {
        return Flow::createFlow($flowId);
    }

    public static function getTaskOfUser($userId)
    {
        return Flow::getTaskOfUserQuery($userId)->orderBy('created_at')->all();
    }

    public static function getTaskOfProcess($processId)
    {
        return Task::find()->with('assigneeUser')->where(['process_id' => $processId])->orderBy('id')->all();
    }

    public static function getProcesses()
    {
        return Process::find()
            ->with('flowDefinition')
            ->andWhere(['status' => Constant::STATUS_ACTIVE])
            ->orderBy('id')
            ->all();
    }

    public static function getFlows()
    {
        return FlowDefinition::find()->all();
    }
}
