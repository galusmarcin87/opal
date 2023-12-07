<?php
/* @var $this yii\web\View */

use app\models\mgcms\db\Project;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$this->title = Yii::t('db', 'Investitions');
?>

<?= $this->render('/common/breadcrumps') ?>

<?= $this->render('_investor') ?>

<div class="account-page">
    <div class="container">


        <div class="row gx-4">

            <?= $this->render('_leftNav', ['tab' => $tab]) ?>
        </div>
    </div>
</div>
