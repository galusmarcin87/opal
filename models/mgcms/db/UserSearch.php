<?php

namespace app\models\mgcms\db;

use app\components\mgcms\MgHelpers;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\mgcms\db\User;

/**
 * app\models\mgcms\db\UserSearch represents the model behind the search form about `app\models\mgcms\db\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by'], 'integer'],
            [['username', 'password', 'first_name', 'last_name', 'role', 'email', 'created_on', 'last_login', 'address', 'postcode', 'birthdate', 'city', 'auth_key', 'agent_code'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_on' => $this->created_on,
            'last_login' => $this->last_login,
            'created_by' => $this->created_by,
            'birthdate' => $this->birthdate,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'agent_code', $this->agent_code])
            ->andFilterWhere(['like', 'city', $this->city]);

        $currentUser = MgHelpers::getUserModel();
        if($currentUser && ($currentUser->role === User::ROLE_MANAGER || $currentUser->role === User::ROLE_AGENT) ){
            $query->andFilterWhere(['created_by' => $currentUser->id]);
            $query->orFilterWhere(['agent_code' => $currentUser->agent_code]);
        }

        if($currentUser && $currentUser->role === User::ROLE_SALES_DIRECTOR ){
            $query->joinWith('createdBy as createdByManager');
            $query->join('LEFT JOIN','user createdBySalesDirector','`createdByManager`.`created_by` = `createdBySalesDirector`.`id`');
            $query->andFilterWhere(['createdBySalesDirector.id' => $currentUser->id]);
            $query->orFilterWhere(['createdByManager.id' => $currentUser->id]);
            $query->orFilterWhere(['createdByManager.agent_code' => $currentUser->agent_code]);
        }

        if($currentUser && $currentUser->role === User::ROLE_INTERNATIONAL_DIRECTOR ){
            $query->joinWith('createdBy as createdByManager');
            $query->join('LEFT JOIN','user createdBySalesDirector','`createdByManager`.`created_by` = `createdBySalesDirector`.`id`');
            $query->join('LEFT JOIN','user createdByInternationalDirector','`createdBySalesDirector`.`created_by` = `createdByInternationalDirector`.`id`');
            $query->andFilterWhere(['createdByInternationalDirector.id' => $currentUser->id]);
            $query->orFilterWhere(['createdBySalesDirector.id' => $currentUser->id]);
            $query->orFilterWhere(['createdByManager.id' => $currentUser->id]);
            $query->orFilterWhere(['createdByManager.agent_code' => $currentUser->agent_code]);
        }

        return $dataProvider;
    }
}
