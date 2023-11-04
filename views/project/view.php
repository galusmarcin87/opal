<?php
/* @var $model app\models\mgcms\db\Project */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use  \app\models\mgcms\db\Project;


$this->title = $model->name;
$model->language = Yii::$app->language;
if (!$model->money_full) {
    return false;
}
$index = 0;
?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Project">
    <div class="container">
        <h1 class="text-center"><?= $model->name ?></h1>
        <div class="Project__content <?= str_replace(' ', '_', $model->type) ?>">

            <? if ($model->type == Project::TYPE_BUSINESS_OWNER): ?>
                <?= $this->render('view/gallery', ['model' => $model]) ?>
            <? endif; ?>
            <div class="Project__info__content">

                <a class="btn btn-secondary w-100 btn-square"
                   href="<?= Url::to(['project/buy', 'id' => $model->id]) ?>"><?= Yii::t('db', $model->type == Project::TYPE_BUSINESS_OWNER ? 'BUY' : 'INVEST') ?></a>


                <div class="mb-3">
                    <h6 style="margin-bottom: 20px"><?= Yii::t('db', 'Files to download') ?></h6>
                    <? foreach ($model->fileRelations as $fileRelation): ?>
                        <? if ($fileRelation->json != '1' || !$fileRelation->file) continue ?>
                        <a class="Project__file" href="<?= $fileRelation->file->linkUrl ?>" target="_blank">

                            <div class="Project__file__ico">
                                <img src="/svg/pdf.svg" alt=""/>
                            </div>
                            <?= $fileRelation->file->origin_name ?>
                        </a>
                    <? endforeach; ?>
                </div>


                <? if ($model->type == Project::TYPE_BUSINESS_PROFIT && $model->money_full): ?>
                    <?= $this->render('_counterMoney', ['model' => $model]) ?>
                <? endif; ?>

            </div>
            <div class="Project__text">
                <?= $model->text ?>
            </div>
        </div>

    </div>
</section>
