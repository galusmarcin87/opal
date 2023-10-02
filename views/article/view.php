<?php

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \app\models\mgcms\db\Article */
$this->registerLinkTag(['rel' => 'canonical', 'href' => \yii\helpers\Url::canonical()]);
$this->params['breadcrumbs'][] = $model->title;

?>

<section class="service-wrapper company-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href="/"> meetfaces </a>
            <span><?= $model->title ?></span>
        </div>

        <div class="service single-company">
            <div class="flex">
                <div>
                    <h1><?= $model->title ?></h1>
                    <div class="content">
                        <?= $model->content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
