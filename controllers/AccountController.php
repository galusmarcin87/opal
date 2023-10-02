<?php

namespace app\controllers;

use app\components\mgcms\yii\ActiveForm;
use app\models\BuyForm;
use app\models\LoginCodeForm;
use app\models\mgcms\db\Agent;
use app\models\mgcms\db\Company;
use app\models\mgcms\db\FileRelation;
use app\models\mgcms\db\Job;
use app\models\mgcms\db\Product;
use app\models\mgcms\db\Service;
use app\models\PaySubscriptionForm;
use FiberPay\FiberIdClient;
use app\models\mgcms\db\File;
use app\models\ReportRealEstateForm;
use FiberPay\FiberPayClient;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use \app\models\mgcms\db\User;
use \app\components\mgcms\MgHelpers;
use \app\models\mgcms\db\Payment;
use app\components\GetResponse\GetResponse;
use app\components\GetResponse\jsonRPCClient;
use yii\web\UploadedFile;
use app\models\mgcms\db\Article;

class AccountController extends \app\components\mgcms\MgCmsController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $myCompany = $this->_getMyCompany();


        return $this->render('index', [
            'myCompany' => $myCompany
        ]);
    }

    /**
     * @return Company
     */
    private function _getMyCompany()
    {
        $user = $this->getUserModel();
        if (!$user) {
            return false;
        }
        $myCompany = Company::find()->where(['user_id' => $user->id])->one();
        if (!$myCompany) {
            $myCompany = Company::find()->where(['id' => $user->company_id])->one();
        }

        return $myCompany;
    }

    public function actionEditCompany($lang = false)
    {
        $model = $this->_getMyCompany();
        $newRecord = false;
        if (!$model) {
            $model = new Company();
            $newRecord = true;
            $model->user_id = $this->getUserModel()->id;
            $model->subscription_fee = MgHelpers::getSetting('kwota abonamentu', false, 10000);
        }
        $model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {
            $thumbnail = UploadedFile::getInstance($model, 'thumbnailFile');

            if ($thumbnail) {
                if ($thumbnail->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($thumbnail));
                $model->thumbnail_id = $file->id;
            }

            $background = UploadedFile::getInstance($model, 'backgroundFile');
            if ($background) {
                if ($background->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel2 = new File;
                $file2 = $fileModel2->push(new \rmrevin\yii\module\File\resources\UploadedResource($background));
                $model->background_id = $file2->id;
            }

            $videoThumbnail = UploadedFile::getInstance($model, 'video_thumbnail');
            if ($videoThumbnail) {
                if ($videoThumbnail->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($videoThumbnail));
                $model->video_thumbnail = $file->getImageSrc(240, 0);
            }

            $this->_assignFiles($model);
            $this->_assignFiles($model,'logosFiles','logo');

            if ($model->validate() && $model->save()) {
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
                if ($newRecord) {
                    Yii::$app->mailer->compose('companyAdded', ['model' => $model])
                        ->setTo($model->email)
                        ->attach($this->_fvProforma())
                        ->setFrom([MgHelpers::getSetting('email') => MgHelpers::getSetting('email nazwa')])
                        ->setSubject(Yii::t('db', 'New company added'))
                        ->send();

                    return $this->redirect(['add-product']);
                }

            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editCompany', [
            'model' => $model
        ]);
    }

    public function actionDeleteRelation($relId, $fileId, $model)
    {
        $file = File::find()->andWhere(['id' => $fileId, 'created_by' => $this->getUserModel()->id])->one();
        $fileRel = \app\models\mgcms\db\FileRelation::find()->where(['rel_id' => $relId, 'file_id' => $fileId, 'model' => $model])->one();
        if ($fileRel) {
            $fileRel->delete();
            MgHelpers::setFlash('success', Yii::t('db', 'Deleted'));
        }
        $this->back();
    }

    public function actionDeleteMainImage($relId, $model, $type = 'main')
    {
        $company = $this->_getMyCompany();
        if (!$company) {
            MgHelpers::setFlashError(Yii::t('db', 'You need to have company to perform this action'));
            $this->back();
        }
        switch ($model) {
            case 'app\models\mgcms\db\Product':
                $model = Product::find()->where(['company_id' => $company->id, 'id' => $relId])->one();
                if (!$model) {
                    MgHelpers::setFlashError(Yii::t('db', 'Problem with finding product'));
                    $this->back();
                }

                $model->file_id = null;
                $model->save();
                break;
            case 'app\models\mgcms\db\Company':
                if ($relId != $company->id) {
                    MgHelpers::setFlashError(Yii::t('db', 'Problem with perform this operation'));
                    $this->back();
                }
                $model = Company::find()->where(['id' => $relId])->one();
                if (!$model) {
                    MgHelpers::setFlashError(Yii::t('db', 'Problem with finding company'));
                    $this->back();
                }
                switch ($type) {
                    case 'main':
                        $model->thumbnail_id = null;
                        break;
                    case 'background':
                        $model->background_id = null;
                        break;
                }

                $model->save();
                break;
            default:
                break;
        }
        $this->back();
    }

    public function actionProducts()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Product::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('products', [
            'models' => $models
        ]);

    }

    public function actionAgents()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Agent::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('agents', [
            'models' => $models
        ]);

    }

    public function actionServices()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Service::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('services', [
            'models' => $models
        ]);


    }

    public function actionJobs()
    {
        $model = $this->_getMyCompany();
        if (!$model) {
            $models = [];
        } else {
            $models = Job::find()->where(['company_id' => $model->id])->all();
        }

        return $this->render('jobs', [
            'models' => $models
        ]);


    }

    public function actionProductEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Product::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        //$model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                if ($fileUpload->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            if ($model->save()) {
                $this->_assignFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editProduct', [
            'model' => $model
        ]);
    }

    public function actionAgentEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Agent::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model = $model->user;
        //$model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                if ($fileUpload->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            if ($model->save()) {
                $this->_assignFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editAgent', [
            'model' => $model
        ]);
    }

    public function actionJobEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Job::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        //$model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                if ($fileUpload->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            if ($model->save()) {
                $this->_assignFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editJob', [
            'model' => $model
        ]);
    }

    public function actionServiceEdit($id, $lang = false)
    {
        $myCompany = $this->_getMyCompany();
        $model = Service::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        //$model->language = $lang;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->_assignFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editService', [
            'model' => $model
        ]);
    }

    public function actionAddService($lang = false)
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new Service();
        $model->language = $lang;
        $model->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->_assignFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editService', [
            'model' => $model
        ]);
    }

    public function actionAddJob($lang = false)
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new Job();
        $model->language = $lang;
        $model->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->_assignFiles($model);

                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editJob', [
            'model' => $model
        ]);
    }

    public function actionProductDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Product::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }

    public function actionAgentDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Agent::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }

    public function actionJobDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Job::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }

    public function actionServiceDelete($id)
    {
        $myCompany = $this->_getMyCompany();
        $model = Service::find()->where(['company_id' => $myCompany->id, 'id' => $id])->one();
        if (!$model) {
            $this->throw404();
        }
        $model->delete();
        return $this->back();
    }


    public function actionAddProduct($lang = false)
    {

        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new Product();
        $model->language = $lang;
        $model->company_id = $modelCompany->id;

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                if ($fileUpload->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            if ($model->save()) {
                $this->_assignFiles($model);
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
                $this->redirect('/account/index');
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editProduct', [
            'model' => $model
        ]);
    }

    public function actionAddAgent()
    {

        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            return $this->back();
        }
        $model = new User();
        $model->company_id = $modelCompany->id;
        $model->role = User::ROLE_REPRESENTATIVE;

        $modelAgent = new Agent();
        $modelAgent->company_id = $modelCompany->id;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if ($model->imAgentCheckbox) {
                $model->scenario = 'onAgent';
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }


        if ($model->load(Yii::$app->request->post())) {
            if ($model->imAgentCheckbox) {
                $model = $this->getUserModel();
                $model->scenario = 'onAgent';
                $model->load(Yii::$app->request->post());
                $model->username = $model->getOldAttribute('username');
                $model->first_name = $model->getOldAttribute('first_name');
                $model->last_name = $model->getOldAttribute('last_name');
            }

            $fileUpload = UploadedFile::getInstance($model, 'fileUpload');
            if ($fileUpload) {
                if ($fileUpload->size > 1024 * 1024 * 2) {
                    MgHelpers::setFlash('error', Yii::t('db', 'File too big (max 2MB)'));
                    return $this->refresh();
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($fileUpload));
                $model->file_id = $file->id;
            }

            $model->validate();
            if (!$model->imAgentCheckbox) {
                $model->password = uniqid();
            }
            if ($model->save()) {
                $this->_assignFiles($model);
                $this->_assignFiles($model,'logosFiles','logo');
                $modelAgent->user_id = $model->id;
                $modelAgent->save();
                MgHelpers::setFlash('success', Yii::t('db', 'Saved'));
                $this->redirect(['index']);
            } else {
                MgHelpers::setFlash('error', Yii::t('db', 'Saving failed'));
            }

        }

        return $this->render('editAgent', [
            'model' => $model
        ]);
    }

    public function _assignFiles($model, $type = 'downloadFiles', $json = '1')
    {
        $upladedFiles = UploadedFile::getInstances($model, $type);

        if ($upladedFiles) {
            foreach ($upladedFiles as $CUploadedFileModel) {
                if ($CUploadedFileModel->hasError) {
                    MgHelpers::setFlash(MgHelpers::FLASH_TYPE_ERROR, Yii::t('app', 'Error with uploading file - probably file is too big'));
                    continue;
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($CUploadedFileModel));
                if ($file) {
                    if (FileRelation::find()->where(['file_id' => $file->id, 'rel_id' => $this->id, 'model' => $this::className()])->count()) {
                        continue;
                    }
                    $fileRel = new FileRelation;
                    $fileRel->file_id = $file->id;
                    $fileRel->rel_id = $model->id;
                    $fileRel->model = $model::className();
                    $fileRel->json = $json;
                    MgHelpers::saveModelAndLog($fileRel);
                } else {
                    MgHelpers::setFlashError('Błąd dodawania pliku powiązanego');
                }
            }
            return true;
        }
        return false;
    }

    function actionPaySubscription()
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            $this->back();
        }

        $model = new PaySubscriptionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $modelCompany->paid_from = date('Y-m-d H:i:s');
            $modelCompany->paid_to = date('Y-m-d H:i:s', strtotime('+1 year'));
            $saved = $modelCompany->save();
            $this->redirect("https://trade.kanga.exchange/tpg/payment/PAxD8ZmDtKgcDVvpqlqWvxLCNDoDwp?currency=MFT&amount=$model->tokensAmount&transactionKey=$modelCompany->id&name=Meetfaces%20Trading%20-%20zakup%20tokena");
        }

        $model->subscrriptionFee = $modelCompany->subscription_fee * 0.6;
        return $this->render('paySubscription', [
            'model' => $model,
        ]);
    }


    function actionPaySubscriptionStripe()
    {
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlash('error', Yii::t('db', "Add company first"));
            $this->back();
        }

        $apiKey = MgHelpers::getSetting('stripe api key', false, 'sk_test_51FOmrVInHv9lYN6G23xLhzLTDNytsH8bOStCMPJ472ZAoutfeNag8DSuQswJkDmkpGPd1yRqqKtFfrrSb2ReZhtM00J3jbGTp0');
        $stripeAccountId = MgHelpers::getSetting('stripe account id', false, 'acct_1FOmrVInHv9lYN6G');
        $subscriptionPriceId = $modelCompany->stripe_price_id ?: MgHelpers::getSetting('stripe price id', false, 'price_1KtH7tInHv9lYN6GmgumYmlZ');

        \Stripe\Stripe::setApiKey($apiKey);
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price' => $subscriptionPriceId,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => Url::to(['account/payment-after', 'type' => 'success', 'hash' => MgHelpers::encrypt($modelCompany->id . '.' . date('Y-m-d'))], true),
            'cancel_url' => Url::to(['account/payment-after', 'type' => 'cancel'], true),
        ], ['stripe_account' => $stripeAccountId]);

        $this->redirect($session->url);
    }

    function actionPaymentAfter($type, $hash)
    {

        if ($type == 'success') {
            $decrypted = explode('.', MgHelpers::decrypt($hash));
            if (count($decrypted) < 2) {
                return $this->throw404();
            }
            $companyId = $decrypted[0];
            $date = $decrypted[1];
            $modelCompany = Company::find()->where(['id' => $companyId])->one();
            if (!$companyId || !$modelCompany || $date != date('Y-m-d')) {
                return $this->throw404();
            }
            $modelCompany->paid_from = date('Y-m-d H:i:s');
            $modelCompany->paid_to = date('Y-m-d H:i:s', strtotime('+1 year'));
            $saved = $modelCompany->save();
        }

        return $this->render('paymentAfter', ['type' => $type]);
    }

    function actionBuyAfter($type, $hash)
    {
        $data = unserialize(MgHelpers::decrypt($hash));

        if ($type == 'success') {
            $payment = new Payment();
            $payment->load(['Payment' => $data]);
            $payment->amount = str_replace(',', '.', $payment->amount);
            $payment->save();
        }

        return $this->render('buyAfter', ['type' => $type, 'payment' => $payment]);
    }

    function actionRate($hash)
    {
        $paymentId = MgHelpers::decrypt($hash);
        if (!$paymentId) {
            return $this->throw404();
        }

        $payment = Payment::findOne($paymentId);
        if (!$payment) {
            return $this->throw404();
        }

        $model = false;
        switch ($payment->type) {
            case 'Product':
                $model = Product::findOne($payment->rel_id);
                break;
            case 'Service':
                $model = Service::findOne($payment->rel_id);
                break;
        }

        if (!$model) {
            return $this->throw404();
        }

        if ($payment->load(Yii::$app->request->post())) {
            $payment->save();
        }

        return $this->render('rate', ['model' => $model, 'payment' => $payment]);

    }

    public function actionBuy($hash)
    {
        $user = $this->getUserModel();
        if (!$user) {
            MgHelpers::setFlashError(Yii::t('db', 'Log in first'));
            return $this->redirect(['site/login']);
        }
        $modelCompany = $this->_getMyCompany();
        if (!$modelCompany) {
            MgHelpers::setFlashError(Yii::t('db', 'You need to create company first in order to buy'));
            return $this->back();
        }

        if ($modelCompany->status != Company::STATUS_CONFIRMED) {
            MgHelpers::setFlashError(Yii::t('db', 'Your company has to be confirmed in order to buy'));
            return $this->back();
        }


        $data = unserialize(MgHelpers::decrypt($hash));
        $type = $data['type'];
        $id = $data['id'];


        switch ($type) {
            case 'Product':
                $model = Product::findOne($id);
                break;
            case 'Service':
                $model = Service::findOne($id);
                break;

            default:
                $model = null;
        }

        if (!$model) {
            MgHelpers::setFlashError(Yii::t('db', 'Problem with fecthing product'));
            return $this->back();
        }

        $price = (double)str_replace(',', '.', $model->price);

        if (!$price) {
            MgHelpers::setFlashError(Yii::t('db', 'Price is incorrect'));
            return $this->back();
        }

        if (!$model->company->getModelAttribute('stripeId')) {
            MgHelpers::setFlashError(Yii::t('db', 'Company you would like to buy from are not connected with Stripe'));
            return $this->back();
        }


        $apiKey = MgHelpers::getSetting('stripe api key', false, 'sk_test_51FOmrVInHv9lYN6G23xLhzLTDNytsH8bOStCMPJ472ZAoutfeNag8DSuQswJkDmkpGPd1yRqqKtFfrrSb2ReZhtM00J3jbGTp0');
        $stripe = new \Stripe\StripeClient($apiKey);

        $buyForm = new BuyForm();

        if ($buyForm->load(Yii::$app->request->post()) && $buyForm->validate()) {
            try {
                $amount = (double)((double)$buyForm->amount * (double)$model->price);
                $application_fee = (double)MgHelpers::getSetting('stripe prowizja procent', false, 5);
                $payment_intent = $stripe->paymentIntents->create([
                    'amount' => (int)($amount * 100),
                    'currency' => 'USD',
                    'automatic_payment_methods' => ['enabled' => true],
                    'application_fee_amount' => (int)$application_fee * $price,
                ], ['stripe_account' => $model->company->getModelAttribute('stripeId')]);

                return $this->render('buy', [
                    'clientSecret' => $payment_intent['client_secret'],
                    'stripeAccount' => $model->company->getModelAttribute('stripeId'),
                    'returnUrl' => Url::to(['account/buy-after', 'type' => 'success', 'hash' => MgHelpers::encrypt(serialize([
                        'company_id' => $modelCompany->id,
                        'amount' => $amount,
                        'rel_id' => $model->id,
                        'type' => $type,
                        'user_id' => $this->getUserModel()->id,
                    ]))], true),
                ]);
            } catch (Exception $e) {

                MgHelpers::setFlashError(Yii::t('db', $e));
                return $this->back();
            }
        }

        return $this->render('buyForm', ['model' => $model, 'buyForm' => $buyForm]);


    }

    public function actionConnectWithStripe()
    {
        return $this->redirect($this->generateStripeAccountLink());
    }

    public function actionConnectStripeAccount($hash)
    {

        $data = unserialize(MgHelpers::decrypt($hash));
        if (!isset($data['companyId']) || !isset($data['accountId'])) {
            MgHelpers::setFlashError(Yii::t('db', 'Stripe: problem with assigning stripe account'));
            return $this->redirect('/account/index');
        }

        $company = Company::findOne($data['companyId']);
        if (!$company) {
            MgHelpers::setFlashError(Yii::t('db', 'Stripe: problem with assigning stripe account - account not found'));
            return $this->redirect('/account/index');
        }
        $company->setModelAttribute('stripeId', $data['accountId']);
        MgHelpers::setFlashSuccess(Yii::t('db', 'Stripe: successfully connected to stripe account, you can purchase now'));
        return $this->redirect('/account/index');
    }

    public function generateStripeAccountLink()
    {
        $modelCompany = $this->_getMyCompany();

        if (!$modelCompany) {
            MgHelpers::setFlashError(Yii::t('db', 'You need to create company first in order to create a Stripe account'));
            return $this->back();
        }

        $apiKey = MgHelpers::getSetting('stripe api key', false, 'sk_test_51FOmrVInHv9lYN6G23xLhzLTDNytsH8bOStCMPJ472ZAoutfeNag8DSuQswJkDmkpGPd1yRqqKtFfrrSb2ReZhtM00J3jbGTp0');
        $stripe = new \Stripe\StripeClient($apiKey);
        $account = $stripe->accounts->create([
            'type' => 'standard',
            'country' => 'PL',
            'business_type' => 'company',
            'email' => $modelCompany->email,
        ]);
        if (!$account['id']) {
            MgHelpers::setFlashError(Yii::t('db', 'Stripe: problem with creating account'));
            return $this->back();
        }

        $createParams = [
            'account' => $account['id'],
            'refresh_url' => Url::to(['account/connect-stripe-account', 'hash' => MgHelpers::encrypt(serialize([
                    'companyId' => $modelCompany->id,
                    'accountId' => $account['id']
                ]
            ))], true),
            'return_url' => Url::to(['account/connect-stripe-account', 'hash' => MgHelpers::encrypt(serialize([
                    'companyId' => $modelCompany->id,
                    'accountId' => $account['id']
                ]
            ))], true),
            'type' => 'account_onboarding',
        ];
        $accountLink = $stripe->accountLinks->create($createParams);

        return $accountLink['url'];
    }

    public function _fvProforma()
    {
        $company = $this->_getMyCompany();
        if (!$company) {
            return $this->throw404();
        }

        $this->view->registerCssFile(Yii::getAlias('@web') . '/css/fv.css');
        $content = $this->renderAjax('fvProforma', [
            'company' => $company
        ]);


        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_UTF8,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_FILE,
            'cssFile' => Yii::getAlias('@app') . '/web/css/fv.css',
            'content' => $content,
            'filename' => "fv/fv-$company->id.pdf"
        ]);

        return "fv/fv-$company->id.pdf";
//        return $content;
        return $pdf->render();
    }


}
