<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\Product */

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
                    <h1 class="text-left"><?= Yii::t('db', 'Edit product') ?></h1>
                    <div class="contact-box hidden">
                        <div class="person person--big display-block">
                            <div>
                                <div class="person__role person__role--normal">
                                    <?= Yii::t('db', 'Content description') ?>
                                </div>
                                <?= Yii::t('db', 'Choose language') ?>
                            </div>
                        </div>

                        <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['account/product-edit', 'id'=>$model->id]),]); ?>
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
						<?= Yii::t('db', 'Annual profit') ?>
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'Pre-sale start') ?>
                            <?= $form->field($model, 'description')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                        </div>
                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'Pre-sale end') ?>
                            <?= $form->field($model, 'specification')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('specification')])) ?>
                        </div>
                        <div class="mb-4 bottom25">
							<?= Yii::t('db', 'Crowdsale start') ?>
                            <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' =>\yii\helpers\ArrayHelper::map(Category::find()->andWhere(['type' => Category::TYPE_COMPANY_TYPE])->orderBy('id')->all(), 'id', 'nameTranslated'),
                                'options' => ['placeholder' => Yii::t('app', 'Choose Category'), 'prompt' => '',],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]); ?>
                        </div>

						<?= Yii::t('db', 'Crowdsale end') ?>
                        <div class="flex">
                            <?= $form->field($model, 'price')->textInput(['placeholder' => $model->getAttributeLabel('price')]) ?>
                            <?= $form->field($model, 'number')->textInput(['placeholder' => $model->getAttributeLabel('number')]) ?>
                        </div>

						<?= Yii::t('db', 'Crowdsale profit') ?>
                        <div class="switch-wrapper">
                            <?= Yii::t('db', 'Standard offer') ?>
                            <label class="switch">
                                <input type="checkbox"
                                       name="Product[is_special_offer]" <?= $model->is_special_offer ? 'checked' : '' ?> value="1"/>
                                <span class="slider round"></span>
                            </label>
                            <?= Yii::t('db', 'Special offer') ?>
                        </div>

						<?= Yii::t('db', 'Pre-sale bonus') ?>
                        <div class="flex mb-4">
                            <?= $form->field($model, 'special_offer_from')->widget(\kartik\datecontrol\DateControl::classname(), [
                                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                                'saveFormat' => 'php:Y-m-d',
                                'ajaxConversion' => true,
                                'options' => [
                                    'options' => ['class ' => 'input full-width'],
                                    'pluginOptions' => [
                                        'placeholder' => Yii::t('app', 'Choose Special Offer From'),
                                        'autoclose' => true,

                                    ]
                                ],
                            ]); ?>

                            <?= $form->field($model, 'special_offer_to')->widget(\kartik\datecontrol\DateControl::classname(), [
                                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                                'saveFormat' => 'php:Y-m-d',
                                'ajaxConversion' => true,
                                'options' => [
                                    'pluginOptions' => [
                                        'placeholder' => Yii::t('app', 'Choose Special Offer To'),
                                        'autoclose' => true
                                    ]
                                ],
                            ]); ?>

                        </div>

                        <div class="flex">
                            <?= $form->field($model, 'min_amount_of_purchase')->textInput(['placeholder' => $model->getAttributeLabel('min_amount_of_purchase')]) ?>
                            <?= $form->field($model, 'special_offer_price')->textInput(['placeholder' => $model->getAttributeLabel('special_offer_price')]) ?>
                        </div>

                        <h2 class="with-label"><?= Yii::t('db', 'Image') ?></h2>
                        <label><?= Yii::t('db', 'Choose graphics') ?></label>


                        <? if ($model->file && $model->file->isImage()): ?>
                            <div
                                    id="MINIATURE-PREVIEW"
                                    class="file-uplad"
                            >
                                <? echo \yii\helpers\Html::a(Icon::show('trash', ['framework' => Icon::FA]), MgHelpers::createUrl(['/account/delete-main-image', 'relId' => $model->id, 'model' => $model::className()]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                                <img src="<?= $model->file->getImageSrc(140) ?>" class=""/>

                            </div>
                        <? endif; ?>


                        <label class="file-uplad">
                            + <?= Yii::t('db', 'Add') ?>
                            <?= $form->field($model, 'fileUpload')->fileInput(['multiple' => false, 'accept' => '.jpg,.jpeg,.png', 'class' => 'inputfile']); ?>
                        </label>


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
                            <?= $form->field($model, 'uploadedFiles[]')->fileInput(['multiple' => true, 'accept' => '.jpg,.jpeg,.png', 'class' => 'inputfile']); ?>
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
