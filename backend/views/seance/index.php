<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Seance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Hall',
                'format' => 'raw',
                'value' => function ($data) use ($hallIdNamePair) {
                    return Html::a($hallIdNamePair[$data->hall_id], ['hall/view/' . $data->hall_id]);
                }
            ],
            [
                'label' => 'Movie',
                'format' => 'raw',
                'value' => function ($data) use ($movieIdNamePair) {
                    return Html::a($movieIdNamePair[$data->hall_id], ['movie/view/' . $data->movie_id]);
                }
            ],
            'start_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
