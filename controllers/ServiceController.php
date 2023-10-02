<?php

namespace app\controllers;

use app\models\mgcms\db\Company;
use app\models\mgcms\db\User;
use app\models\SubscribeForm;
use Yii;
use yii\base\BaseObject;
use yii\console\widgets\Table;
use yii\helpers\Json;
use yii\log\Logger;
use yii\web\Controller;
use app\models\mgcms\db\Service;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use \app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Payment;
use __;
use yii\web\Link;
use yii\web\Session;
use FiberPay\FiberPayClient;
use JWT;
use yii\validators\EmailValidator;

class ServiceController extends \app\components\mgcms\MgCmsController
{

    public function actionIndex($category_id = null)
    {
        $query = Service::find()->joinWith('company')->andWhere(['company.status' => Company::STATUS_CONFIRMED]);
        if ($category_id) {
            $query->andWhere(['company.category_id' => $category_id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionView($id)
    {
        $model = Service::find()->where(['id' => $id])->one();

        $payment = $model->getRatePayment();
        if($payment){
            if ($payment->load(Yii::$app->request->post())) {
                $payment->save();
            }
        }

        if (!$model) {
            throw new \yii\web\HttpException(404, Yii::t('app', 'Not found'));
        }


        return $this->render('view', ['model' => $model]);
    }


}
