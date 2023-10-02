<?
/* @var $model \app\models\InvestForm */

?>

<h1><?= Yii::t('db', 'Information from investors'); ?></h1>

<p>Imię i nazwisko: <?= $model->name ?></p>
<p>E-mail: <?= $model->email ?></p>
<p>Chcę zainwestować: <?= $model->investitionAmount ?></p>
<p>Telefon: <?= $model->phone ?></p>
<p>Miasto: <?= $model->city ?></p>
