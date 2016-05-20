<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal_fundacion".
 *
 * @property string $cargo_fundacion
 * @property integer $persona_nacionalidad
 * @property string $persona_numero_identificacion
 *
 * @property Persona $personaNacionalidad
 */
class PersonalFundacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal_fundacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_fundacion', 'persona_nacionalidad', 'persona_numero_identificacion'], 'required'],
            [['persona_nacionalidad', 'persona_numero_identificacion'], 'integer'],
            [['cargo_fundacion'], 'string', 'max' => 45],
            [['persona_nacionalidad', 'persona_numero_identificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cargo_fundacion' => 'Cargo Fundacion',
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
}
