<?php
/* @var $project app\models\mgcms\db\Project */
/* @var $payment app\models\mgcms\db\Payment */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;


/* @var $form app\components\mgcms\yii\ActiveForm */


$this->title = Yii::t('db', 'Invest');
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true);

?>

<?= $this->render('/common/breadcrumps') ?>


<div class="container">

    <?php
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'contact-form login__form'],
        'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(false)
    ]);

    echo $form->errorSummary($payment);
    ?>
	<div class="container">
    	<div class="row gy-5">
			<div class="col-lg-6">
        		<div class="pe-lg-5">
            		<h4 class="fw-bold mb-4">
                		<?= $form->field($payment, 'amount')->textInput(['placeholder' => $payment->getAttributeLabel('')]) ?>
            		</h4>
				</div>
			</div>
		
			<div class="col-lg-6">
				<div class="pe-lg-5">
            		<div class="h4 text-success fw-bold">
                		<?= $form->field($payment, 'actions_amount')->textInput(['placeholder' => $payment->getAttributeLabel(''), 'disabled' => true]) ?>
            		</div>
        		</div>
			</div>
   		</div>
	</div>
	
	
	
	<div class="container py-5">
		<div class="invest-summary">
    		<div class="invest-summary-content">
    			<h4 class="mb-5">
        			<strong><?= Yii::t('db', 'Summary') ?></strong>
    			</h4>

    			<div class="row">
        			<div class="col-lg-5">
            			<p class="fs-5"><strong><?= Yii::t('db', 'Invest in project') ?></strong> Lorem ipsum</p>
        			</div>
				
        			<div class="col-lg-7">
            			<p><strong><?= Yii::t('db', 'Invest amount') ?></strong> <span class="invested-amount">...</span> </p>
            			<p><strong><?= Yii::t('db', 'Actions') ?></strong> </p>
        			</div>
    			</div>
    		</div>
    	</div>
	</div>
	
	

    <div class="row">
		<h4 class="mb-5">
            <strong><?= Yii::t('db', 'Payment method') ?></strong>
        </h4>

        <div class="col-lg-9 mx-auto">

            <div class="form-check form-check-acceptance mb-3">
                <div class="Form__group form-group text-left checkbox">
                    <?= $form->field($payment, 'acceptTerms',
                        [
                            'checkboxTemplate' => "{input}\n{label}\n{error}",
                            'labelOptions' => ['encode' => false]
                        ]
                    )->checkbox(['class' => 'form-check-input', 'label' => $payment->getAttributeLabel('acceptTerms')])->label(true); ?>
                </div>
            </div>
            <div class="form-check form-check-acceptance mb-3">
                <?= $form->field($payment, 'acceptTerms2',
                    [
                        'checkboxTemplate' => "{input}\n{label}\n{error}",
                        'labelOptions' => ['encode' => false]
                    ]
                )->checkbox(['class' => 'form-check-input', 'label' => $payment->getAttributeLabel('acceptTerms2')])->label(true); ?>
            </div>
            <div class="form-check form-check-acceptance mb-3">
                <?= $form->field($payment, 'acceptTerms3',
                    [
                        'checkboxTemplate' => "{input}\n{label}\n{error}",
                        'labelOptions' => ['encode' => false]
                    ]
                )->checkbox(['class' => 'form-check-input', 'label' => $payment->getAttributeLabel('acceptTerms3')])->label(true); ?>
            </div>
            <div class="form-check form-check-acceptance mb-3">
                <?= $form->field($payment, 'showUserName',
                    [
                        'checkboxTemplate' => "{input}\n{label}\n{error}",
                        'labelOptions' => ['encode' => false]
                    ]
                )->checkbox(['class' => 'form-check-input', 'label' => $payment->getAttributeLabel('showUserName')])->label(true); ?>
            </div>
            <div class="form-check form-check-acceptance mb-3">
                <?= $form->field($payment, 'showUserPhoto',
                    [
                        'checkboxTemplate' => "{input}\n{label}\n{error}",
                        'labelOptions' => ['encode' => false]
                    ]
                )->checkbox(['class' => 'form-check-input', 'label' => $payment->getAttributeLabel('showUserPhoto')])->label(true); ?>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <?= Yii::t('db', 'Buy with TPay') ?>
                </button>
            </div>

        </div>
    </div>


    <?php ActiveForm::end(); ?>


</div>

<script>
    $('#payment-amount').on('change keyup', (function () {
        const tokenValue = <?=(float)$project->token_value?>;
        $('#payment-actions_amount').val(($(this).val()) / tokenValue);
    }));
</script>

