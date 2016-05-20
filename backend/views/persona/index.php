<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nacionalidad',
            'numero_identificacion',
            'primer_nombre',
            'segundo_nombre',
            'primer_apellido',
            // 'segundo_apellido',
            // 'sexo',
            // 'fecha_nacimiento',
            // 'ciudad_nacimiento',
            // 'fecha_emision',
            // 'fecha_vencimiento',
            // 'numero_residencia',
            // 'calle_avenida',
            // 'barrio_urb',
            // 'sector',
            // 'tlf_celular',
            // 'tlf_residencial',
            // 'profesion',
            // 'ocupacion',
            // 'grado_instruccion_id',
            // 'parroquia_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
