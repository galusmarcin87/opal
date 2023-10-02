<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->title = $model->name;
//$model->language = Yii::$app->language;

?>

<section class="service-wrapper company-wrapper">
    <div class="container">
        <?= $this->render('view/_breadcrumbs', ['model' => $model]) ?>

        <div class="service single-company">
            <?= $this->render('view/_logo', ['model' => $model]) ?>
            <div class="single-company__content ">
                <?= $this->render('view/_top', ['model' => $model]) ?>
                <?= $this->render('view/_buttons', ['model' => $model]) ?>

            </div>
        </div>
    </div>
</section>


<div class="container">
        <div>
            <div class="agentList row">
                <? foreach ($model->agents as $model): ?>
                    <?= $this->render('/agent/_index', ['model' => $model]) ?>
                <? endforeach ?>
            </div>
        </div>
</div>

