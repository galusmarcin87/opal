<?php

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \app\models\mgcms\db\Article */
$this->registerLinkTag(['rel' => 'canonical', 'href' => \yii\helpers\Url::canonical()]);
$this->params['breadcrumbs'][] = [\yii\helpers\Url::to('/article/index'), Yii::t('db', 'News')];

?>

<?= $this->render('/common/breadcrumps') ?>


<div class="post-single">

    <div class="post-single-content">

        <div class="container">


            <div class="post-single-date">
                <?= $model->created_on ?>
            </div>

            <?= $model->content ?>
        </div>

    </div>


</div>
