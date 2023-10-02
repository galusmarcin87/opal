<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\Job */

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
                    <h1 class="text-left"><?= Yii::t('db', 'Edit job') ?></h1>
                    <div class="contact-box hidden">
                        <div class="person person--big display-block">
                            <div>
                                <div class="person__role person__role--normal">
                                    <?= Yii::t('db', 'Content description') ?>
                                </div>
                                <?= Yii::t('db', 'Choose language') ?>
                            </div>
                        </div>

                        <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['account/job-edit', 'id' => $model->id]),]); ?>
                        <select class="select full-width" name="lang" onchange="this.form.submit()">
                            <? foreach (MgHelpers::getConfigParam('languages') as $lang): ?>
                                <option value="<?php echo $lang ?>" <?= $model->language == $lang ? 'selected' : '' ?>><?= $lang ?></option>
                            <? endforeach ?>
                        </select>
                        <?php ActiveForm::end(); ?>


                    </div>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Main information') ?></h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'category-edit-form',
                            'options' => ['class' => 'contact-form'],
                            'fieldConfig' => $fieldConfig
                        ]); ?>
                        <?= $form->errorSummary($model); ?>
						<?= Yii::t('db', 'Intended for sale') ?>
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'Left') ?>
                            <?= $form->field($model, 'info')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                        </div>
                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'tokens') ?>
                            <?= $form->field($model, 'requirements')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('specification')])) ?>
                        </div>

                        <?= Yii::t('db', 'BONUS FOR SALE') ?>
						<div class="flex">
                            <?= $form->field($model, 'salary')->textInput(['placeholder' => $model->getAttributeLabel('salary')]) ?>
                            <?= $form->field($model, 'position')->textInput(['placeholder' => $model->getAttributeLabel('position')]) ?>
                        </div>


                        <div class="flex">
                            <?= $form->field($model, 'address')->textInput(['placeholder' => $model->getAttributeLabel('')]) ?>
                            <div>
                                <div class="select-wrqpper full-width">
                                    <?= $form->field($model, 'industry')->
                                    dropDownList(MgHelpers::getSettingOptionArrayTranslated('industries array'),
                                        ['prompt' => '', 'class' => 'select full-width']) ?>

                                    <i
                                            class="select__icon fa fa-chevron-down"
                                            aria-hidden="true"
                                    ></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            <div>
                                <div class="select-wrqpper full-width">
                                    <?= $form->field($model, 'country')->
                                    dropDownList(MgHelpers::getSettingOptionArrayTranslated('countries array'),
                                        ['prompt' => '', 'class' => 'select full-width']) ?>

                                    <i
                                            class="select__icon fa fa-chevron-down"
                                            aria-hidden="true"
                                    ></i>
                                </div>
                            </div>
                            <?= $form->field($model, 'city')->textInput(['placeholder' => $model->getAttributeLabel('job_city')]) ?>
                        </div>

                        <h2 class="with-label"><?= Yii::t('db', 'Image') ?></h2>
                        <label><?= Yii::t('db', 'Choose graphics') ?></label>


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
                            <?= $form->field($model, 'fileUpload')->fileInput(['multiple' => false, 'accept' => 'image/*', 'class' => 'inputfile']); ?>
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
