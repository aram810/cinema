<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $name
 * @property integer $row
 * @property integer $column
 *
 * @property Seance[] $seances
 */
class Hall extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'row', 'column'], 'required'],
            [['row', 'column'], 'integer'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'row' => 'Number of rows',
            'column' => 'Number of columns',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeances()
    {
        return $this->hasMany(Seance::className(), ['hall_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getIdNamePair()
    {
        $halls = self::find()->all();
        $idNamePair = [];

        foreach ($halls as $hall) {
            $idNamePair[$hall->getAttribute('id')] = $hall->getAttribute('name');
        }

        return $idNamePair;
    }

    public static function getReserved($reserves)
    {
        $reserved = [];

        foreach ($reserves as $reserve) {
            $reserved[$reserve->row][] = $reserve->column;
        }

        return $reserved;
    }
}