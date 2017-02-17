<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property integer $id
 * @property string $name
 * @property integer $duration
 *
 * @property Seance[] $seances
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'duration'], 'required'],
            [['duration'], 'integer'],
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
            'duration' => 'Duration in minutes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeances()
    {
        return $this->hasMany(Seance::className(), ['movie_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getIdNamePair()
    {
        $movie = self::find()->all();
        $idNamePair = [];

        foreach ($movie as $hall) {
            $idNamePair[$hall->getAttribute('id')] = $hall->getAttribute('name');
        }

        return $idNamePair;
    }
}