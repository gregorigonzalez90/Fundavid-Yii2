<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nacionalidad') ?>

    <?= $form->field($model, 'numero_identificacion') ?>

    <?= $form->field($model, 'primer_nombre') ?>

    <?= $form->field($model, 'segundo_nombre') ?>

    <?= $form->field($model, 'primer_apellido') ?>

    <?php // echo $form->field($model, 'segundo_apellido') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'ciudad_nacimiento') ?>

    <?php // echo $form->field($model, 'fecha_emision') ?>

    <?php // echo $form->field($model, 'fecha_vencimiento') ?>

    <?php // echo $form->field($model, 'numero_residencia') ?>

    <?php // echo $form->field($model, 'calle_avenida') ?>

    <?php // echo $form->field($model, 'barrio_urb') ?>

    <?php // echo $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'tlf_celular') ?>

    <?php // echo $form->field($model, 'tlf_residencial') ?>

    <?php // echo $form->field($model, 'profesion') ?>

    <?php // echo $form->field($model, 'ocupacion') ?>

    <?php // echo $form->field($model, 'grado_instruccion_id') ?>

    <?php // echo $form->field($model, 'parroquia_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
