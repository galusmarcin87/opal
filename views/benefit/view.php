<?
/* @var $model app\models\mgcms\db\Benefit */
/* @var $this yii\web\View */

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
                    <div class="training__badge"><?= Yii::t('db', 'BENEFIT') ?></div>
                    <div class="rating hidden">
                        Oceń:
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i
                                class="fa fa-star rating__star rating__star--active"
                                aria-hidden="true"
                        ></i>
                        <i class="fa fa-star rating__star" aria-hidden="true"></i>
                        <span class="rating__rate">(6,0)</span>
                    </div>
                    <h1><?= $model->name ?></h1>

                    <div class="hr"></div>
                    <div class="label"><?= Yii::t('db', 'Seller') ?>:</div>
                    <?= $model->company ?>
                    <div class="hr"></div>
                    <div class="training__prices">
                        <div>
                            <div class="label"><?= Yii::t('db', 'Price') ?> USD:</div>
                            <?= $model->price ?> $ / szt
                            <div class="hr"></div>
                        </div>
                        <div class="hidden">
                            <div class="label">Cena USD:</div>
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


                <h3><?= Yii::t('db', 'Description') ?></h3>
                <div class="description">
                    <?= $model->description ?>
                </div>
                <div class="flex">
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
