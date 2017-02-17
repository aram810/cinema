<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Welcome to Cinema';
?>
<div class="site-index">
    <?= Html::a('Halls', 'hall/index', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Movies', 'movie/index', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Seances', 'seance/index', ['class' => 'btn btn-primary']) ?>
</div>
