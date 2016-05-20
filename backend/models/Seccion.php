<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seccion".
 *
 * @property integer $id
 * @property integer $curso_id
 * @property integer $instructor_persona_nacionalidad
 * @property string $instructor_persona_numero_identificacion
 *
 * @property Inscrito[] $inscritos
 * @property Curso $curso
 * @property Instructor $instructorPersonaNacionalidad
 */
class Seccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso_id', 'instructor_persona_nacionalidad', 'instructor_persona_numero_identificacion'], 'required'],
            [['curso_id', 'instructor_persona_nacionalidad', 'instructor_persona_numero_identificacion'], 'integer'],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id']],
            [['instructor_persona_nacionalidad', 'instructor_persona_numero_identificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Instructor::className(), 'targetAttribute' => ['instructor_persona_nacionalidad' => 'persona_nacionalidad', 'instructor_persona_numero_identificacion' => 'persona_numero_identificacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso_id' => 'Curso ID',
            'instructor_persona_nacionalidad' => 'Instructor Persona Nacionalidad',
            'instructor_persona_numero_identificacion' => 'Instructor Persona Numero Identificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscritos()
    {
        return $this->hasMany(Inscrito::className(), ['seccion_id' => 'id', 'seccion_curso_id' => 'curso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'curso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructorPersonaNacionalidad()
    {
        return $this->hasOne(Instructor::className(), ['persona_nacionalidad' => 'instructor_persona_nacionalidad', 'persona_numero_identificacion' => 'instructor_persona_numero_identificacion']);
    }
}
