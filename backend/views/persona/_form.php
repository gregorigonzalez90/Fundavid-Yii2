<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;
use \kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */

//$nacionalidad = array('1' => 'V' , '2' => 'E');
$sexo = array('M' => 'M' , 'F' => 'F');
?>

<div class="persona-form">

    <?php  $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nacionalidad')->dropDownList($nacionalidad) ?>

    <?= $form->field($model, 'numero_identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->dropDownList($sexo) ?>

    <?php 
    
     ?>
    <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(),[
        'type' => DatePicker::TYPE_COMPONENT_PREPEND ,
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione fecha de nacimiento'],
        'convertFormat' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-MM-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'ciudad_nacimiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_emision')->widget(DatePicker::className(),[
        'type' => DatePicker::TYPE_COMPONENT_PREPEND ,
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione de emision'],
        'convertFormat' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-MM-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'fecha_vencimiento')->widget(DatePicker::className(),[
        'type' => DatePicker::TYPE_COMPONENT_PREPEND ,
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione fecha de vencimiento'],
        'convertFormat' => true,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-MM-dd'
        ]
    ]);?>

    <?= $form->field($model, 'numero_residencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle_avenida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barrio_urb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tlf_celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tlf_residencial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grado_instruccion_id')->dropDownList($grados) ?>

    <?= $form->field($model, 'parroquia_id')->dropDownList($parroquias) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
