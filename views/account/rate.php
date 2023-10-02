<?php
/* @var $this yii\web\View */

/* @var $models \app\models\mgcms\db\Agent[] */

use app\extensions\mgcms\yii2TinymceWidget\TinyMce;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\StarRating;

?>
<section class="companies-wrapper companies-wrapper--dashboard">
    <div class="container">
        <h1><?= Yii::t('db', 'Rate the purchase') ?></h1>
        <div><?= $model->name ?></div>
        <?php $form = ActiveForm::begin([
            'id' => 'category-edit-form',
            'options' => ['class' => 'form'],
        ]); ?>

        <?= $form->field($payment, 'rate')->widget(StarRating::classname(), [
            'pluginOptions' => ['step' => 1, 'stars' => 8, 'showClear' => false,'showCaption' => false,'max'=>8]
        ]); ?>

        <button type="submit" class="btn btn-primary"><?= Yii::t('db', 'Rate') ?></button>

        <?php ActiveForm::end(); ?>
    </div>
</section>
