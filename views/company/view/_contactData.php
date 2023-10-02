<?php
/* @var $model app\models\mgcms\db\Company */

/* @var $this yii\web\View */

?>

<h3><?= Yii::t('db', 'Contact data') ?></h3>
<div class="single-company__contact flex text-left">
    <div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Country') ?>:</div>
            <strong><?= $model->country ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'City') ?>:</div>
            <strong><?= $model->city ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Street') ?>:</div>
            <strong><?= $model->street ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Postcode') ?>:</div>
            <strong><?= $model->postcode ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'Phone') ?>:</div>
            <strong><?= $model->phone ?></strong>
        </div>
    </div>
    <div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'E-mail') ?>:</div>
            <strong><?= $model->email ?></strong>
        </div>
        <div class="flex">
            <div class="label"><?= Yii::t('db', 'WWW page') ?>:</div>
            <strong><?= $model->www ?></strong>
        </div>
        <div class="flex">
            <div class="label">NIP:</div>
            <strong><?= $model->nip ?></strong>
        </div>
        <div class="flex">
            <div class="label">REGON:</div>
            <strong><?= $model->regon ?></strong></strong>
        </div>
    </div>
</div>
