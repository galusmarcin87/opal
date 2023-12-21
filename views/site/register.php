<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;

$this->title = Yii::t('db', 'Register');

?>

<?= $this->render('/common/breadcrumps'); ?>

<div class="container">


    <div class="text-center my-5">
        <img src="/images/logo.png" alt="Opal Crowd" class="img-fluid mx-auto">
    </div>

    <h3 class="my-5 text-center">
        <?= Yii::t('db', 'Fill the data') ?>
    </h3>

    <?php
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'contact-form login__form'],
        'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(true)
    ]);

    echo $form->errorSummary($model);
    ?>
    <div class="row">
        <div class="col-lg-6 mx-auto">


            <div class="text-center mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="RegisterForm[isCompany]" id="client_type-person"
                           checked
                           value="0">
                    <label class="form-check-label" for="client_type-person"><?= Yii::t('db', 'person') ?></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="RegisterForm[isCompany]" id="client_type-company"
                           value="1">
                    <label class="form-check-label" for="client_type-company"><?= Yii::t('db', 'company') ?></label>
                </div>

            </div>

            <div class="mb-4">
                <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
            </div>

            <div class="mb-4">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
            </div>

            <div class="mb-4">
                <?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => $model->getAttributeLabel('passwordRepeat')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'firstName')->textInput(['placeholder' => $model->getAttributeLabel('firstName')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'surname')->textInput(['placeholder' => $model->getAttributeLabel('surname')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'birthDate')->textInput(["onfocus" => "(this.type='date')", 'placeholder' => $model->getAttributeLabel('birthDate')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'street')->textInput(['placeholder' => $model->getAttributeLabel('street')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'houseNo')->textInput(['placeholder' => $model->getAttributeLabel('houseNo')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'flatNo')->textInput(['placeholder' => $model->getAttributeLabel('flatNo')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'postalCode')->textInput(['placeholder' => $model->getAttributeLabel('postalCode')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'city')->textInput(['placeholder' => $model->getAttributeLabel('city')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'voivodeship')->textInput(['placeholder' => $model->getAttributeLabel('voivodeship')]) ?>
            </div>


            <div class="mb-4 companyFields hidden">
                <?= $form->field($model, 'nip')->textInput(['placeholder' => $model->getAttributeLabel('nip')]) ?>
            </div>

            <div class="mb-4 companyFields hidden">
                <?= $form->field($model, 'regon')->textInput(['placeholder' => $model->getAttributeLabel('regon')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'pesel')->textInput(['placeholder' => $model->getAttributeLabel('pesel')]) ?>
            </div>


            <div class="mb-4">
                <?= $form->field($model, 'idNumber')->textInput(['placeholder' => $model->getAttributeLabel('idNumber')]) ?>
            </div>


        </div>

    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="text-center">
                <?= MgHelpers::getSettingTypeText('register text ' . Yii::$app->language, true, '<p>W celu dokonania rejestracji należy wyrazić zgodę na warunki regulaminu i politkę prywatności serwisu OpalCrowd.com</p>') ?>
            </div>

            <div class="my-4">
                <div class="ratio ratio-16x9">
                    <iframe src="<?= MgHelpers::getSetting('register PDF ' . Yii::$app->language, false, '/images/sample_pdf2.pdf') ?>"
                            frameborder="0"></iframe>
                </div>
            </div>

            <div class="form-check form-check-acceptance mb-4">
                <div class="Form__group form-group text-left checkbox">
                    <?= $form->field($model, 'acceptTerms',
                        [
                            'checkboxTemplate' => "{input}\n{label}\n{error}",
                            'labelOptions' => ['encode' => false]
                        ]
                    )->checkbox(['class' => 'form-check-input', 'label' => $model->getAttributeLabel('acceptTerms')])->label(true); ?>
                </div>
            </div>
            <div class="form-check form-check-acceptance mb-5">
                <?= $form->field($model, 'acceptTerms2',
                    [
                        'checkboxTemplate' => "{input}\n{label}\n{error}",
                        'labelOptions' => ['encode' => false]
                    ]
                )->checkbox(['class' => 'form-check-input', 'label' => $model->getAttributeLabel('acceptTerms2')])->label(true); ?>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <?= Yii::t('db', 'Register') ?>
                </button>
            </div>

        </div>
    </div>


    <?php ActiveForm::end(); ?>
    <script>
        $('input[type=radio][name="RegisterForm[isCompany]"').change(function() {
            if(this.value == 1){
                $('.companyFields').removeClass('hidden');
            }else{
                $('.companyFields').addClass('hidden');
            }
        });
    </script>

</div>
