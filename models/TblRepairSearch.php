<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblRepair;
use  yii\web\Session;

class TblRepairSearch extends TblRepair
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['BrnStatus', 'BrnCode', 'BrnRepair', 'BrnPos', 'BrnBrand', 'BrnModel', 'BrnSerial', 'BrnCause', 'BrnCreateByName', 'AcceptAt', 'AcceptByName', 'DeleteByName', 'DeleteCause', 'DeleteIP', 'ReciveAt', 'RepairAt', 'RepairStatus', 'RepairByName', 'RepairReport', 'CreatedAt', 'UpdatedAt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = TblRepair::find()->where(['BrnCode' => Yii::$app->session->get('UserBranch')])->orderBy([
            'id' => SORT_DESC,
         ]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
            //'pagination' => array('pageSize' => 10),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'AcceptAt' => $this->AcceptAt,
            'ReciveAt' => $this->ReciveAt,
            'RepairAt' => $this->RepairAt,
            'CreatedAt' => $this->CreatedAt,
            'UpdatedAt' => $this->UpdatedAt,
        ]);

        $query->andFilterWhere(['like', 'BrnStatus', $this->BrnStatus])
            ->andFilterWhere(['like', 'BrnCode', $this->BrnCode])
            ->andFilterWhere(['like', 'BrnRepair', $this->BrnRepair])
            ->andFilterWhere(['like', 'BrnPos', $this->BrnPos])
            ->andFilterWhere(['like', 'BrnBrand', $this->BrnBrand])
            ->andFilterWhere(['like', 'BrnModel', $this->BrnModel])
            ->andFilterWhere(['like', 'BrnSerial', $this->BrnSerial])
            ->andFilterWhere(['like', 'BrnCause', $this->BrnCause])
            ->andFilterWhere(['like', 'BrnCreateByName', $this->BrnCreateByName])
            ->andFilterWhere(['like', 'AcceptByName', $this->AcceptByName])
            ->andFilterWhere(['like', 'DeleteByName', $this->DeleteByName])
            ->andFilterWhere(['like', 'DeleteCause', $this->DeleteCause])
            ->andFilterWhere(['like', 'DeleteIP', $this->DeleteIP])
            ->andFilterWhere(['like', 'RepairStatus', $this->RepairStatus])
            ->andFilterWhere(['like', 'RepairByName', $this->RepairByName])
            ->andFilterWhere(['like', 'RepairReport', $this->RepairReport]);

        return $dataProvider;
    }
}
