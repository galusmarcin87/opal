<?
use app\components\mgcms\MgHelpers;
?>
<img class="menu__logo" src="/img/logo_meetfaces_trading.png" alt="" ;">
<?= Yii::t('db', 'Piesto - Activation'); ?>
<?= Yii::t('db', 'Your activation link:');
?><a href="<?=yii\helpers\Url::to(['/site/activate','hash' => app\components\mgcms\MgHelpers::encrypt($model->id)], true)?>">
<?= Yii::t('db', 'Click here'); ?></a>
