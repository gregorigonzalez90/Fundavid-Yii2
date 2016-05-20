<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nacionalidad', 'numero_identificacion', 'grado_instruccion_id', 'parroquia_id'], 'integer'],
            [['primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'sexo', 'fecha_nacimiento', 'ciudad_nacimiento', 'fecha_emision', 'fecha_vencimiento', 'numero_residencia', 'calle_avenida', 'barrio_urb', 'sector', 'tlf_celular', 'tlf_residencial', 'profesion', 'ocupacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Persona::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'nacionalidad' => $this->nacionalidad,
            'numero_identificacion' => $this->numero_identificacion,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_emision' => $this->fecha_emision,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'grado_instruccion_id' => $this->grado_instruccion_id,
            'parroquia_id' => $this->parroquia_id,
        ]);

        $query->andFilterWhere(['like', 'primer_nombre', $this->primer_nombre])
            ->andFilterWhere(['like', 'segundo_nombre', $this->segundo_nombre])
            ->andFilterWhere(['like', 'primer_apellido', $this->primer_apellido])
            ->andFilterWhere(['like', 'segundo_apellido', $this->segundo_apellido])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'ciudad_nacimiento', $this->ciudad_nacimiento])
            ->andFilterWhere(['like', 'numero_residencia', $this->numero_residencia])
            ->andFilterWhere(['like', 'calle_avenida', $this->calle_avenida])
            ->andFilterWhere(['like', 'barrio_urb', $this->barrio_urb])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'tlf_celular', $this->tlf_celular])
            ->andFilterWhere(['like', 'tlf_residencial', $this->tlf_residencial])
            ->andFilterWhere(['like', 'profesion', $this->profesion])
            ->andFilterWhere(['like', 'ocupacion', $this->ocupacion]);

        return $dataProvider;
    }
}
