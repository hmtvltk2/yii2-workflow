<?php

namespace contrib\workflow\models;

use Yii;

/**
 * This is the model class for table "process".
 *
 * @property int $id
 * @property int $flow_id
 * @property int $ref_id
 * @property int $status
 * @property int $created_by
 * @property string $created_at
 * @property bool $completed
 * @property string $finished_at
 */
class Process extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flow_id'], 'required'],
            [['flow_id', 'ref_id', 'status', 'created_by'], 'default', 'value' => null],
            [['flow_id', 'ref_id', 'status', 'created_by'], 'integer'],
            [['created_at', 'finished_at'], 'safe'],
            [['completed'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flow_id' => 'Flow ID',
            'ref_id' => 'Ref ID',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'completed' => 'Completed',
            'finished_at' => 'Finished At',
        ];
    }
    public function getFlowDefinition()
    {
        return $this->hasOne(FlowDefinition::className(), ['id' => 'flow_id']);
    }
}
