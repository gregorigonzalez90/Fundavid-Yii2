<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GradoInstruccion */

$this->title = 'Create Grado Instruccion';
$this->params['breadcrumbs'][] = ['label' => 'Grado Instruccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-instruccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
