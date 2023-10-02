<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true)

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>
<style>
    .service p {
        margin-bottom: 0;
    }
</style>
<section class="service-wrapper company-wrapper login">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= Yii::t('db', 'Become a consultant') ?></span>
        </div>

        <div class="service single-company">
            <p>
                <?= MgHelpers::getSetting('zostań konsultantem tekst ' . Yii::$app->language, true, 'zostań konsultantem tekst') ?>
            </p>
            <div class="flex">
                <div>
                    <center>
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'contact-form login__form'],
                            'fieldConfig' => $fieldConfig
                        ]);

                        echo $form->errorSummary($model);
                        ?>
                        <div class="contact-form__header">
                            <?= Yii::t('db', 'Become a consultant') ?>
                        </div>

                        <?= $form->field($model, 'first_name')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('first_name')]) ?>
                        <?= $form->field($model, 'surname')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('surname')]) ?>
                        <?= $form->field($model, 'email')->textInput(['required' => true, 'type' => 'email', 'placeholder' => $model->getAttributeLabel('email')]) ?>
                        <?= $form->field($model, 'phone')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('phone')]) ?>
                        <?= $form->field($model, 'city')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('city')]) ?>
                        <?= $form->field($model, 'voivodeship')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('voivodeship')]) ?>

                        <button class="btn btn--primary btn--block" type="submit">
                            <?= Yii::t('db', 'Send') ?>
                        </button>
                        <?php ActiveForm::end(); ?></center>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  $('#paysubscriptionform-exchangerate').on('change keyup', (function () {
    $('#paysubscriptionform-tokensamount').val($(this).val() * $('#paysubscriptionform-subscrriptionfee').val());
  }));
</script>
