<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reserve".
 *
 * @property integer $seance_id
 * @property integer $column
 * @property integer $row
 *
 * @property Seance $seance
 */
class Reserve extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seance_id', 'column', 'row'], 'required'],
            [['seance_id', 'column', 'row'], 'integer'],
            [['seance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seance::className(), 'targetAttribute' => ['seance_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seance_id' => 'Seance ID',
            'column' => 'Column',
            'row' => 'Row',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeance()
    {
        return $this->hasOne(Seance::className(), ['id' => 'seance_id']);
    }
}
