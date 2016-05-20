<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instructor".
 *
 * @property string $cursos_realizados
 * @property string $experiencia_laboral
 * @property integer $persona_nacionalidad
 * @property string $persona_numero_identificacion
 *
 * @property Persona $personaNacionalidad
 * @property Seccion[] $seccions
 */
class Instructor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instructor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cursos_realizados', 'experiencia_laboral', 'persona_nacionalidad', 'persona_numero_identificacion'], 'required'],
            [['cursos_realizados', 'experiencia_laboral'], 'string'],
            [['persona_nacionalidad', 'persona_numero_identificacion'], 'integer'],
            [['persona_nacionalidad', 'persona_numero_identificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cursos_realizados' => 'Cursos Realizados',
            'experiencia_laboral' => 'Experiencia Laboral',
            'persona_nacionalidad' => 'Persona Nacionalidad',
            'persona_numero_identificacion' => 'Persona Numero Identificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaNacionalidad()
    {
        return $this->hasOne(Persona::className(), ['nacionalidad' => 'persona_nacionalidad', 'numero_identificacion' => 'persona_numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['instructor_persona_nacionalidad' => 'persona_nacionalidad', 'instructor_persona_numero_identificacion' => 'persona_numero_identificacion']);
    }
}
