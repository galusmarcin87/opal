<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;

$this->title = Yii::t('db', 'Register');
$this->params['breadcrumbs'][] = $this->title;


?>

<style>
    .login .input{
        margin-bottom: 0px;
    }
    .help-block {
        margin-bottom: 28px;
    }

</style>
<section class="service-wrapper company-wrapper login register">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= Yii::t('db', 'Register') ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
                <div>
                    <h1 class="text-left"><?= Yii::t('db', 'Register') ?></h1>
                    <div class="hr"></div>
                    <h3 class="highlighted">
                        <img src="/svg/atuty.svg" alt=""/>
                        Zalety posiadania konta:
                    </h3>
                    <ul class="list">
                        <li></li>
                        <li>
                            lorem ipsum dolor sit amet, consectetur adipisicing elit
                        </li>
                        <li>
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua
                        </li>
                        <li>ut enim ad minim veniam, quis nostrud exercitation</li>
                        <li>lamco laboris nisi ut aliquip ex ea commodo consequat</li>
                    </ul>
                    <div class="hr"></div>
                    <h3>Masz juz swoje konto?</h3>
                    <a href="<?= \yii\helpers\Url::to('/site/login') ?>"
                       class="btn btn--primary"><?= Yii::t('db', 'Log in') ?></a>
                </div>
                <div>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'contact-form login__form'],
                        'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(true)
                    ]);

                    //          echo $form->errorSummary($model);
                    ?>
                    <div class="contact-form__header"><?= Yii::t('db', 'Create new account') ?></div>
                    <?= $form->field($model, 'firstName')->textInput(['placeholder' => $model->getAttributeLabel('firstName')]) ?>
                    <?= $form->field($model, 'surname')->textInput(['placeholder' => $model->getAttributeLabel('surname')]) ?>
                    <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                    <?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => $model->getAttributeLabel('passwordRepeat')]) ?>
                    <?= $form->field($model, 'agentCode')->textInput(['placeholder' => $model->getAttributeLabel('agentCode')]) ?>


                    <div class="switch-wrapper">
                        <?= Yii::t('db', 'Normal account') ?>
                        <label class="switch">
                            <input type="checkbox" name="RegisterForm[isForSale]"/>
                            <span class="slider round"></span>
                        </label>
                        <?= Yii::t('db', 'Company for sale') ?>
                    </div>
                    <div>
                        <input
                                type="checkbox"
                                class="checkbox"
                                name="RegisterForm[acceptTerms]"
                                id="check-1"
                                value="1"
                        />
                        <label for="check-1">
                            <?= MgHelpers::getSettingTranslated('register_terms_label', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...') ?>
                        </label>
                        <?= Html::error($model, 'acceptTerms', ['class' => 'help-block']); ?>
                    </div>
                    <button class="btn btn--secondary btn--block" type="submit">
                        <?= Yii::t('db', 'Register') ?>
                    </button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
