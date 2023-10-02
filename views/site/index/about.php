<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
$list = MgHelpers::getSettingOptionArray('home about list '. Yii::$app->language);

?>


<section class="about-wrapper">
    <div class="container">
        <h1><?= MgHelpers::getSetting('home about header ' . Yii::$app->language,false,'home about header')?></h1>
        <div class="about">
            <div class="about__content">
                <div>
                    <h2>
                        <?= MgHelpers::getSetting('home about header 2 ' . Yii::$app->language,false,'home about header')?>
                    </h2>
                    <ul class="about__list">
                        <?foreach($list as $listItem):?>
                            <li class="about__list__item">
                                <?= $listItem ?>
                            </li>
                        <?endforeach;?>

                    </ul>
                </div>
                <div class="about__image">
                    <div>
                        <img src="<?= MgHelpers::getSetting('home about image ' . Yii::$app->language,false,'/img/Depositphotos_307530416_xl-2015.jpg')?>" />
                        <a
                                class="about__video-icon popup-video"
                                href="<?= MgHelpers::getSetting('home about yt url ' . Yii::$app->language,false,'http://www.youtube.com/watch?v=0O2aH4XLbto')?>"
                        >
                            <img src="/svg/play.svg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
