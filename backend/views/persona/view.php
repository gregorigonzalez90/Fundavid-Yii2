<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->nacionalidad;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nacionalidad' => $model->nacionalidad, 'numero_identificacion' => $model->numero_identificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nacionalidad' => $model->nacionalidad, 'numero_identificacion' => $model->numero_identificacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nacionalidad',
            'numero_identificacion',
            'primer_nombre',
            'segundo_nombre',
            'primer_apellido',
            'segundo_apellido',
            'sexo',
            'fecha_nacimiento',
            'ciudad_nacimiento',
            'fecha_emision',
            'fecha_vencimiento',
            'numero_residencia',
            'calle_avenida',
            'barrio_urb',
            'sector',
            'tlf_celular',
            'tlf_residencial',
            'profesion',
            'ocupacion',
            'grado_instruccion_id',
            'parroquia_id',
        ],
    ]) ?>

</div>
