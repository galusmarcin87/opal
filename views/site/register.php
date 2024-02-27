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
        <img src="/images/logo.png" alt="ECM" class="img-fluid mx-auto">
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
        <div class="col-lg-8 mx-auto">
			
            <div class="text-center mb-3">
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
            <div class="mb-3">
				<?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
			</div>
			<div class="mb-3">
				<?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
			</div>
			<div class="mb-3">
				<?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => $model->getAttributeLabel('passwordRepeat')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_name')->textInput(['placeholder' => $model->getAttributeLabel('company_name')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_street')->textInput(['placeholder' => $model->getAttributeLabel('company_street')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_house_no')->textInput(['placeholder' => $model->getAttributeLabel('company_house_no')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_flat_no')->textInput(['placeholder' => $model->getAttributeLabel('company_flat_no')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_postcode')->textInput(['placeholder' => $model->getAttributeLabel('company_postcode')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_city')->textInput(['placeholder' => $model->getAttributeLabel('company_city')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_country')->textInput(['placeholder' => $model->getAttributeLabel('company_country')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_nip')->textInput(['placeholder' => $model->getAttributeLabel('company_nip')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_regon')->textInput(['placeholder' => $model->getAttributeLabel('company_regon')]) ?>
			</div>
			<div class="mb-3 companyFields hidden">
				<?= $form->field($model, 'company_krs')->textInput(['placeholder' => $model->getAttributeLabel('company_krs')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'first_name')->textInput(['placeholder' => $model->getAttributeLabel('first_name')]) ?>
			</div>
			<div class="mb-3">
				<?= $form->field($model, 'last_name')->textInput(['placeholder' => $model->getAttributeLabel('last_name')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'birthDate')->textInput(["onfocus" => "(this.type='date')", 'placeholder' => $model->getAttributeLabel('birthDate')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'street')->textInput(['placeholder' => $model->getAttributeLabel('street')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'house_no')->textInput(['placeholder' => $model->getAttributeLabel('house_no')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'flat_no')->textInput(['placeholder' => $model->getAttributeLabel('flat_no')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'postcode')->textInput(['placeholder' => $model->getAttributeLabel('postcode')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'city')->textInput(['placeholder' => $model->getAttributeLabel('city')]) ?>
			</div>
			<div class="mb-3">
				<?= $form->field($model, 'country')->textInput(['placeholder' => $model->getAttributeLabel('country')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'voivodeship')->textInput(['placeholder' => $model->getAttributeLabel('voivodeship')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'pesel')->textInput(['placeholder' => $model->getAttributeLabel('pesel')]) ?>
			</div>
            <div class="mb-3">
				<?= $form->field($model, 'id_document_no')->textInput(['placeholder' => $model->getAttributeLabel('id_document_no')]) ?>
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
$(document).ready(function() {
    // Ukryj lub pokaż pola na podstawie aktualnie zaznaczonej wartości przy ładowaniu strony
    toggleFieldsForCompany($('input[type=radio][name="RegisterForm[isCompany]"]:checked').val());

    $('input[type=radio][name="RegisterForm[isCompany]"]').change(function() {
        toggleFieldsForCompany(this.value);
    });

    function toggleFieldsForCompany(value) {
        // Definiowanie pól, które mają być ukryte dla Company
        var fieldsToToggle = ['.field-registerform-birthdate',
                              '.field-registerform-street',
                              '.field-registerform-house_no',
                              '.field-registerform-flat_no',
                              '.field-registerform-postcode',
                              '.field-registerform-city',
							  '.field-registerform-country',
                              '.field-registerform-voivodeship',
							  '.field-registerform-id_document_no',
                              '.field-registerform-pesel'];
		
        // Jeśli wybrana wartość to 1 (firma), ukryj pola
        if(value == 1){
            fieldsToToggle.forEach(function(field) {
                $(field).addClass('hidden');
            });
            $('.companyFields').removeClass('hidden');
        }else{
            // W przeciwnym razie (osoba fizyczna), pokaż pola
            fieldsToToggle.forEach(function(field) {
                $(field).removeClass('hidden');
            });
            $('.companyFields').addClass('hidden');
        }
    }
});
</script>

</div>
