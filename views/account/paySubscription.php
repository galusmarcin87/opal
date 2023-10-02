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
            <span><?= Yii::t('db', 'Pay for subscription') ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
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
                        <?= Yii::t('db', 'Pay for subscription') ?>
                    </div>
                    <?= $form->field($model, 'subscrriptionFee')->textInput(['required' => true, 'readonly' => true, 'placeholder' => $model->getAttributeLabel('subscrriptionFee')]) ?>
                    <?= $form->field($model, 'exchangeRate')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('exchangeRate')]) ?>
                    <?= $form->field($model, 'tokensAmount')->textInput(['required' => true, 'readonly' => true, 'placeholder' => $model->getAttributeLabel('tokensAmount')]) ?>

                    <button class="btn btn--primary btn--block" type="submit">
                        <?= Yii::t('db', 'Pay') ?>
                    </button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#paysubscriptionform-exchangerate').on('change keyup',(function(){
      $('#paysubscriptionform-tokensamount').val((1 / $(this).val()) * $('#paysubscriptionform-subscrriptionfee').val());
    })) ;
</script>
