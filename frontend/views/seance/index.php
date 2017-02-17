<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $hallIdNamePair array */
/* @var $movieIdNamePair array */

$this->title = 'Seances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'Hall',
                'format' => 'raw',
                'value' => function ($data) use ($hallIdNamePair) {
                    return $hallIdNamePair[$data->hall_id];
                }
            ],

            [
                'label' => 'Movie',
                'format' => 'raw',
                'value' => function ($data) use ($movieIdNamePair) {
                    return $movieIdNamePair[$data->movie_id];
                }
            ],

            'start_time',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>