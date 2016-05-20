<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $codigo
 * @property string $tipo
 * @property integer $categoria_id
 *
 * @property Categoria $categoria
 * @property Seccion[] $seccions
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'codigo', 'tipo', 'categoria_id'], 'required'],
            [['titulo'], 'string'],
            [['categoria_id'], 'integer'],
            [['codigo', 'tipo'], 'string', 'max' => 45],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'codigo' => 'Codigo',
            'tipo' => 'Tipo',
            'categoria_id' => 'Categoria ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['curso_id' => 'id']);
    }
}
