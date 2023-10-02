<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true)

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
            <span><?= Yii::t('db', 'Buy') ?> <?= $model ?></span>
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
                        <?= Yii::t('db', 'Buy') ?> <?= $model ?>
                    </div>
                    <?= $form->field($buyForm, 'amount')->textInput(['required' => true, 'placeholder' => $model->getAttributeLabel('amount')]) ?>
                    <?= $form->field($buyForm, 'price')->textInput(['required' => true, 'readonly' => true, 'placeholder' => $model->getAttributeLabel('price')]) ?>

                    <button class="btn btn--primary btn--block" type="submit">
                        <?= Yii::t('db', 'Buy') ?>
                    </button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#buyform-amount').on('change keyup',(function(){
        $('#buyform-price').val(( $(this).val()) * <?= $model->price?>);
    })) ;
</script>

