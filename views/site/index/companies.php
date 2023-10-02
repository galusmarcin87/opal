<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use app\models\mgcms\db\Company;

$companies = Company::find()->limit(19)->andWhere(['status' => Company::STATUS_CONFIRMED])->orderBy(['is_promoted' => SORT_DESC,'created_on' => SORT_DESC])->all();

?>
<section class="companies-wrapper">
    <div class="container">
        <h1><?= Yii::t('db', 'Companies') ?></h1>
        <div class="companies">
            <?foreach($companies as $company):?>
                <a href="<?=$company->linkUrl?>" class="company <?= $company->is_promoted ? 'company--highlighted': ''?>">
                    <?if($company->thumbnail && $company->thumbnail->isImage()):?>
                        <img class="company__logo" src="<?=$company->thumbnail->getImageSrc(0, 70)?>" alt="" />
                    <?endif;?>
                    <div>
                        <div class="company__name"><?=$company->name?></div>
                        <div class="company__industry">
                            <div class="badge"><?=Yii::t('db',$company->category->name) ?></div>
                        </div>
                    </div>
                </a>

            <?endforeach;?>

        </div>
        <div class="text-center">
            <a href="<?= \yii\helpers\Url::to('company/index')?>" class="btn btn--primary"> <?= Yii::t('db', 'Show all') ?> </a>
        </div>
    </div>
</section>
