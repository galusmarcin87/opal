<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$slider = \app\models\mgcms\db\Slider::find()->where(['name' => 'main', 'language' => Yii::$app->language])->one();
if (!$slider) {
    return false;
}


?>

<section class="main-slider-wrapper">
    <div class="container">
        <div id="MAIN-SLIDER" class="owl-carousel owl-theme">
            <? foreach ($slider->slides as $index => $slide): ?>
                <div class="main-slider item">
                    <div class="main-slider__content">
                        <h1>
                            <?= $slide->body?>
                        </h1>
                        <div class="block-icons">
                            <a href="<?= MgHelpers::getSetting('slider 1 link',false, '/site/information-for-investors')?>">
                                <div class="block-icons__block">
                                    <img
                                            src="<?= MgHelpers::getSetting('slider 1 image',false, '/svg/inwestor.svg')?>"
                                            class="block-icons__icon"
                                            alt=""
                                    />
                                    <?= MgHelpers::getSetting('slider 1 text ' . Yii::$app->language,false, 'Invest <br />in MFT')?>
                                </div>
                            </a>
                            <a href="<?= MgHelpers::getSetting('slider 2 link',false, '/product/index?specialOffer=1')?>">
                                <div class="block-icons__block">
                                    <img
                                            src="<?= MgHelpers::getSetting('slider 2 image',false, '/svg/promocje.svg')?>"
                                            class="block-icons__icon"
                                            alt=""
                                    />
                                    <?= MgHelpers::getSetting('slider 2 text '. Yii::$app->language,false, 'Products <br /> on sale')?>

                                </div>
                            </a>
                            <a href="<?= MgHelpers::getSetting('slider 3 link',false, '/company/index?isBenefit=1')?>">
                                <div class="block-icons__block">
                                    <img
                                            src="<?= MgHelpers::getSetting('slider 3 image',false, '/svg/benefity.svg')?>"
                                            class="block-icons__icon"
                                            alt=""
                                    />
                                    <?= MgHelpers::getSetting('slider 3 text '. Yii::$app->language,false, 'Benefis')?>

                                </div>
                            </a>
                            <a href="<?= MgHelpers::getSetting('slider 4 link',false, '/site/become-consultant')?>">
                                <div class="block-icons__block">
                                    <img
                                            src="<?= MgHelpers::getSetting('slider 4 image',false, '/svg/konsultant.svg')?>"
                                            class="block-icons__icon"
                                            alt=""
                                    />
                                    <?= MgHelpers::getSetting('slider 4 text '. Yii::$app->language,false, 'Partner <br /> Program')?>

                                </div>
                            </a>

                        </div>
                        <a href="<?= MgHelpers::getSetting('slider bottom link',false, '/art/wiecej-o-mft')?>" class="btn btn--primary">
                            <?= MgHelpers::getSetting('slider bottom link text ' . Yii::$app->language,false, 'About Meetfaces Trading')?>
                        </a>
                    </div>
                    <div class="main-slider__images">
                        <a href="<?= $slide->link?>" target="_blank"><img src="<?= MgHelpers::getSetting('slider right first image',false, '/img/slider-nowy2.jpg')?>" alt="" /></a>
                        <? if ($slide->file && $slide->file->isImage()): ?><img src="<?= $slide->file->getImageSrc() ?>"/><? endif ?>
					</div>
               </div>
            <? endforeach ?>

        </div>
    </div>
</section>
