<?
/* @var $model \app\models\BecameConsultantForm */

?>

<h1><?= Yii::t('db', 'Become consultant'); ?></h1>

<p>Imię i nazwisko: <?= $model->first_name ?> <?= $model->surname ?></p>
<p>E-mail: <?= $model->email ?></p>
<p>Telefon: <?= $model->phone ?></p>
<p>Miejscowość: <?= $model->city ?></p>
<p>Województwo: <?= $model->voivodeship ?></p>
