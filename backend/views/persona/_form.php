<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nacionalidad')->textInput() ?>

    <?= $form->field($model, 'numero_identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'ciudad_nacimiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_emision')->textInput() ?>

    <?= $form->field($model, 'fecha_vencimiento')->textInput() ?>

    <?= $form->field($model, 'numero_residencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle_avenida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barrio_urb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tlf_celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tlf_residencial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grado_instruccion_id')->textInput() ?>

    <?= $form->field($model, 'parroquia_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
