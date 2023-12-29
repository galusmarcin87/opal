<?

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $model Project */
/* @var $this yii\web\View */
$model->language = Yii::$app->language;
?>


<a class="card card-campaign mb-3" href="<?= $model->getLinkUrl()?>">
    <div class="card-main-image img-rounded-right-top">
        <? if ($model->file && $model->file->isImage()): ?>
            <img src="<?= $model->file->getImageSrc(1200, 800); ?>" class="card-img-top" alt="<?= $model->name ?>"/>
        <? endif; ?>

        <div class="card-main-image-overlay">
            <span><?= Yii::t('db', 'See more') ?></span>
        </div>
        <div class="card-main-image-flags">
            <strong><?= count($model->payments) ?></strong> <?= Yii::t('db', 'investitions') ?>
        </div>
        <div class="card-main-image-like">
            <svg class="icon">
                <use xlink:href="#like<?= $model->isFavourite ? '' : '-outline' ?>"/>
            </svg>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title card-title--campaign">
            <?= $model->name ?>
        </h5>

        <?= $model->lead ?>

        <?= $this->render('_counterMoney', ['model' => $model]) ?>

        <?= $this->render('_counterTimer', ['model' => $model]) ?>

    </div>
</a>
