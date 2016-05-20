<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = 'Update Persona: ' . $model->nacionalidad;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nacionalidad, 'url' => ['view', 'nacionalidad' => $model->nacionalidad, 'numero_identificacion' => $model->numero_identificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
