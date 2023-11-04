<?php
/* @var $project app\models\mgcms\db\Project */
/* @var $payment app\models\mgcms\db\Payment */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $payment app\models\mgcms\db\Payment */

/* @var $form app\components\mgcms\yii\ActiveForm */

use \kartik\datecontrol\Module;

$this->title = Yii::t('db', 'Invest');
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true);

$buyDefaultAmount = $project->type == \app\models\mgcms\db\Project::TYPE_BUSINESS_OWNER ? $project->value : MgHelpers::getSetting('buy default amount', false, 1000);

?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Project">
    <?php
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => $fieldConfig
    ]);

    ?>
    <div class="container">
        <h1 class="text-center"><?= Yii::t('db', 'Invest') ?></h1>
        <div class="row">
            <div class="col-md-12">
                <h4><?= $project->name ?></h4>
                <table>
                    <tr>
                        <th><?= Yii::t('db', 'Return on investment') ?> </th>
                        <td><?= $project->percentage ?>%</td>
                    </tr>
                    <tr>
                        <th><?= Yii::t('db', 'Money gathered') ?></th>
                        <td><?= $project->money ?>$</td>
                    </tr>
                    <tr>
                        <th><?= Yii::t('db', 'Goal') ?></th>
                        <td><?= $project->money_full ?>$</td>
                    </tr>
                    <tr>
                        <th><?= Yii::t('db', 'Time left') ?></th>
                        <td><?= MgHelpers::dateDifference($project->date_crowdsale_end, date("Y-m-d H:i:s"), Yii::t('db', '%a days, %h hours')) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h4><?= Yii::t('db', 'Place and time of signing the notarial deed') ?></h4>
                <?= $form->field($payment, 'notarial_act_city')->textInput(['required' => true, 'placeholder' => $payment->getAttributeLabel('notarial_act_city')]) ?>
                <?= $form->field($payment, 'notarial_act_day')->widget(\kartik\datecontrol\DateControl::classname(), [
                    'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                    'saveFormat' => 'php:Y-m-d',
                    'ajaxConversion' => true,
                    'options' => [
                        'pluginOptions' => [
                            'placeholder' => Yii::t('app', Yii::t('app', 'Choose ' . $payment->getAttributeLabel('notarial_act_day'))),
                            'autoclose' => true
                        ]
                    ],
                ]); ?>
                <?= $form->field($payment, 'notarial_act_hour')->textInput(['required' => true, 'placeholder' => $payment->getAttributeLabel('notarial_act_hour')]) ?>
                <?= $form->field($payment, 'notarial_act_day2')->widget(\kartik\datecontrol\DateControl::classname(), [
                    'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                    'saveFormat' => 'php:Y-m-d',
                    'ajaxConversion' => true,
                    'options' => [
                        'pluginOptions' => [
                            'placeholder' => Yii::t('app', Yii::t('app', 'Choose ' . $payment->getAttributeLabel('notarial_act_day2'))),
                            'autoclose' => true
                        ]
                    ],
                ]); ?>
                <?= $form->field($payment, 'notarial_act_hour2')->textInput(['required' => true, 'placeholder' => $payment->getAttributeLabel('notarial_act_hour2')]) ?>
            </div>
            <div class="col-md-6">
                <h4><?= Yii::t('db', 'Fill information below to invest') ?></h4>
                <?= $form->field($payment, 'is_company')->checkbox(['placeholder' => $payment->getAttributeLabel('is_company')]) ?>
                <?= $form->field($payment, 'tax_id_type')->radioList(['nip' => Yii::t('db', 'NIP'), 'pesel' => Yii::t('db', 'PESEL')], ['inline' => true]) ?>

                <div class="row">
                    <? if ($project->type == \app\models\mgcms\db\Project::TYPE_BUSINESS_PROFIT): ?>
                        <button class="btn-primary col-md-2 amountBtn" type="button"
                                onclick="this.parentNode.querySelector('#payment-amount').stepDown()"> -
                        </button>
                    <? endif ?>
                    <?= $form->field($payment, 'amount')->textInput([
                            'type' => 'number',
                        'disabled' => $project->type == \app\models\mgcms\db\Project::TYPE_BUSINESS_OWNER,
                        'step' => $buyDefaultAmount,
                        'value' => $buyDefaultAmount, 'required' => true, 'placeholder' => $payment->getAttributeLabel('amount')]) ?>
                    <? if ($project->type == \app\models\mgcms\db\Project::TYPE_BUSINESS_PROFIT): ?>
                        <button class="btn-primary col-md-2 amountBtn" type="button"
                                onclick="this.parentNode.querySelector('#payment-amount').stepUp()"> +
                        </button>
                    <? endif ?>
                </div>


                <button type="submit" class="btn btn-primary"><?= Yii::t('db', 'Next') ?></button>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</section>
