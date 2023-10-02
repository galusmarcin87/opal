<?php
/* @var $this yii\web\View */

/* @var $myCompany \app\models\mgcms\db\Company */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;

?>

<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <div class="search-results search-results--dashboard">
            <?= $this->render('_leftMenu') ?>
            <div>
                <div class="dashboard-wrapper">
                    <h1 class="text-left col-md-4"><?= Yii::t('db', 'Dashboard') ?></h1><br>
                    <div class="row">

                        <? if ($myCompany): ?>
                            <div class="text-left col-md-12 paySubscription">
                                <a href="<?= Url::to('/account/pay-subscription-stripe') ?>"
                                   class="btn btn--primary"><?= Yii::t('db', 'Pay subscription') ?></a>
                                <a href="<?= Url::to('/account/pay-subscription') ?>"
                                   class="btn btn--primary"><?= Yii::t('db', 'Pay by tokens') ?></a>
                                <a href="<?= Url::to('/account/connect-with-stripe') ?>"
                                   class="btn btn--primary"><?= Yii::t('db', 'Connect with Stripe') ?></a>
                                <button class="btn-primary btn" id="affiliateLink"
                                        data-href="<?= \yii\helpers\Url::to(['/site/register',
                                            'agentCode' => MgHelpers::getUserModel()->agent_code], true) ?>">
                                    <?= Yii::t('db', 'Affiliate link') ?>
                                </button>
                            </div>
                        <? endif ?>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->agents) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Agents') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-agent') ?>"
                           class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/agents') ?>"
                           class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->products) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Products') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-product') ?>"
                           class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/products') ?>"
                           class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->services) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Services') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-service') ?>"
                           class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/services') ?>"
                           class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>
                    <div class="contact-box">
                        <div class="person person--big">
                            <div>
                                <div class="big-number"><?= $myCompany ? count($myCompany->jobs) : 0 ?></div>
                            </div>
                            <div>
                                <div class="person__role person__role--normal"><?= Yii::t('db', 'List of') ?></div>
                                <?= Yii::t('db', 'Jobs') ?>
                            </div>
                        </div>
                        <a href="<?= Url::to('/account/add-job') ?>"
                           class="btn btn--primary">+ <?= Yii::t('db', 'Add') ?></a>
                        <a href="<?= Url::to('/account/jobs') ?>"
                           class="btn btn--primary"><?= Yii::t('db', 'See') ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    function unsecuredCopyToClipboard (text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
        }
        catch (err) {
            console.error('Unable to copy to clipboard', err);
        }
        document.body.removeChild(textArea);
    }

    $('#affiliateLink').click(function () {
        unsecuredCopyToClipboard($(this).attr('data-href'));
        alert('<?=Yii::t('db', 'Copied to cliboard')?>');
    });

</script>
