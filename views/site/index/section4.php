<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;


?>


<section class="Section">
    <div class="container">
        <h1><?= MgHelpers::getSettingTypeText('Home section 4 - title 1 ' . Yii::$app->language) ?></h1>
        <div class="section-with-long-bg">
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= MgHelpers::getSetting('Home section 4 image', false, '/images/img2.jpg') ?>" alt=""/>
                </div>
                <div class="col-lg-8">
                    <div class="uppercase-header"><h4><?= MgHelpers::getSettingTypeText('Home section 4 - subtitle 1 ' . Yii::$app->language) ?><h4></div><br>
                    <?= MgHelpers::getSettingTypeText('Home section 4 - text 1 ' . Yii::$app->language, true, '<p>Home section 4 - text 1</p>') ?><br><br>
                    <?= MgHelpers::getSettingTypeText('Home section 4 - text 2 ' . Yii::$app->language, true, '<p>Home section 4 - text 2</p>') ?>
					<?= MgHelpers::getSettingTypeText('Home section 4 - text 3 ' . Yii::$app->language, true, '<p>Home section 4 - text 3</p>') ?>
                </div>
            </div>
        </div>
    </div>
</section>
