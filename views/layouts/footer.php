<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\ActiveForm;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);
$menu2 = new NobleMenu(['name' => 'footer2_' . Yii::$app->language, 'loginLink' => false]);


?>
<footer class="footer-wrapper">
    <div class="container">

        <img src="/img/logo_meetfaces_white.png" class="footer__Logo" alt=""/>
        <div class="footer">
            <div>
                <?= MgHelpers::getSettingTypeText('footer left column', true, '<p>
              <strong>Meetface S.A.</strong> <br />
			  The Warsaw HUB <br />
              ul. Rondo Daszyńskiego 2B<br />
              00-843 Warszawa<br /><br />
			  Kapitał Spółki 248.353,35 PLN
            </p><br />') ?>

            </div>
            <div>
                <p>
                    <strong><?= MgHelpers::getSettingTypeText('footer header 2 ' . Yii::$app->language, false, 'MEETFACES TRADING') ?></strong><br/>
                    <? foreach ($menu->getItems() as $item): ?>
                        <a href="<?= $item['url'] ?>"><?= $item['label'] ?></a><br/>
                    <? endforeach ?>
                </p>
            </div>
            <div>
                <p>
                    <strong><?= MgHelpers::getSettingTypeText('footer header 3 ' . Yii::$app->language, false, 'WSPARCIE') ?></strong><br/>
                    <? foreach ($menu2->getItems() as $item): ?>
                        <a href="<?= $item['url'] ?>"><?= $item['label'] ?></a><br/>
                    <? endforeach ?>
                </p>
            </div>
            <div>
                <p>
                    <strong><?= MgHelpers::getSettingTypeText('footer header 4 ' . Yii::$app->language, false, 'SKONTAKTUJ SIĘ Z NAMI') ?>
                        ></strong><br/>
                    <? $mail = MgHelpers::getSettingTypeText('footer email', false, 'biuro@meetfacestrading.com') ?>
                    <? $phone = MgHelpers::getSettingTypeText('footer phone', false, '+48502253886') ?>
                    <?= Yii::t('db', 'e-mail') ?>: <a href="mailto:<?= $mail ?>"><?= $mail ?></a><br/>
                    <?= Yii::t('db', 'phone') ?>: <a href="tel:<?= $phone ?>"><?= $phone ?></a><br><br><br><br>
                </p>
                <div class="social-icons">
                    <?
                    $tiktok = MgHelpers::getSettingTypeText('footer tiktok');
                    $facebook = MgHelpers::getSettingTypeText('footer facebook');
                    $linkedin = MgHelpers::getSettingTypeText('footer linkedin');
                    $instagram = MgHelpers::getSettingTypeText('footer instagram');
                    ?>
                    <? if ($tiktok): ?>
                        <a class="social-icons__icon" href="<?= $tiktok ?>">
                            <img src="/svg/tik-tok.svg" alt=""/>
                        </a>
                    <? endif ?>
                    <? if ($facebook): ?>
                        <a class="social-icons__icon" href="<?= $facebook ?>">
                            <img src="/svg/facebook.svg" alt=""/>
                        </a>
                    <? endif ?>
                    <? if ($linkedin): ?>
                        <a class="social-icons__icon" href="<?= $linkedin ?>">
                            <img src="/svg/linkedin.svg" alt=""/>
                        </a>
                    <? endif ?>
                    <? if ($instagram): ?>
                        <a class="social-icons__icon" href="<?= $instagram ?>">
                            <img src="/svg/instagram.svg" alt=""/>
                        </a>
                    <? endif ?>
                </div>
            </div>


        </div>
        <div class="footer__copy">
            <?= MgHelpers::getSettingTypeText('footer copy '.Yii::$app->language,false,'&copy; 2022 Meetface S.A. - Meetfaces Trading Platform. All rights reserved.'); ?>

            <div class="footer__realization"><?= Yii::t('db', 'Realisation') ?>: <a href="https://www.vertesdesign.pl" target="_blank"
                                                            title="projektowanie stron internetowych">Vertes Design</a>
            </div>
        </div>
    </div>
</footer>
