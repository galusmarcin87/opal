<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

$logos = [];

foreach ($model->fileRelations as $relation){
    if ($relation->json == 'logo'){
        $logos[] = $relation;
    }
}
use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>
<div class="buttons-wrapper">
    <a href="<?=$model->getLinkUrl('info')?>" class="btn <?= $model->viewType == 'info' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
    ><?= Yii::t('db', 'Information') ?></a
    >
    <?if(count($model->products) > 0):?>
        <a href="<?=$model->getLinkUrl('products')?>" class="btn <?= $model->viewType == 'products' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Products') ?></a
        >
    <?endif;?>

    <?if(count($model->services) > 0):?>
        <a href="<?=$model->getLinkUrl('services')?>" class="btn <?= $model->viewType == 'services' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Services') ?></a
        >
    <?endif;?>

    <?if(count($model->agents) > 0):?>
        <a href="<?=$model->getLinkUrl('agents')?>" class="btn <?= $model->viewType == 'agents' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Agents') ?></a
        >
    <?endif;?>

    <?if(count($model->jobs) > 0):?>
        <a
                href="<?=$model->getLinkUrl('jobs')?>"
                class="btn <?= $model->viewType == 'jobs' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Job offers') ?></a
        >
    <?endif;?>

    <?if(count($model->benefits) > 0):?>
        <a href="<?=$model->getLinkUrl('benefits')?>" class="btn <?= $model->viewType == 'benefits' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Benefits') ?></a
        >
    <?endif;?>

    <?if(count($model->institutionCompanies) > 0):?>
        <a href="<?=$model->getLinkUrl('institutionCompanies')?>" class="btn <?= $model->viewType == 'institutionCompanies' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Institution Companies') ?></a
        >
    <?endif;?>

    <?if($model->looking_for):?>
        <a href="<?=$model->getLinkUrl('lookingFor')?>" class="btn <?= $model->viewType == 'lookingFor' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Looking for') ?></a
        >
    <?endif;?>

    <?if(count($logos) > 0):?>
        <a href="<?=$model->getLinkUrl('logos')?>" class="btn <?= $model->viewType == 'logos' ? 'btn--primary' : 'btn--secondary' ?> btn--small"
        ><?= Yii::t('db', 'Logos') ?></a
        >
    <?endif;?>
</div>
