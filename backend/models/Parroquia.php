<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parroquia".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $municipio_id
 *
 * @property Municipio $municipio
 * @property Persona[] $personas
 */
class Parroquia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parroquia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'municipio_id'], 'required'],
            [['municipio_id'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['municipio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['municipio_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'municipio_id' => 'Municipio ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['parroquia_id' => 'id']);
    }
}
