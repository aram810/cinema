<?php

namespace backend\controllers;

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
            'hallIdNamePair' => Hall::getIdNamePair(),
            'movieIdNamePair' => Movie::getIdNamePair(),
        ]);
    }

    /**
     * Displays a single Seance model.
     * @param $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Seance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Seance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'hall_id' => $model->hall_id, 'movie_id' => $model->movie_id, 'start_time' => $model->start_time]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Seance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param $id
     * @return Seance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seance::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
