<?php
/* @var $this yii\web\View */


use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1><?= Yii::t('db', 'Ad payment') ?></h1>
                <div><?= MgHelpers::getSetting('ad payment after stripe ' . $type . ' ' . Yii::$app->language, true, 'ad payment after stripe ' . $type) ?></div>
            </div>
        </div>
    </div>
</section>
