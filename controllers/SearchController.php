<?php

namespace app\controllers;

use app\models\mgcms\db\Job;
use app\models\mgcms\db\Product;
use app\models\mgcms\db\Service;
use app\models\mgcms\db\User;
use app\models\SubscribeForm;
use Yii;
use yii\base\BaseObject;
use yii\console\widgets\Table;
use yii\helpers\Json;
use yii\log\Logger;
use yii\web\Controller;
use app\models\mgcms\db\Company;
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

class SearchController extends \app\components\mgcms\MgCmsController
{

    public function actionIndex($q = '')
    {
        $companyQuery = Company::find()->where(['or', ['like', 'name', $q], ['like', 'description', $q]])->andWhere(['status' => Company::STATUS_CONFIRMED]);
        $companyDataProvider = new ActiveDataProvider([
            'query' => $companyQuery,
        ]);

        $productQuery = Product::find()->where(['or', ['like', 'name', $q], ['like', 'description', $q]]);
        $productDataProvider = new ActiveDataProvider([
            'query' => $productQuery,
        ]);

        $serviceQuery = Service::find()->where(['or', ['like', 'name', $q], ['like', 'description', $q]]);
        $serviceDataProvider = new ActiveDataProvider([
            'query' => $serviceQuery,
        ]);

        $jobQuery = Job::find()->where(['or', ['like', 'name', $q], ['like', 'info', $q]]);
        $jobDataProvider = new ActiveDataProvider([
            'query' => $jobQuery,
        ]);

        return $this->render('index', [
            'companyDataProvider' => $companyDataProvider,
            'productDataProvider' => $productDataProvider,
            'serviceDataProvider' => $serviceDataProvider,
            'jobDataProvider' => $jobDataProvider,
        ]);
    }

}
