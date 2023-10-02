<?php
/* @var $model app\models\mgcms\db\Company */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->title = $model->name;
//$model->language = Yii::$app->language;

?>

<section class="service-wrapper company-wrapper">
    <div class="container">
        <?= $this->render('view/_breadcrumbs', ['model' => $model]) ?>

<div class="service single-company">
    <?= $this->render('view/_logo', ['model' => $model]) ?>
    <div class="single-company__content ">
        <?= $this->render('view/_top', ['model' => $model]) ?>
        <?= $this->render('view/_buttons', ['model' => $model]) ?>

        <?php if ($model->description): ?>
            <h3><?= Yii::t('db', 'General information') ?></h3>
            <div class="description">
                <?= $model->description ?>
            </div><br>
        <?php endif; ?>

        <?= $this->render('view/_contactData', ['model' => $model]) ?>
        <?= $this->render('view/_forSaleData', ['model' => $model]) ?>

        <?php if ($model->gps_lat && $model->gps_long): ?>
            <h3><?= Yii::t('db', 'Localization') ?></h3>
            <div id="MAP"></div>
        <?php endif; ?>

        <?php $hasGallery = false; ?>

        <?php
$hasGallery = false;

foreach ($model->fileRelations as $relation) {
    if ($relation->json == '' && $relation->file) {
        $hasGallery = true;
        break;
    }
}
?>

<?php if ($hasGallery): ?>
    <h3><?= Yii::t('db', 'Gallery') ?></h3>
    <div class="carousel-wrap">
        <div class="owl-carousel owl-theme" id="GALLERY">
            <?php foreach ($model->fileRelations as $relation): ?>
                <?php if ($relation->json != '' || !$relation->file) continue; ?>
                <img class="item" src="<?= $relation->file->getImageSrc() ?>"/>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


        <?php if ($model->video): ?>
            <h3><?= Yii::t('db', 'Movie about company') ?></h3>
            <div class="single-company__video">
                <a class="popup-video" href="<?= $model->video ?>">
                    <img src="<?= $model->video_thumbnail ?>"/>
                    <img class="single-company__video__play" src="/svg/play.svg" alt=""/>
                </a>
            </div>
        <?php endif; ?>

        <div class="flex">
            <?php if ($hasGallery): ?>
                <div class="carousel-wrap buttons">
                    <h3><?= Yii::t('db', 'Multimedia') ?></h3>
                    <?php foreach ($model->fileRelations as $relation): ?>
                        <?php if ($relation->json != '1' || !$relation->file) continue; ?>
                        <a href="<?= $relation->file->getLinkUrl() ?>" class="btn btn--primary btn--small">
                            <?= $relation->file->origin_name ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?= $this->render('/common/_socialShare', [
                'title' => $model->name,
                'description' => $model->description,
                'image' => $model->thumbnail && $model->thumbnail->isImage() ? $model->thumbnail->getImageSrc(240, 0) : false,
            ]) ?>
        </div>
    </div>
</div>


    </div>
</section>

<? if ($model->gps_lat && $model->gps_long): ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeGtxbtJfB88Fgff3N_um_SjNBNAROskU"></script>
    <script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>
    <script>
        $(document).ready(function () {
            const initMap = () => {
                var myLatLng = { lat: <?=$model->gps_lat?>, lng: <?=$model->gps_long?> };
                // Create a map object and specify the DOM element for display.
                map = new google.maps.Map(document.getElementById('MAP'), {
                    center: myLatLng,
                    zoom: 15,
                    scrollwheel: false,
                    mapTypeControl: false,
                });

                // Create a marker and set its position.
                var marker = new google.maps.Marker({
                    map: map,
                    position: myLatLng,
                    title: '',
                    icon: '/images/point.png',
                });
            };
            initMap();
        });
    </script>
<? endif ?>
