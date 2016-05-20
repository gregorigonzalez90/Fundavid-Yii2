<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GradoInstruccion */

$this->title = 'Update Grado Instruccion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grado Instruccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grado-instruccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
