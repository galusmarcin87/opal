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
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme" id="GALLERY">
                        <?php foreach ($model->fileRelations as $relation): ?>
                            <?php if ($relation->json != 'logo' || !$relation->file) continue; ?>
                            <img class="item" src="<?= $relation->file->getImageSrc() ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
