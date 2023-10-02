<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\User */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \app\models\mgcms\db\Category;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);


$fieldConfig = \app\components\ProjectHelper::getFormFieldConfigMyAccount();

?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="search-results search-results--dashboard">
            <?= $this->render('_leftMenu') ?>
            <div>
                <div class="dashboard-wrapper">
                    <h1 class="text-left"><?= Yii::t('db', $model->isNewRecord ? 'Add agent' : 'Edit agent') ?></h1>
                    <? if (!$model->isNewRecord): ?>
                        <div class="contact-box hidden">

                            <div class="person person--big display-block">
                                <div>
                                    <div class="person__role person__role--normal">
                                        <?= Yii::t('db', 'Content description') ?>
                                    </div>
                                    <?= Yii::t('db', 'Choose language') ?>
                                </div>
                            </div>


                            <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['account/agent-edit', 'id' => $this->context->request->getQueryParam('id')]),]); ?>
                            <select class="select full-width" name="lang" onchange="this.form.submit()">
                                <? foreach (MgHelpers::getConfigParam('languages') as $lang): ?>
                                    <option value="<?php echo $lang ?>" <?= $model->language == $lang ? 'selected' : '' ?>><?= $lang ?></option>
                                <? endforeach ?>
                            </select>
                            <?php ActiveForm::end(); ?>


                        </div>
                    <? endif; ?>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Main information') ?></h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'category-edit-form',
                            'options' => ['class' => 'contact-form'],
                            'fieldConfig' => $fieldConfig,
                            'enableAjaxValidation' => false,
                            'enableClientValidation' => false,
                        ]); ?>
                        <?= $form->errorSummary($model); ?>

                        <div class="switch-wrapper">
                            <?= Yii::t('db', 'I am the agent') ?>
                            <label class="switch">
                                <input type="checkbox" id="imAgentCheckbox"
                                       name="User[imAgentCheckbox]" <?= $model->imAgentCheckbox ? 'checked' : '' ?>
                                       value="1"/>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="imAgentWrapper <?= $model->imAgentCheckbox ? 'hidden' : '' ?>">
                            <?= Yii::t('db', 'Parent') ?>
							<?= $form->field($model, 'first_name')->textInput(['placeholder' => $model->getAttributeLabel('first_name')]) ?>
                            <?= $form->field($model, 'last_name')->textInput(['placeholder' => $model->getAttributeLabel('last_name')]) ?>
                        </div>

                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'News') ?>
                            <?= $form->field($model, 'description')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                        </div>

                        <div class="flex">
                            <?= $form->field($model, 'position')->textInput(['placeholder' => $model->getAttributeLabel('position')]) ?>
                            <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
                        </div>

                        <div class="flex imAgentWrapper">
                            <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
                        </div>

                        <h2 class="with-label"><?= Yii::t('db', 'Image') ?></h2>
                        <?= Yii::t('db', 'They write about us') ?>


                        <? if ($model->file && $model->file->isImage()): ?>
                            <div
                                    id="MINIATURE-PREVIEW"
                                    class="file-uplad"
                            >
                                <img src="<?= $model->file->getImageSrc(140) ?>" class=""/>
                            </div>
                        <? endif; ?>


                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Add') ?>
                            <?= $form->field($model, 'fileUpload')->fileInput(['multiple' => false, 'accept' => '.jpg,.jpeg,.png', 'class' => 'inputfile']); ?>
                        </label>


                        <div class="text-right">
                            <button class="btn btn--primary btn--medium" type="submit">
                                <?= Yii::t('db', 'Save') ?>
                            </button>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#imAgentCheckbox').on('change', function () {
        const isChecked = $(this).is(':checked');
        if (isChecked) {
            $('.imAgentWrapper').addClass('hidden');
        }else{
            $('.imAgentWrapper').removeClass('hidden');
        }
    });
</script>
