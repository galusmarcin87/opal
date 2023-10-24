<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;


?>

<div class="home-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="section-title">
                    <?= MgHelpers::getSettingTypeText('Home section 1 - title 1 ' . Yii::$app->language, false, 'O nas') ?>
                </h1>

                <?= MgHelpers::getSettingTypeText('Home section 1 - text 1 ' . Yii::$app->language, true,
                    '<p class="lead">
                    opalcrowd.com to innowacyjna <br />i przyjazna użytkownikowi platforma
                    crowdfundingu udziałowego.
                  </p>
                  <p>
                    Oferuje ona prosty sposób na inwestowanie w dynamicznie rozwijające się spółki z różnych gałęzi gospodarki.
                  </p>
                  <p>
            
                    Z platformy może skorzystać każda pełnoletnia osoba, która chce zainwestować nawet niewielką ilość pieniędzy.
                  </p>') ?>
                <div class="mt-5">
                    <a href="<?= MgHelpers::getSettingTypeText('Home section 1 - link 1 url' . Yii::$app->language, false, '/o-nas') ?>" class="btn btn-primary">
                        <?= MgHelpers::getSettingTypeText('Home section 1 - link 1 label' . Yii::$app->language, false, 'Dowiedz się więcej') ?>
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <img src="<?= MgHelpers::getSetting('Home section 1 - image',false,'/images/o-nas.svg')?>" alt="O nas" class="img-fluid">
            </div>
        </div>
    </div>
</div>
