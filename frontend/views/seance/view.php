<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Seance */
/* @var $reservedPlaces array */
/* @var $columnCount int */
/* @var $rowCount int */

$this->title = $model->getMovie()->one()->getAttribute('name');
$this->params['breadcrumbs'][] = ['label' => 'Seances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    Yii::getAlias('@web') . '/js/reserve.js',
    ['depends' => [JqueryAsset::className()]]
);

?>
<div class="seance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_hall', [
        'model' => $model,
        'reservedPlaces' => $reservedPlaces,
        'columnCount' => $columnCount,
        'rowCount' => $rowCount,
    ]); ?>
    <input id="reserve_url" type="hidden" value="<?= Url::to(['reserve/create/']) ?>">
    <input id="seance_id" type="hidden" value="<?= $model->getAttribute('id'); ?>">
</div>
