<?

use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \app\models\mgcms\db\Payment */

?>
<div class="investment">
    <div class="investment-avatar">
        <img src=" <?= $model->getModelAttribute('showUserPhoto') && $model->user->file && $model->user->file->isImage() ? $model->user->file->getImageSrc(71, 71) : Yii::t('db', '/images/avatars/avatar-empty.png') ?>"
             alt="OC" class="rounded-circle">
    </div>
    <div class="investment-text">
        <div class="investment-name">
            <?= (bool)$model->getModelAttribute('showUserName') ? $model->user : Yii::t('db', 'Hidden data') ?>
        </div>
        <div class="investment-date">

            <?= (bool)$model->created_on ?>
        </div>
    </div>
    <div class="investment-price">
        <?= $model->amount ?> PLN
    </div>
</div>
