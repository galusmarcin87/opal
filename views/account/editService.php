<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\Service */

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
                    <h1 class="text-left"><?= Yii::t('db', 'Edit service') ?></h1>
                    <div class="contact-box hidden">
                        <div class="person person--big display-block">
                            <div>
                                <div class="person__role person__role--normal">
                                    <?= Yii::t('db', 'Content description') ?>
                                </div>
                                <?= Yii::t('db', 'Choose language') ?>
                            </div>
                        </div>

                        <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['account/service-edit', 'id'=>$model->id]),]); ?>
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
						<?= Yii::t('db', 'Profit realization') ?>
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'TOKEN') ?>
                            <?= $form->field($model, 'description')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                        </div>
                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'Value') ?>
                            <?= $form->field($model, 'specification')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('specification')])) ?>
                        </div>

                        <?= Yii::t('db', 'Blockchain') ?>
						<div class="flex">
                            <?= $form->field($model, 'price')->textInput(['placeholder' => $model->getAttributeLabel('price')]) ?>
                        </div>

                        <h2 class="with-label"><?= Yii::t('db', 'Gallery') ?></h2>
                        <label><?= Yii::t('db', 'Photos with at least 1000 x 1000 pixels resolution') ?></label>


                        <? foreach ($model->fileRelations as $relation): ?>
                            <? if ($relation->json == '1' || !$relation->file) continue ?>
                            <div
                                    id="GALLERY-IMAGE-PREVIEW"
                                    class="file-uplad"
                            >
                                <?= \kartik\helpers\Html::hiddenInput("fileOrder[" . $relation->file->id . "]") ?>
                                <? echo \yii\helpers\Html::a(Icon::show('trash', ['framework' => Icon::FA]), MgHelpers::createUrl(['/account/delete-relation', 'relId' => $model->id, 'fileId' => $relation->file->id, 'model' => $model::className()]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                                <?= $relation->file->getThumb(250, 130, true, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET, ['class' => 'img-responsive']) ?>
                                <? \kartik\helpers\Html::textarea("FileRelation[$relation->file->id][$model->id][" . $model::className() . "][description]", 'aaa', ['class' => 'form-control']) ?>
                            </div>
                        <? endforeach ?>


                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Add') ?>
                            <?= $form->field($model, 'uploadedFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'class' => 'inputfile']); ?>
                        </label>


                        <h2 class="with-label"><?= Yii::t('db', 'Files') ?></h2>
                        <label><?= Yii::t('db', 'Files with extension *.pdf') ?></label>
                        <div>
                            <? foreach ($model->fileRelations as $relation): ?>
                                <? if ($relation->json != '1' || !$relation->file) continue ?>
                                <a href="<?=$relation->file->getLinkUrl()?>" class="btn btn-primary btn--medium mb-1 ml-0" target="_blank"><?=$relation->file->origin_name?> </a>
                            <? endforeach ?>
                        </div>
                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Add') ?>
                            <?= $form->field($model, 'downloadFiles[]')->fileInput(['multiple' => true, 'accept' => 'application/pdf', 'class' => 'inputfile']); ?>
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
