<?php
/* @var $this yii\web\View */


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$this->title = Yii::t('db', 'Invest');


?>


<div class="text-page">
    <div class="container">
        <div class="text-page-intro">
            <div class="row">
                <div class="col-lg-6">

                    <?= $this->render('/common/breadcrumps') ?>


                    <p class="fs-4">
                        <strong class="fs-3 fw-semibold">
                            <?= MgHelpers::getSettingTypeText('invest header ' . Yii::$app->language, false, 'Zostań współwłaścicielem dynamicznie rozwijających się spółek i zdobądź szansę na zarabianie dzięki ich wzroście!') ?>

                        </strong>
                    </p>
                    <p>
                        <?= MgHelpers::getSettingTypeText('invest text ' . Yii::$app->language, false,
                            'OpalCrowd.com to innowacyjna i przyjazna użytkownikowi platforma crowdfundingu udziałowego.
                        Oferuje ona prosty sposób na inwestowanie w dynamicznie rozwijające się spółki z różnych gałęzi
                        gospodarki światowej. Z platformy może skorzystać każda pełnoletnia osoba, która chce
                        zainwestować nawet niewielką ilość pieniędzy.') ?>

                    </p>

                </div>

                <div class="col-lg-6">
                    <img src="/images/opal6.svg" alt="Zainwestuj0" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container py-4">


            <div class="invest-steps">

                <a href="#" class="invest-step">
                    <div class="invest-step-inner">
                        <div class="number">1</div>
                        <div class="step-top">
                            <h2>
                                <?= MgHelpers::getSettingTypeText('invest number 1 header ' . Yii::$app->language, false, 'Wybierz startup') ?>
                            </h2>
                        </div>
                        <div class="step-middle">
                            <?= MgHelpers::getSettingTypeText('invest number 1 header ' . Yii::$app->language, false, ' Zostań wspólnikiem dynamicznie rozwijających się spółek w procesie ich rozwoju. <br><br>Zapoznaj
                            się z najnowszymi emisjami.') ?>

                        </div>
                        <div class="step-bottom">
                            <svg class="icon icon-long-arrow">
                                <use xlink:href="#long-right-arrow"/>
                            </svg>
                        </div>
                    </div>

                </a>

                <a href="#" class="invest-step">
                    <div class="invest-step-inner">
                        <div class="number">2</div>
                        <div class="step-top">
                            <h2>
                                <?= MgHelpers::getSettingTypeText('invest number 2 header ' . Yii::$app->language, false, 'Zainwestuj') ?>

                            </h2>
                        </div>
                        <div class="step-middle">
                            <?= MgHelpers::getSettingTypeText('invest number 2 header ' . Yii::$app->language, false, 'Zakup udziały w wybranej spółki nie wychodząc z domu! Skorzystaj z kilku możliwości
                            operatorów płatności') ?>

                        </div>
                        <div class="step-bottom">
                            <svg class="icon icon-long-arrow">
                                <use xlink:href="#long-right-arrow"/>
                            </svg>
                        </div>
                    </div>

                </a>

                <a href="#" class="invest-step">
                    <div class="invest-step-inner">
                        <div class="number">3</div>
                        <div class="step-top">
                            <h2>
                                <?= MgHelpers::getSettingTypeText('invest number 3 header ' . Yii::$app->language, false, 'Zarabiaj') ?>

                            </h2>
                        </div>
                        <div class="step-middle">
                            <?= MgHelpers::getSettingTypeText('invest number 3 header ' . Yii::$app->language, false, 'Zarabiaj na wzroście spółki w procesie jej rozwoju.') ?>

                        </div>
                        <div class="step-bottom">
                            <svg class="icon icon-long-arrow">
                                <use xlink:href="#long-right-arrow"/>
                            </svg>
                        </div>
                    </div>

                </a>

                <a href="#" class="invest-step">
                    <div class="invest-step-inner">
                        <div class="number">4</div>
                        <div class="step-top">
                            <h2>
                                <?= MgHelpers::getSettingTypeText('invest number 4 header ' . Yii::$app->language, false, 'Zapoznaj się z ryzykiem') ?>

                            </h2>
                        </div>
                        <div class="step-middle">
                            <?= MgHelpers::getSettingTypeText('invest number 4 header ' . Yii::$app->language, false, 'Przed zainwestowaniem w wybraną emisję, zapoznaj się z ryzykiem.') ?>

                        </div>
                        <div class="step-bottom">
                            <svg class="icon icon-long-arrow">
                                <use xlink:href="#long-right-arrow"/>
                            </svg>
                        </div>
                    </div>

                </a>

            </div>
        </div>

        <div class="block-media block-media--reverse">
            <div class="block-media-text">

                <div class="row">
                    <div class="col-lg-10 me-auto">


                        <a class="cta cta--style1" href="<?=\yii\helpers\Url::to('/project/index') ?>">
                <span class="cta-large">
                <?= Yii::t('db', 'Are you ready to start?') ?>
                </span>
                            <span class="cta-small">
               <?= Yii::t('db', 'See what campaigns <br/> we have prepared for you!') ?>
                </span>
                            <svg class="icon icon-long-arrow">
                                <use xlink:href="#long-right-arrow"/>
                            </svg>
                        </a>


                    </div>
                </div>

            </div>
            <div class="block-media-image">
                <img src="/images/opal5.svg" alt="" class="block-media-img">
            </div>
        </div>


    </div>
</div>
