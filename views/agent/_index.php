<?
/* @var $model app\models\mgcms\db\Agent */

use yii\web\View;
//$model->language = Yii::$app->language;
$user = $model->user;
//$user->language = Yii::$app->language;
?>
<a
        href="<?= $model->getLinkUrl() ?>"
        class="agent col-md-4"
>
    <? if ($user->file && $user->file->isImage()): ?>
        <img
                class="agentImage"
                src="<?= $user->file->getImageSrc(290, 194, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET) ?>"
                alt=""
        />
    <? endif; ?>

    <div class="agentName">
        <?= $user->first_name ?> <?= $user->last_name ?>
    </div>

</a>
