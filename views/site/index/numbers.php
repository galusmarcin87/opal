<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use \app\models\mgcms\db\Company;
use app\models\mgcms\db\Product;
use app\models\mgcms\db\Service;
use app\models\mgcms\db\Job;
use yii\helpers\Url;

if ($this->beginCache('hpNumbers'    . Yii::$app->language)) {
?>

    <section class="numbers-wrapper">
        <div class="container">
            <div class="numbers">
                <a href="<?= Url::to('company/index')?>" class="numbers__item">
                    <?= Company::find()->andWhere(['status' => Company::STATUS_CONFIRMED])->count()?>
                    <small><?= Yii::t('db', 'Companies number')?></small>
                </a>
                <a href="<?= Url::to(['company/index', 'is_for_sale' => 1])?>" class="numbers__item">
                    <?= Company::find()->andWhere(['status' => Company::STATUS_CONFIRMED,'is_for_sale' => 1])->count()?>
                    <small><?= Yii::t('db', 'Companies for sale number') ?></small>
                </a>
				<a href="<?= Url::to('/company/index?isInstitution=1')?>" class="numbers__item">
                    <?= Product::find()->count()?>
                    <small><?= Yii::t('db', 'Institution') ?></small>
                </a>
                <a href="<?= Url::to('product/index')?>" class="numbers__item">
                    <?= Product::find()->count()?>
                    <small><?= Yii::t('db', 'Products number') ?></small>
                </a>
                <a href="<?= Url::to('service/index')?>" class="numbers__item">
                    <?= Service::find()->count()?>
                    <small><?= Yii::t('db', 'Services number') ?></small>
                </a>
                <a href="<?= Url::to('job/index')?>" class="numbers__item">
                    <?= Job::find()->count()?>
                    <small><?= Yii::t('db', 'Job offers number') ?></small>
                </a>
            </div>
            <div class="text-center hidden">
                <a href="" class="btn btn--primary"> Sprawdź najnowszą inwestycje </a>
            </div>
        </div>
    </section>
    <?php  $this->endCache();} ?>
