<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */


use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;


$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true);
$countries = MgHelpers::getAllCountriesArray();
array_walk($countries, function (&$v, $k) {
    $v = Yii::t('db', $v);
});
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
            <span><?= Yii::t('db', 'Buy ad') ?></span>
        </div>

        <div class="service single-company">
            <?= MgHelpers::getSetting('buy ad text ' . Yii::$app->language, true, 'buy ad text') ?>
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

                        <?= $form->field($model, 'country')->dropDownList($countries) ?>
                        <?= $form->field($model, 'displayTime')->dropDownList([
                            1 => Yii::t('db', 'One month'),
                            3 => Yii::t('db', 'Three months'),
                            6 => Yii::t('db', 'Six months'),
                        ]) ?>
                        <?= $form->field($model, 'link')->textInput(['placeholder' => Yii::t('db','Link')]) ?>

                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Choose image') ?>
                            <?= $form->field($model, 'image')->fileInput(['multiple' => false, 'accept' => 'image/*', 'class' => 'inputfile']); ?>
                        </label>


                        <div>

                            <button class="btn btn--primary " type="submit" name="pay-stripe">
                                <?= Yii::t('db', 'Pay by Stripe') ?>
                            </button>
                            <button class="btn btn--primary " type="submit" name="pay-kanga">
                                <?= Yii::t('db', 'Pay by tokens') ?>
                            </button>
                        </div>

                        <?php ActiveForm::end(); ?></center>
                </div>
            </div>
        </div>
    </div>
</section>

