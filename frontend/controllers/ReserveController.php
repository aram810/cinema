<?php

namespace frontend\controllers;

use Yii;
use common\models\Reserve;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ReserveController implements the CRUD actions for Reserve model.
 */
class ReserveController extends Controller
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
     * Creates a new Reserve model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reserve();

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $model->load(Yii::$app->request->post()) && $model->save() ? ['success' => 1] : ['success' => 0];
    }

    /**
     * Finds the Reserve model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $seance_id
     * @param integer $column
     * @param integer $row
     * @return Reserve the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($seance_id, $column, $row)
    {
        if (($model = Reserve::findOne(['seance_id' => $seance_id, 'column' => $column, 'row' => $row])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
