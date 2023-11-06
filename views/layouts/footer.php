<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\ActiveForm;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);

$facebook = MgHelpers::getSettingTypeText('footer facebook');
$linkedin = MgHelpers::getSettingTypeText('footer linkedin');
$instagram = MgHelpers::getSettingTypeText('footer instagram');

?>

<footer class="site-footer">
    <div class="site-footer-content">
        <div class="container">
            <div class="footer-widgets">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="/images/logo-white.png" class="footer-logo" width="275" alt="">

                        <?= MgHelpers::getSetting('footer text ' . Yii::$app->language, true, '<p>
                            Opalcrowd Spółka z Ograniczoną Odpowiedzialnością<br />
                            Siedziba: ul. Żurawia 6/12 lok. 321<br />
                            00-503 Warszawa
                        </p>') ?>


                        <ul class="nav nav-social">

                            <? if ($facebook): ?>
                                <li class="nav-item">
                                    <a href="<?= $facebook ?>" target="_blank" class="nav-link">
                                        <svg class="icon">
                                            <use xlink:href="#facebook"/>
                                        </svg>
                                    </a>
                                </li>
                            <? endif; ?>

                            <? if ($instagram): ?>
                                <li class="nav-item">
                                    <a href="<?= $instagram ?>" target="_blank" class="nav-link">
                                        <svg class="icon">
                                            <use xlink:href="#instagram"/>
                                        </svg>
                                    </a>
                                </li>
                            <? endif; ?>
                            <? if ($linkedin): ?>
                                <li class="nav-item">
                                    <a href="<?= $linkedin ?>" target="_blank" class="nav-link">
                                        <svg class="icon">
                                            <use xlink:href="#linkedin"/>
                                        </svg>
                                    </a>
                                </li>
                            <? endif; ?>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-xl-7 ms-auto">
                        <ul class="nav footer-nav">

                            <? foreach ($menu->getItems() as $item): ?>
                                <li class="nav-item">
                                    <a href="<?= $item['url'] ?>" class="nav-link"><?= $item['label'] ?></a>
                                </li>
                            <? endforeach ?>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="site-info">
                <div class="row">
                    <div class="col-12">
                        <?= MgHelpers::getSetting('footer copyright ' . Yii::$app->language, true, '&copy; 2023 OpalCrowd | Realizacja platformy www: <a href="https://vertesdesign.pl/">Vertes Design</a>') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
