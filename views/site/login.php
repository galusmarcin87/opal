<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;


$this->title = Yii::t('db', 'Log in');
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true)

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>

<?= $this->render('/common/breadcrumps') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">

            <div class="text-center my-5">
                <img src="/images/logo.png" alt="Opal Crowd" class="img-fluid mx-auto">
            </div>

            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'contact-form login__form'],
                'fieldConfig' => $fieldConfig
            ]);

            echo $form->errorSummary($model);
            ?>

            <div class="mb-4">
                <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
            </div>
            <div class="mb-4">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
            </div>


            <div class="row align-items-center gy-4 my-5">
                <div class="col-lg-8">
                    <p class="text-uppercase text-center text-lg-start mb-0">
                        <?= Yii::t('db', 'You dont have an account yet?') ?>
                        <a href="<?= \yii\helpers\Url::to('/site/register') ?>">
                            <?= Yii::t('db', 'Register') ?>
                        </a>
                    </p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <button class="btn btn-primary" type="submit"><?= Yii::t('db', 'Next') ?></button>

                </div>
            </div>

            <p class="text-center my-4">
                <?= Html::a(Yii::t('db', 'Forgotten password?'), ['/site/forgot-password'], ['class' => 'link-dark']) ?>
            </p>


            <?php ActiveForm::end(); ?>


        </div>

    </div>
</div>
