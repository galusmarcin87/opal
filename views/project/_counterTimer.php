<?

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $model Project */
/* @var $this yii\web\View */
$model->language = Yii::$app->language;
?>

<div class="campaign-countdown">
    <p class="text-uppercase">
        <strong><?= Yii::t('db', 'Time left') ?>:</strong>
    </p>
    <div class="countdown" data-date="24-12-2023" data-time="23:00">
        <div class="day"><span class="num"></span><span class="word"> dni</span></div>
        <div class="hour"><span class="num"></span><span class="word"> godzin</span></div>
        <div class="min"><span class="num"></span><span class="word"> minut</span></div>
        <div class="sec"><span class="num"></span><span class="word"> sekund</span></div>
    </div>
</div>

<div class="Invest-counter__body">
    <div class="Invest-counter__body__heading">
        <?= Yii::t('db', 'Time left') ?>
    </div>
    <div data-date="<?= $model->date_crowdsale_end ?>" class="Count-down-timer">
        <div class="Count-down-timer__day"><span></span> <?= Yii::t('db', 'days') ?></div>
        <div class="Count-down-timer__hour"><span></span> <?= Yii::t('db', 'hours') ?></div>
        <div class="Count-down-timer__minute"><span></span> <?= Yii::t('db', 'minutes') ?></div>
        <div class="Count-down-timer__second"><span></span> <?= Yii::t('db', 'seconds') ?></div>
    </div>
</div>



