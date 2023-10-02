<?
/* @var $model app\models\mgcms\db\Service */

use yii\web\View;

//$model->language = Yii::$app->language;
$imagesCount = 0;
?>
<section class="service-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href=""> <?= $model->company->category ?> </a>
            <span><?= $model->name ?></span>
        </div>
        <div class="service">
            <div class="training">
                <div>

                    <div id="SERVICE_SLIDER" class="owl-carousel owl-theme">
                        <? foreach ($model->fileRelations as $relation): ?>

                            <? if ($relation->json == '1' || !$relation->file || !$relation->file->isImage()) continue ?>
                            <? $imagesCount++; ?>
                            <div class="item">
                                <img src="<?= $relation->file->getImageSrc(685) ?>" alt=""/>
                                <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
                                    <img src="<?= $model->company->thumbnail->getImageSrc(200, 0) ?>"
                                         class="training__logo"/>
                                <? endif; ?>
                            </div>
                        <? endforeach ?>

                        <? if ($imagesCount == 0): ?>
                            <div class="item">
                                <img src="/images/companypic.jpg" alt=""/>
                            </div>
                        <? endif ?>
                    </div>
                </div>
                <div>
                    <div class="training__badge"><?= Yii::t('db', 'SERVICE') ?></div>
                    <?= $this->render('/common/rate', ['model' => $model]); ?>
                    <h1><?= $model->name ?></h1>
                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Category') ?>:</div>


                    <? foreach (array_reverse($model->company->category->getCategoryTree()) as $category): ?>
                        <a href="<?= \yii\helpers\Url::to(['service/index', 'category' => $category->id]) ?>"> <?= Yii::t('db', (string)$category) ?></a>
                    <? endforeach ?>

                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Seller') ?>:</div>
                    <?= $model->company ?>
                    <div class="hr"></div>
                    <div class="training__prices">
                        <div>
                            <div class="label"><?= Yii::t('db', 'Price') ?>:</div>
                            <?= $model->price ?> / szt
                            <div>
                                <a class="btn btn--primary" href="<?= \yii\helpers\Url::to(['account/buy', 'hash' => \app\components\mgcms\MgHelpers::encrypt(serialize(['type' => 'Service', 'id' => $model->id]))]) ?>"><?= Yii::t('db', 'Pay') ?></a>
                            </div>
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena:</div>
                            - $
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena NFT:</div>
                            <a href="">zapłać tokenami NFT</a>
                            <div class="hr"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service__content">
                <? if ($model->company->agents): ?>
                    <? foreach ($model->company->agents as $agent):
                        if (!$agent->user) {
                            continue;
                        } ?>
                        <div class="contact-box">
                            <div class="person person--big">
                                <div>
                                    <img
                                            class="person__avatar person__avatar--small"
                                            src="<?= $agent->user->file && $agent->user->file->isImage() ? $agent->user->file->getImageSrc(70, 70) : '/img/person.png' ?>"
                                            alt=""
                                    />
                                </div>
                                <div>
                                    <div class="person__role person__role--normal">
                                        <?= Yii::t('db', 'Contact agent') ?>
                                    </div>
                                    <?= $agent->user ?>
                                </div>
                            </div>
                            <a href="tel:<?= $agent->user->phone ?>"
                               class="btn btn--primary"><?= $agent->user->phone ?></a>
                            <a href="mailto:<?= $agent->user->email ? $agent->user->email : $agent->user->username ?>"
                               class="btn btn--primary"
                            ><?= $agent->user->email ? $agent->user->email : $agent->user->username ?></a
                            >
                        </div>
                    <? endforeach ?>
                <? endif ?>

                <h3><?= Yii::t('db', 'Service description') ?></h3>
                <div class="description">
                    <?= $model->description ?>
                </div><br><br>
                <?php if (!empty($model->specification)): ?>
    <h3><?= Yii::t('db', 'Specification') ?></h3>
    <div class="description">
        <?= $model->specification ?>
    </div><br><br>
<?php endif; ?>

                <div class="flex">
                    <? if (count($model->fileRelations)): ?>
                        <?php $mediaExist = false; ?>

<?php if (!empty($model->fileRelations)): ?>
    <?php foreach ($model->fileRelations as $relation): ?>
        <?php if ($relation->json != '1' || !$relation->file || empty($relation->file->origin_name)) continue; ?>
        <?php $mediaExist = true; ?>
        <a href="<?= $relation->file->getLinkUrl() ?>" class="btn btn--primary btn--small">
            <?= $relation->file->origin_name ?>
        </a>
    <?php endforeach; ?>
<?php endif; ?>

<?php if ($mediaExist): ?>
    <div>
        <h3><?= Yii::t('db', 'Multimedia') ?></h3>
    </div>
    <br><br>
<?php endif; ?>

                    <? endif ?>
                    <?= $this->render('/common/_socialShare', [
                        'title' => $model->name,
                        'description' => $model->description,
                        'image' => $model->company->thumbnail && $model->company->thumbnail->isImage() ? $model->company->thumbnail->getImageSrc(240, 0) : false,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</section>
