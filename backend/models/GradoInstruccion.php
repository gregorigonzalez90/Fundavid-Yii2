<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grado_instruccion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class GradoInstruccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grado_instruccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['grado_instruccion_id' => 'id']);
    }
}
