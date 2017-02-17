<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seance".
 *
 * @property integer $id
 * @property integer $hall_id
 * @property integer $movie_id
 * @property string $start_time
 *
 * @property Hall $hall
 * @property Movie $movie
 */
class Seance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hall_id', 'movie_id', 'start_time'], 'required'],
            [['hall_id', 'movie_id'], 'integer'],
            [['start_time'], 'safe'],
            [['hall_id', 'movie_id', 'start_time'], 'unique', 'targetAttribute' => ['hall_id', 'movie_id', 'start_time'], 'message' => 'The combination of Hall ID, Movie ID and Start Time has already been taken.'],
            [['hall_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hall::className(), 'targetAttribute' => ['hall_id' => 'id']],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hall_id' => 'Hall',
            'movie_id' => 'Movie',
            'start_time' => 'Start Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHall()
    {
        return $this->hasOne(Hall::className(), ['id' => 'hall_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserves()
    {
        return $this->hasMany(Reserve::className(), ['seance_id' => 'id']);
    }
}
