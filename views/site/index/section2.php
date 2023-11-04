<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;


?>
<div class="cta-invest">
    <div class="container">
        <div class="bg-green-left">
            <div class="bg-green-left-content">
                <div class="row align-items-center">
                    <div class="col-md-4 col-lg-5">
                        <img src="<?= MgHelpers::getSetting('Home section 2 - image',false,'/images/invest.svg')?>" alt="" class="img-fluid cta-invest-image">
                    </div>
                    <div class="col-md-7 col-lg-6">

                        <h2><?= MgHelpers::getSettingTypeText('Home section 2 - title 1 ' . Yii::$app->language, false, 'Chcesz zacząć inwestować?') ?></h2>
                        <?= MgHelpers::getSettingTypeText('Home section 1 - text 1 ' . Yii::$app->language, true,'
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>')?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
