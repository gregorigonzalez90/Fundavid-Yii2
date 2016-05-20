<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $persona_nacionalidad
 * @property string $persona_numero_identificacion
 *
 * @property Persona $personaNacionalidad
 * @property Inscrito[] $inscritos
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_nacionalidad', 'persona_numero_identificacion'], 'required'],
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
    public function getInscritos()
    {
        return $this->hasMany(Inscrito::className(), ['alumno_persona_nacionalidad' => 'persona_nacionalidad', 'alumno_persona_numero_identificacion' => 'persona_numero_identificacion']);
    }
}
