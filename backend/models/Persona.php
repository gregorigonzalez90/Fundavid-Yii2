<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $nacionalidad
 * @property string $numero_identificacion
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $sexo
 * @property string $fecha_nacimiento
 * @property string $ciudad_nacimiento
 * @property string $fecha_emision
 * @property string $fecha_vencimiento
 * @property string $numero_residencia
 * @property string $calle_avenida
 * @property string $barrio_urb
 * @property string $sector
 * @property string $tlf_celular
 * @property string $tlf_residencial
 * @property string $profesion
 * @property string $ocupacion
 * @property integer $grado_instruccion_id
 * @property integer $parroquia_id
 *
 * @property Alumno $alumno
 * @property Familiar[] $familiars
 * @property Familiar[] $familiars0
 * @property Persona[] $personaNacionalidad1s
 * @property Persona[] $personaNacionalidads
 * @property Instructor $instructor
 * @property GradoInstruccion $gradoInstruccion
 * @property Parroquia $parroquia
 * @property Nacionalidad $nacionalidad0
 * @property PersonalFundacion $personalFundacion
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nacionalidad', 'numero_identificacion', 'primer_nombre', 'primer_apellido', 'sexo', 'fecha_nacimiento', 'ciudad_nacimiento', 'fecha_emision', 'fecha_vencimiento', 'numero_residencia', 'calle_avenida', 'barrio_urb', 'sector', 'grado_instruccion_id', 'parroquia_id'], 'required'],
            [['nacionalidad', 'numero_identificacion', 'grado_instruccion_id', 'parroquia_id'], 'integer'],
            [['fecha_nacimiento', 'fecha_emision', 'fecha_vencimiento'], 'safe'],
            [['primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido'], 'string', 'max' => 30],
            [['sexo'], 'string', 'max' => 1],
            [['ciudad_nacimiento', 'calle_avenida', 'barrio_urb', 'sector', 'profesion', 'ocupacion'], 'string', 'max' => 45],
            [['numero_residencia'], 'string', 'max' => 10],
            [['tlf_celular', 'tlf_residencial'], 'string', 'max' => 14],
            [['grado_instruccion_id'], 'exist', 'skipOnError' => true, 'targetClass' => GradoInstruccion::className(), 'targetAttribute' => ['grado_instruccion_id' => 'id']],
            [['parroquia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['parroquia_id' => 'id']],
            [['nacionalidad'], 'exist', 'skipOnError' => true, 'targetClass' => Nacionalidad::className(), 'targetAttribute' => ['nacionalidad' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nacionalidad' => 'Nacionalidad',
            'numero_identificacion' => 'Numero Identificacion',
            'primer_nombre' => 'Primer Nombre',
            'segundo_nombre' => 'Segundo Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
            'sexo' => 'Sexo',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'ciudad_nacimiento' => 'Ciudad Nacimiento',
            'fecha_emision' => 'Fecha Emision',
            'fecha_vencimiento' => 'Fecha Vencimiento',
            'numero_residencia' => 'Numero Residencia',
            'calle_avenida' => 'Calle Avenida',
            'barrio_urb' => 'Barrio Urb',
            'sector' => 'Sector',
            'tlf_celular' => 'Tlf Celular',
            'tlf_residencial' => 'Tlf Residencial',
            'profesion' => 'Profesion',
            'ocupacion' => 'Ocupacion',
            'grado_instruccion_id' => 'Grado Instruccion ID',
            'parroquia_id' => 'Parroquia ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamiliars()
    {
        return $this->hasMany(Familiar::className(), ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamiliars0()
    {
        return $this->hasMany(Familiar::className(), ['persona_nacionalidad1' => 'nacionalidad', 'persona_numero_identificacion1' => 'numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaNacionalidad1s()
    {
        return $this->hasMany(Persona::className(), ['nacionalidad' => 'persona_nacionalidad1', 'numero_identificacion' => 'persona_numero_identificacion1'])->viaTable('familiar', ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaNacionalidads()
    {
        return $this->hasMany(Persona::className(), ['nacionalidad' => 'persona_nacionalidad', 'numero_identificacion' => 'persona_numero_identificacion'])->viaTable('familiar', ['persona_nacionalidad1' => 'nacionalidad', 'persona_numero_identificacion1' => 'numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(), ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoInstruccion()
    {
        return $this->hasOne(GradoInstruccion::className(), ['id' => 'grado_instruccion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquia()
    {
        return $this->hasOne(Parroquia::className(), ['id' => 'parroquia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNacionalidad0()
    {
        return $this->hasOne(Nacionalidad::className(), ['id' => 'nacionalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalFundacion()
    {
        return $this->hasOne(PersonalFundacion::className(), ['persona_nacionalidad' => 'nacionalidad', 'persona_numero_identificacion' => 'numero_identificacion']);
    }
}
