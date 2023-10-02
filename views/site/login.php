<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;


$this->title = Yii::t('db', 'Log in');
$this->params['breadcrumbs'][] = $this->title;
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true)

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>
<style>
    .service p{
        margin-bottom: 0;
    }
</style>
<section class="service-wrapper company-wrapper login">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= Yii::t('db', 'Log in') ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
                <div>
                    <h1 class="text-left"><?= Yii::t('db', 'Login') ?></h1>
                    <div class="hr"></div>
                    <?= MgHelpers::getSettingTypeText('login text '.Yii::$app->language,true,' <h3 class="highlighted">
                        <img src="/svg/atuty.svg" alt=""/>
                        Przenieś swoją firmę w świat Internetu i zdobądź nowe możliwości!
                    </h3>
                    <ul class="list">
                        <li></li>
                        <li>Szukasz nowych klientów?</li>
                        <li>Chcesz, żeby Twoja firma była zauważona przez innych przedsiębiorców?</li>
                        <li>Szukasz dodatkowej reklamy?</li>
                        <li>Chcesz się wyróżnić i wyprzedzić konkurencję?</li>
						<li>Szukasz sposobu na optymalizację kosztów prowadzenia firmy?</li>
						<li>Chcesz nawiązać nowe relacje biznesowe?</li>
						<li>Chcesz poszerzyć swoją wiedzę w zakresie prowadzenia firmy?</li>
                    </ul><br>
					<h4 class="highlighted">
                        Jeśli tak, to prezentowana Platforma biznesowa Meetfaces Trading jest właśnie dla Ciebie i Twojej firmy!
                    </h4>')?>

                    <div class="hr"></div>
                    <h3>Nie masz jeszcze konta?</h3>
                    <a href="<?= \yii\helpers\Url::to('/site/register') ?>" class="btn btn--secondary"
                    ><?= Yii::t('db', 'Register') ?></a
                    >
                </div>
                <div>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'contact-form login__form'],
                        'fieldConfig' => $fieldConfig
                    ]);

                    echo $form->errorSummary($model);
                    ?>
                    <div class="contact-form__header">
                        <?= Yii::t('db', 'Log in into your account') ?>
                    </div>
                    <?= $form->field($model, 'username')->textInput(['type' => 'text', 'required' => true, 'placeholder' => $model->getAttributeLabel('username')]) ?>
                    <?= $form->field($model, 'password')->passwordInput(['required' => true, 'placeholder' => $model->getAttributeLabel('password')]) ?>
                    <div class="flex">
                        <div>
                            <input type="hidden" name="LoginForm[rememberMe]" value="0">
                            <input
                                    type="checkbox"
                                    class="checkbox"
                                    name="LoginForm[rememberMe]"
                                    id="check-1"
                                    value="1"
                            />
                            <label for="check-1"> <?= Yii::t('db', 'Remember me') ?> </label>
                        </div>
                        <div class="text-right">
                            <?= Html::a(Yii::t('db', 'Forgotten password?'), ['site/forgot-password'], ['class' => 'underline']) ?>
                        </div>
                    </div>

                    <button class="btn btn--primary btn--block" type="submit">
                        <?= Yii::t('db', 'Log in') ?>
                    </button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

