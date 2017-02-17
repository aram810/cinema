<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reserve */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserve-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seance_id')->textInput() ?>

    <?= $form->field($model, 'column')->textInput() ?>

    <?= $form->field($model, 'row')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
