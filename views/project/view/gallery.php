<?php

/* @var $model app\models\mgcms\db\Project */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;

?>

<div class="Project__info">
    <? if ($model->file && $model->file->isImage()): ?>
        <div class="Project__gallery__photo">
            <img
                    src="<?= $model->file->getImageSrc(685, 424) ?>?>"
                    class="Project__photo"
            />
            <a href="<?= $model->file->getImageSrc() ?>" class="zoom"></a>
        </div>
    <? endif ?>
    <div class="Project__slider">
        <div class="owl-carousel Gallery__wrapper">
            <? foreach ($model->files as $file): ?>
                <? if ($file->isImage()): ?>
                    <div class="col-sm-4">
                        <a
                                href="<?= $file->getImageSrc() ?>"
                                style="
                                        background-image: url(<?= $file->getImageSrc(200, 140) ?>);
                                        "
                                class="item"
                        ></a>
                    </div>
                <? endif; ?>
            <? endforeach; ?>

        </div>
    </div>
</div>
