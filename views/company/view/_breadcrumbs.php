<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>

<div class="breadcrumb">
    <a href="/company/index"> <?= Yii::t('db', 'List of companies') ?> </a>
    <span><?= $model->name ?></span>
</div>
