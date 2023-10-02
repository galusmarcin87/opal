<?php
/* @var $model app\models\mgcms\db\Company */

/* @var $this yii\web\View */


if(!$model->is_for_sale){
    return false;
}
?>

<h3><?= Yii::t('db', 'For  sale data') ?></h3>
<div class="single-company__contact flex text-left">
    <div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Title') ?>:</div>
            <strong><?= $model->sale_title ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Description') ?>:</div>
            <strong><?= $model->sale_description ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Price') ?>:</div>
            <strong><?= $model->sale_price ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Currency') ?>:</div>
            <strong><?= $model->sale_currency ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Price includes') ?>:</div>
            <strong><?= $model->sale_price_includes ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Sale reason') ?>:</div>
            <strong><?= $model->sale_reason ?></strong>
        </div>
    </div>
    <div>

        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Business range') ?>:</div>
            <strong><?= $model->sale_business_range ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Workers number') ?>:</div>
            <strong><?= $model->sale_workers_number ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Sale range') ?>:</div>
            <strong><?= $model->sale_sale_range ?></strong></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Sale last year income') ?>:</div>
            <strong><?= $model->sale_last_year_income ?></strong></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Company profile') ?>:</div>
            <strong><?= $model->sale_company_profile ?></strong></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Form of business') ?>:</div>
            <strong><?= $model->sale_form_of_business ?></strong></strong>
        </div>
    </div>
</div>
