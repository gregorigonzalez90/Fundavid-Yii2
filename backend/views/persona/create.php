<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = 'Datos Personales';
// $this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-create">
	
    <h1><?= Html::encode($this->title) ?></h1>
	
	<?php 
	if (!isset($Alumno))
    {
    	$Alumno = '';
    }
	 ?>

    <?= $this->render('_form', [
        'model' => $model,
        'Alumno' => $Alumno,
    ]) ?>

</div>
