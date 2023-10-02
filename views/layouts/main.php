<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use app\widgets\AdWidget;
use yii\helpers\Html;

//use app\assets\AppAsset;
use app\assets\FrontAsset;
use app\components\mgcms\MgHelpers;

//AppAsset::register($this);
FrontAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap"
            rel="stylesheet"
    />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-222846406-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag () {dataLayer.push(arguments);}

        gtag('js', new Date());

        gtag('config', 'UA-222846406-1');
    </script>

</head>
<body id="page_<?= Yii::$app->controller->id . '_' . Yii::$app->controller->action->id ?>">
<?php $this->beginBody() ?>
<?= $this->render('header') ?>
<?= Alert::widget() ?>
<?= AdWidget::widget() ?>
<?= $content ?>
<?= $this->render('footer') ?>
<?php $this->endBody() ?>

<? $actionsForTranslate = ['company_view', 'service_view', 'product_view', 'job_view', 'agent_view',
    'company_index', 'service_index', 'product_index', 'job_index', 'agent_index'] ?>

<?= in_array(Yii::$app->controller->id . '_' . Yii::$app->controller->action->id, $actionsForTranslate) ?
    $this->render('_translate') :
    false ?>

</body>
</html>
<?php $this->endPage() ?>
