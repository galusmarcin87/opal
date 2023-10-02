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

<?= $this->render('/common/rate', ['model' => $model]); ?>
<h1 class="text-left"><?=$model->name?></h1>
<div class="hr"></div>
<div class="label"><?= Yii::t('db', 'Address') ?>: <?= $model->city?>, <?= $model->street?>, <?= $model->country?> </div>

