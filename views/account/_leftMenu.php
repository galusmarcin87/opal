<?php
/* @var $this yii\web\View */

/* @var $myCompany \app\models\mgcms\db\Company */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;

$request = $this->context->request;
?>

<div class="menu-vertical menu-vertical--closed">
    <div class="menu-vertical__toggle">
        <i class="fa fa-times" aria-hidden="true"></i>
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="menu-vertical__category <? if (!in_array($request->getPathInfo(), ['account/index', 'account/edit-company'])): ?>menu-vertical__category--collapsed<? endif ?>">

        <div class="menu-vertical__item <? if (in_array($request->getPathInfo(), ['account/index', 'account/edit-company'])): ?>menu-vertical__item--active<? endif ?>">
            <?= Yii::t('db', 'Company') ?>
        </div>
        <a
                href="<?= Url::to('/account/index') ?>"
                class="menu-vertical__item <? if ($request->getPathInfo() == 'account/index'): ?>menu-vertical__item--active<? endif; ?>"
        >
            <?= Yii::t('db', 'Dashboard') ?>
        </a>
        <a href="<?= Url::to('/account/edit-company') ?>"
           class="menu-vertical__item <? if ($request->getPathInfo() == 'account/edit-company'): ?>menu-vertical__item--active<? endif; ?>">
            <?= Yii::t('db', 'Edit company') ?>
        </a>
    </div>

    <div class="menu-vertical__category <? if (!in_array($request->getPathInfo(), ['account/agents', 'account/agent-edit', 'account/add-agent'])): ?>menu-vertical__category--collapsed<? endif ?>">
        <div class="menu-vertical__item <? if (in_array($request->getPathInfo(), ['account/agents', 'account/agent-edit', 'account/add-agent'])): ?>menu-vertical__item--active<? endif ?>">
            <?= Yii::t('db', 'Agents') ?>
        </div>
        <a
                href="<?= Url::to('/account/agents') ?>"
                class="menu-vertical__item <? if ($request->getPathInfo() == 'account/agents'): ?>menu-vertical__item--active<? endif; ?>"
        >
            <?= Yii::t('db', 'Agents') ?>
        </a>
        <a href="<?= Url::to('/account/add-agent') ?>"
           class="menu-vertical__item <? if ($request->getPathInfo() == 'account/add-agent'): ?>menu-vertical__item--active<? endif; ?>">
            <?= Yii::t('db', 'Add agent') ?>
        </a>
    </div>

    <div class="menu-vertical__category <? if (!in_array($request->getPathInfo(), ['account/products', 'account/product-edit', 'account/add-product'])): ?>menu-vertical__category--collapsed<? endif ?>">
        <div class="menu-vertical__item <? if (in_array($request->getPathInfo(), ['account/products', 'account/product-edit', 'account/add-product'])): ?>menu-vertical__item--active<? endif ?>">
            <?= Yii::t('db', 'Products') ?>
        </div>
        <a
                href="<?= Url::to('/account/products') ?>"
                class="menu-vertical__item <? if ($request->getPathInfo() == 'account/products'): ?>menu-vertical__item--active<? endif; ?>"
        >
            <?= Yii::t('db', 'Products') ?>
        </a>
        <a href="<?= Url::to('/account/add-product') ?>"
           class="menu-vertical__item <? if ($request->getPathInfo() == 'account/add-product'): ?>menu-vertical__item--active<? endif; ?>">
            <?= Yii::t('db', 'Add product') ?>
        </a>
    </div>

    <div class="menu-vertical__category <? if (!in_array($request->getPathInfo(), ['account/services', 'account/service-edit', 'account/add-service'])): ?>menu-vertical__category--collapsed<? endif ?>">
        <div class="menu-vertical__item <? if (in_array($request->getPathInfo(), ['account/services', 'account/service-edit', 'account/add-service'])): ?>menu-vertical__item--active<? endif ?>">
            <?= Yii::t('db', 'Services') ?>
        </div>
        <a
                href="<?= Url::to('/account/services') ?>"
                class="menu-vertical__item <? if ($request->getPathInfo() == 'account/services'): ?>menu-vertical__item--active<? endif; ?>"
        >
            <?= Yii::t('db', 'Services') ?>
        </a>
        <a href="<?= Url::to('/account/add-service') ?>"
           class="menu-vertical__item <? if ($request->getPathInfo() == 'account/add-service'): ?>menu-vertical__item--active<? endif; ?>">
            <?= Yii::t('db', 'Add service') ?>
        </a>
    </div>

    <div class="menu-vertical__category <? if (!in_array($request->getPathInfo(), ['account/jobs', 'account/job-edit','account/add-job'])): ?>menu-vertical__category--collapsed<? endif ?>">
        <div class="menu-vertical__item <? if (in_array($request->getPathInfo(), ['account/jobs', 'account/job-edit','account/add-job'])): ?>menu-vertical__item--active<? endif ?>">
            <?= Yii::t('db', 'Job offers') ?>
        </div>
        <a
                href="<?= Url::to('/account/jobs') ?>"
                class="menu-vertical__item <? if ($request->getPathInfo() == 'account/jobs'): ?>menu-vertical__item--active<? endif; ?>"
        >
            <?= Yii::t('db', 'Job offers') ?>
        </a>
        <a href="<?= Url::to('/account/add-job') ?>"
           class="menu-vertical__item <? if ($request->getPathInfo() == 'account/add-job'): ?>menu-vertical__item--active<? endif; ?>">
            <?= Yii::t('db', 'Add job offer') ?>
        </a>
    </div>
</div>

