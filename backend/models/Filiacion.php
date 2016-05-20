<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filiacion".
 *
 * @property integer $id
 * @property string $tipo
 *
 * @property Familiar[] $familiars
 */
class Filiacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filiacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 30],
            [['tipo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamiliars()
    {
        return $this->hasMany(Familiar::className(), ['filiacion_id' => 'id']);
    }
}
