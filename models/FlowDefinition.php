<?php

namespace contrib\workflow\models;

use Yii;

/**
 * This is the model class for table "flow_definition".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $schema
 * @property string $ref_type
 */
class FlowDefinition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flow_definition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'schema'], 'required'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['schema'], 'string'],
            [['name', 'ref_type'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'schema' => 'Schema',
        ];
    }
}
