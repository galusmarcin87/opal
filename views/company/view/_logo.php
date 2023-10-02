<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>


<div class="badge-corner"><?= Yii::t('db', 'Company') ?></div>
<div class="relative">
    <? if ($model->background && $model->background->isImage()): ?>
        <img
                class="single-company__image"
                src="<?= $model->background->getImageSrc() ?>"
                alt=""
        />
    <? else: ?>
        <img class="single-company__image"
             src="/images/companybg.jpeg"
             alt=""/>
    <? endif; ?>
    <? if ($model->thumbnail && $model->thumbnail->isImage()): ?>
        <img src="<?= $model->thumbnail->getImageSrc(240, 0) ?>" class="training__logo"/>
    <? else: ?>
        <img class="training__logo"
             src="/images/companylogo.jpg"
             alt=""/>
    <? endif; ?>
</div>
