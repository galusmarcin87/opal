<?php
/* @var $this yii\web\View */

/* @var $model \app\models\mgcms\db\Company */

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
                    <h1 class="text-left"><?= Yii::t('db', 'Edit company') ?></h1>
                    <div class="contact-box hidden">
                        <div class="person person--big display-block">
                            <div>
                                <div class="person__role person__role--normal">
                                    <?= Yii::t('db', 'Content description') ?>
                                </div>
                                <?= Yii::t('db', 'Choose language') ?>
                            </div>
                        </div>

                        <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['account/edit-company']),]); ?>
                        <select class="select full-width" name="lang" onchange="this.form.submit()">
                            <? foreach (MgHelpers::getConfigParam('languages') as $lang): ?>
                                <option value="<?php echo $lang ?>" <?= $model->language == $lang ? 'selected' : '' ?>><?= $lang ?></option>
                            <? endforeach ?>
                        </select>
                        <?php ActiveForm::end(); ?>


                    </div>
                    <?php $form = ActiveForm::begin([
                        'id' => 'category-edit-form',
                        'options' => ['class' => ''],
                        'fieldConfig' => $fieldConfig
                    ]); ?>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Main information') ?></h2>
                        <?= Yii::t('db', 'Time left') ?>
                        <div class="contact-form">
                            <?= $form->errorSummary($model); ?>
                            <?= Yii::t('db', 'Current projects') ?>
                            <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

                            <div class="mb-4 bottom25">
                                <?= Yii::t('db', 'Current') ?>
                                <?= $form->field($model, 'description')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                            </div>
                            <div class="mb-4 bottom25">
                                <?= Yii::t('db', 'Looking for') ?>
                                <?= $form->field($model, 'looking_for')->widget(TinyMce::className(), MgHelpers::getTinyMceOptions(['placeholder' => $model->getAttributeLabel('description')])) ?>
                            </div>
                            <div class="mb-4 bottom25">

                                <?= Yii::t('db', 'Ended') ?>
                                <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' =>\yii\helpers\ArrayHelper::map(Category::find()->andWhere(['type' => Category::TYPE_COMPANY_TYPE])->orderBy('id')->all(), 'id', 'nameTranslated'),
                                    'options' => ['placeholder' => Yii::t('db', 'Choose Category'), 'prompt' => ''],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            </div>
                            <br>
                            <?= Yii::t('db', 'Planned') ?>
                            <div class="text-right">
                                <button class="btn btn--primary btn--medium" type="submit"
                                        onclick="return formSubmit()">
                                    <?= Yii::t('db', 'Save') ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <h2><?= Yii::t('db', 'Contact data') ?></h2>
                        <div class="contact-form">

                            <div class="flex">
                                <?= $form->field($model, 'first_name')->textInput(['placeholder' => $model->getAttributeLabel('first_name')]) ?>
                                <?= $form->field($model, 'surname')->textInput(['placeholder' => $model->getAttributeLabel('surname')]) ?>
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

                                <?= $form->field($model, 'city')->textInput(['placeholder' => $model->getAttributeLabel('city')]) ?>
                            </div>
                            <div class="flex">

                                <?= $form->field($model, 'postcode')->textInput(['placeholder' => $model->getAttributeLabel('postcode')]) ?>
                            </div>
                            <div class="flex">
                                <?= $form->field($model, 'street')->textInput(['placeholder' => $model->getAttributeLabel('street')]) ?>
                                <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
                            </div>
                            <div class="flex">
                                <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email'), 'type' => 'email']) ?>
                                <?= $form->field($model, 'www')->textInput(['placeholder' => $model->getAttributeLabel('www')]) ?>
                            </div>

                            <div class="flex">
                                <?= $form->field($model, 'nip')->textInput(['placeholder' => $model->getAttributeLabel('nip')]) ?>
                                <?= $form->field($model, 'regon')->textInput(['placeholder' => $model->getAttributeLabel('regon')]) ?>

                            </div>
                            <div class="flex">
                                <?= $form->field($model, 'krs')->textInput(['placeholder' => $model->getAttributeLabel('krs')]) ?>
                                <?= $form->field($model, 'banc_account_no')->textInput(['placeholder' => $model->getAttributeLabel('banc_account_no')]) ?>
                            </div>


                            <div class="switch-wrapper">
                                <?= Yii::t('db', 'Standard account') ?>
                                <label class="switch">
                                    <input type="checkbox" id="company_is_for_sale"
                                           name="Company[is_for_sale]" <?= $model->is_for_sale ? 'checked' : '' ?>
                                           value="1"/>
                                    <span class="slider round"></span>
                                </label>
                                <?= Yii::t('db', 'Company for sale') ?>
                            </div>


                            <div id="saleWrapper" class="<?= $model->is_for_sale ? '' : 'hidden' ?>">
                                <div class="col-md-12">
                                    <legend><?= Yii::t('db', 'Data for sale') ?></legend>
                                </div>


                                <div class="flex">
                                    <?= $form->field($model, 'sale_title')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('sale_title')]) ?>

                                    <?= $form->field($model, 'sale_description')->textarea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('sale_description')]) ?>
                                </div>
                                <div class="flex">
                                    <?= $form->field($model, 'sale_price')->textInput(['placeholder' => $model->getAttributeLabel('sale_price')]) ?>

                                    <?= $form->field($model, 'sale_currency')->dropDownList(MgHelpers::getSettingOptionArrayTranslated('currency array'), ['prompt' => $model->getAttributeLabel('sale_currency')]) ?>
                                </div>
                                <div class="flex">
                                    <?= $form->field($model, 'sale_price_includes')->textarea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('sale_price_includes')]) ?>

                                    <?= $form->field($model, 'sale_reason')->textarea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('sale_reason')]) ?>
                                </div>
                                <div class="flex">
                                    <?= $form->field($model, 'sale_business_range')->dropDownList(MgHelpers::getSettingOptionArrayTranslated('business range array'), ['prompt' => $model->getAttributeLabel('sale_business_range')]) ?>

                                    <?= $form->field($model, 'sale_workers_number')->textInput(['placeholder' => $model->getAttributeLabel('sale_workers_number')]) ?>
                                </div>
                                <div class="flex">
                                    <?= $form->field($model, 'sale_sale_range')->dropDownList(MgHelpers::getSettingOptionArrayTranslated('sales range array'), ['prompt' => $model->getAttributeLabel('sale_sale_range')]) ?>

                                    <?= $form->field($model, 'sale_last_year_income')->textInput(['placeholder' => $model->getAttributeLabel('sale_last_year_income')]) ?>
                                </div>
                                <div class="flex">
                                    <?= $form->field($model, 'sale_company_profile')->dropDownList(MgHelpers::getSettingOptionArrayTranslated('company profile array'), ['prompt' => $model->getAttributeLabel('sale_company_profile')]) ?>

                                    <?= $form->field($model, 'sale_form_of_business')->dropDownList(MgHelpers::getSettingOptionArrayTranslated('form of business array'), ['prompt' => $model->getAttributeLabel('sale_form_of_business')]) ?>
                                </div>
                            </div>


                            <h2><?= Yii::t('db', 'Map') ?></h2>
                            <?= Yii::t('db', 'days') ?>
                            <div class="flex">
                                <?= $form->field($model, 'gps_lat')->textInput(['placeholder' => $model->getAttributeLabel('gps_lat')]) ?>
                                <?= $form->field($model, 'gps_long')->textInput(['placeholder' => $model->getAttributeLabel('gps_long')]) ?>
                            </div>

                            <h2><?= Yii::t('db', 'Video') ?></h2>
                            <div class="flex">
                                <?= $form->field($model, 'video')->textInput(['placeholder' => $model->getAttributeLabel('video')]) ?>

                            </div>
                            <h2 class="with-label"></h2>
                            <label><?= Yii::t('db', 'Choose graphics file for video thumbnail') ?></label>


                            <? if ($model->thumbnail && $model->thumbnail->isImage()): ?>
                                <div
                                        id="MINIATURE-PREVIEW"
                                        class="file-uplad"
                                >
                                    <img src="<?= $model->video_thumbnail ?>" class=""/>
                                </div>
                            <? endif; ?>


                            <label class="file-uplad">
                                + <?= Yii::t('db', 'Add') ?>
                                <?= $form->field($model, 'video_thumbnail')->fileInput(['multiple' => false, 'accept' => 'image/*', 'class' => 'inputfile']); ?>
                            </label>
                            <div class="text-right">
                                <button class="btn btn--primary btn--medium" type="submit"
                                        onclick="return formSubmit()">
                                    <?= Yii::t('db', 'Save') ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-wrapper">


                        <div class="contact-form">
                            <h2 class="with-label"><?= Yii::t('db', 'Thumbnail') ?></h2>
                            <label><?= Yii::t('db', 'Choose graphics file') ?></label>


                            <? if ($model->thumbnail && $model->thumbnail->isImage()): ?>
                                <div
                                        id="MINIATURE-PREVIEW"
                                        class="file-uplad"
                                >
                                    <? echo \yii\helpers\Html::a(Icon::show('trash', ['framework' => Icon::FA]), MgHelpers::createUrl(['/account/delete-main-image', 'relId' => $model->id, 'model' => $model::className()]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                                    <img src="<?= $model->thumbnail->getImageSrc(240, 0) ?>" class=""/>
                                </div>
                            <? endif; ?>


                            <label class="file-uplad">
                                + <?= Yii::t('db', 'Add') ?>

                                <?= $form->field($model, 'thumbnailFile')->fileInput(['multiple' => false, 'accept' => '.jpg,.jpeg,.png', 'class' => 'inputfile']); ?>

                            </label>

                            <h2 class="with-label"><?= Yii::t('db', 'Background photo') ?></h2>
                            <label><?= Yii::t('db', 'hours') ?></label>

                            <? if ($model->background && $model->background->isImage()): ?>
                                <div
                                        id="BG-IMAGE-PREVIEW"
                                        class="file-uplad"
                                >
                                    <? echo \yii\helpers\Html::a(Icon::show('trash', ['framework' => Icon::FA]), MgHelpers::createUrl([
                                        '/account/delete-main-image',
                                        'relId' => $model->id,
                                        'model' => $model::className(),
                                        'type' => 'background'
                                    ]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                                    <img
                                            src="<?= $model->background->getImageSrc(240, 0) ?>"
                                            alt=""
                                    />
                                </div>
                            <? endif; ?>

                            <label class="file-uplad">
                                + <?= Yii::t('db', 'Add') ?>
                                <?= $form->field($model, 'backgroundFile')->fileInput(['multiple' => false, 'accept' => '.jpg,.jpeg,.png', 'class' => 'inputfile']); ?>
                            </label>

                            <h2 class="with-label"><?= Yii::t('db', 'Gallery') ?></h2>
                            <label><?= Yii::t('db', 'Photos with at least 1000 x 1000 pixels resolution') ?></label>


                            <? foreach ($model->fileRelations as $relation): ?>
                                <? if ($relation->json != '' || !$relation->file) continue ?>
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
                                    <span class="inline-block position-relative">
                                    <? echo \yii\helpers\Html::a(Icon::show('trash', ['framework' => Icon::FA]), MgHelpers::createUrl(['/account/delete-relation', 'relId' => $model->id, 'fileId' => $relation->file->id, 'model' => $model::className()]), ['onclick' => 'return confirm("' . Yii::t('app', 'Are you sure?') . '")', 'class' => 'deleteLink']) ?>
                                    <a href="<?= $relation->file->getLinkUrl() ?>"
                                       class="btn btn-primary btn--medium mb-1 ml-0"
                                       target="_blank"><?= $relation->file->origin_name ?> </a>
                                </span>

                                <? endforeach ?>
                            </div>
                            <label class="file-uplad">
                                + <?= Yii::t('db', 'Add') ?>
                                <?= $form->field($model, 'downloadFiles[]')->fileInput(['multiple' => true, 'accept' => 'application/pdf', 'class' => 'inputfile']); ?>
                            </label>

                            <h2 class="with-label"><?= Yii::t('db', 'Logos') ?></h2>

                            <? foreach ($model->fileRelations as $relation): ?>
                                <? if ($relation->json != 'logo' || !$relation->file) continue ?>
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
                                <?= $form->field($model, 'logosFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'class' => 'inputfile']); ?>
                            </label>

                            <div class="text-right">
                                <button class="btn btn--primary btn--medium" type="submit"
                                        onclick="return formSubmit()">
                                    <?= Yii::t('db', 'Save') ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var saleSwitch = $('#company_is_for_sale');
    saleSwitch.change(function () {
        $('#saleWrapper').toggleClass('hidden');
    });

    function formSubmit () {
        <?if($model->isNewRecord):?>
            return confirm('<?= Yii::t('db','In order to your company be visible for other users Meetfaces Trading, you have to add product or service. Would you like to add product now?')?>');
        <?else:?>
            return true;
        <?endif?>
    }
</script>
