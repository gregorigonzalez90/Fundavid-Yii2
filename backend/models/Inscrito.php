<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscrito".
 *
 * @property integer $id
 * @property integer $alumno_persona_nacionalidad
 * @property string $alumno_persona_numero_identificacion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $seccion_id
 * @property integer $seccion_curso_id
 *
 * @property Alumno $alumnoPersonaNacionalidad
 * @property Seccion $seccion
 */
class Inscrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_persona_nacionalidad', 'alumno_persona_numero_identificacion', 'fecha_inicio', 'seccion_id', 'seccion_curso_id'], 'required'],
            [['alumno_persona_nacionalidad', 'alumno_persona_numero_identificacion', 'seccion_id', 'seccion_curso_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['alumno_persona_nacionalidad', 'alumno_persona_numero_identificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_persona_nacionalidad' => 'persona_nacionalidad', 'alumno_persona_numero_identificacion' => 'persona_numero_identificacion']],
            [['seccion_id', 'seccion_curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['seccion_id' => 'id', 'seccion_curso_id' => 'curso_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alumno_persona_nacionalidad' => 'Alumno Persona Nacionalidad',
            'alumno_persona_numero_identificacion' => 'Alumno Persona Numero Identificacion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'seccion_id' => 'Seccion ID',
            'seccion_curso_id' => 'Seccion Curso ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoPersonaNacionalidad()
    {
        return $this->hasOne(Alumno::className(), ['persona_nacionalidad' => 'alumno_persona_nacionalidad', 'persona_numero_identificacion' => 'alumno_persona_numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccion()
    {
        return $this->hasOne(Seccion::className(), ['id' => 'seccion_id', 'curso_id' => 'seccion_curso_id']);
    }
}
