<?php

namespace frontend\controllers;

use common\models\Hall;
use common\models\Movie;
use Yii;
use common\models\Seance;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeanceController implements the CRUD actions for Seance model.
 */
class SeanceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Seance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Seance::find()->orderBy(['start_time' => SORT_ASC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'movieIdNamePair' => Movie::getIdNamePair(),
            'hallIdNamePair' => Hall::getIdNamePair(),
        ]);
    }

    /**
     * Displays a single Seance model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $rowCount = $model->getHall()->one()->getAttribute('row');
        $columnCount = $model->getHall()->one()->getAttribute('column');
        $reservedPlaces = Hall::getReserved($model->getReserves()->all());

        return $this->render('view', [
            'model' => $model,
            'rowCount' => $rowCount,
            'columnCount' => $columnCount,
            'reservedPlaces' => $reservedPlaces,
        ]);
    }

    /**
     * Finds the Seance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}