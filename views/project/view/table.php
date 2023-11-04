<?

use app\models\mgcms\db\Project;
use yii\web\View;
use app\components\mgcms\MgHelpers;

/* @var $this yii\web\View */
/* @var $model Project */

?>

<ul class="List-custom__two">
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Value') ?>: </span>
        <span>
                  <strong> <?= MgHelpers::convertNumberToNiceString($model->value) ?></ </strong>
                </span>
    </li>
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Pre-sale start') ?>:</span>
        <span>
                  <strong> <?= $model->date_presale_start ?> </strong>
                </span>
    </li>
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Pre-sale end') ?>: </span>
        <span>
                  <strong> <?= $model->date_presale_end ?></strong>
                </span>
    </li>
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Crowdsale start') ?>:</span>
        <span>
                  <strong><?= $model->date_crowdsale_start ?></strong>
                </span>
    </li>
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Crowdsale end') ?>: </span>
        <span>
                  <strong> <?= $model->date_crowdsale_end ?> </strong>
                </span>
    </li>
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Crowdsale profit') ?>: </span>
        <span>
                  <strong> <?= $model->percentage * (int)$model->investition_time ?> </strong>
                </span>
    </li>
    <li class="List-custom__two__item">
        <span> <?= Yii::t('db', 'Pre-sale bonus') ?>: </span>
        <span>
                  <strong> <?= $model->percentage_presale_bonus ?></strong>
                </span>
    </li>
</ul>
