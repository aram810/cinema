<?php

use common\models\Hall;
use common\models\Movie;
use janisto\timepicker\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Seance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hall_id')->dropDownList(Hall::getIdNamePair()) ?>

    <?= $form->field($model, 'movie_id')->dropDownList(Movie::getIdNamePair()) ?>

    <!--<?= $form->field($model, 'start_time')->textInput() ?>-->

    <?= TimePicker::widget([
        'model' => $model,
        'attribute' => 'start_time',
        'mode' => 'time',
        'clientOptions' => [
            'timeFormat' => 'HH:mm'
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
