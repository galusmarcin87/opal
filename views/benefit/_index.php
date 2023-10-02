<?
/* @var $model app\models\mgcms\db\Benefit */

use yii\web\View;
use  yii\helpers\StringHelper;

//$model->language = Yii::$app->language;
?>
<a
        href="<?= $model->getLinkUrl() ?>"
        class="company company--service"
>
    <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
        <img
                class="company__logo"
                src="<?= $model->company->thumbnail->getImageSrc(250, 178, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET) ?>"
                alt=""
        />
    <? else: ?>
        <img class="company__logo"
             src="/images/companylogo.jpg"
             alt=""/>
    <? endif; ?>
    <div>
        <div class="company__content">
            <div class="company__name">
                <?= $model->name ?>
            </div>
            <?= StringHelper::truncate(strip_tags($model->description),'180') ?>
        </div>
    </div>
    <div class="company__offer">
        <span> <?= Yii::t('db', 'Price') ?>: </span>
        <div>$<?= $model->price ?></div>
    </div>
</a>
