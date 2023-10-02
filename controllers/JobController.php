<?php

namespace app\controllers;

use app\models\mgcms\db\Company;
use app\models\mgcms\db\Service;
use app\models\mgcms\db\User;
use app\models\SubscribeForm;
use Yii;
use yii\base\BaseObject;
use yii\console\widgets\Table;
use yii\helpers\Json;
use yii\log\Logger;
use yii\web\Controller;
use app\models\mgcms\db\Job;
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

class JobController extends \app\components\mgcms\MgCmsController
{

    public function actionIndex($industry = null)
    {

        $query = Job::find()->joinWith('company')->andWhere(['company.status' => Company::STATUS_CONFIRMED]);
        if ($industry) {
            $query->andWhere(['industry' => $industry]);
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
        $model = Job::find()->where(['id' => $id])->one();
        if (!$model) {
            throw new \yii\web\HttpException(404, Yii::t('app', 'Not found'));
        }


        return $this->render('view', ['model' => $model]);
    }


}
