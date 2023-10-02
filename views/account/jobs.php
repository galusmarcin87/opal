<?php
/* @var $this yii\web\View */

/* @var $models \app\models\mgcms\db\Service[] */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="search-results search-results--dashboard">
            <?= $this->render('_leftMenu') ?>
            <div>
                <div class="dashboard-wrapper">
                    <h1 class="text-left"><?= Yii::t('db', 'Job offers') ?></h1>
                    <div class="flex">
                        <div>
                            <div class="search-wrapper search-wrapper--small hidden">
                                <form action="./wyniki-wyszukiwania.html">
                                    <input type="text" placeholder="Szukaj" class="search"/>
                                    <img
                                            class="search-wrapper__icon"
                                            src="/svg/lupa.svg"
                                            alt=""
                                    />
                                </form>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="btn btn--secondary"
                               href="<?= Url::to('/account/add-job') ?>">+ <?= Yii::t('db', 'Add') ?></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="person-list person-list-header">
                            <div class="text-left"><?= Yii::t('db', 'Photo') ?></div>
                            <div class="text-left sort">
                                <?= Yii::t('db', 'Name') ?>
                            </div>
                            <div><?= Yii::t('db', 'Edit') ?></div>
                            <div><?= Yii::t('db', 'Delete') ?></div>
                            <div><?= Yii::t('db', 'See') ?></div>
                        </div>

                        <? foreach ($models as $model): ?>
                            <?= $this->render('_listItem', [
                                'imageSrc' => $model->file && $model->file->isImage() ? $model->file->getImageSrc(70, 0) : false,
                                'name' => $model->name,
                                'id' => $model->id,
                                'type' => 'job',
                                'linkUrl' => $model->linkUrl


                            ]) ?>
                        <? endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
