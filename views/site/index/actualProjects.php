<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\data\ActiveDataProvider;
use yii\web\View;
use app\models\mgcms\db\Project;
use yii\widgets\ListView;

$query = Project::find()->where(['status' => Project::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC]);

$dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 9,
    ],
    'sort' => [
        'attributes' => [
            'order' => SORT_DESC,
        ]
    ],
]);

?>
<div class="container">
    <h2 class="section-title section-title--small">
        <?= Yii::t('db', 'Current campaigns') ?>
    </h2>

    <div class="row">
        <div class="col-lg-8">
            <div class="swiper current-campaigns">
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => [
                        'class' => 'swiper-slide'
                    ],
                    'options' => [
                        'class' => 'swiper-wrapper',
                    ],
                    'layout' => '{items}',
                    'itemView' => function ($model, $key, $index, $widget) {
                        return $this->render('/project/_tileItem', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this]);
                    },
                ])

                ?>
                <div class="swiper-pagination"></div>

            </div>


        </div>
        <div class="col-lg-4 d-flex align-items-center">
            <a class="cta cta--style1" href="<?= \yii\helpers\Url::to('/project/index') ?>">
        <span class="cta-large">
          <?= Yii::t('db', 'See other campaigns') ?>
        </span>
                <span class="cta-small">
          <?= Yii::t('db', 'prepared for YOU!!') ?>
        </span>
                <svg class="icon icon-long-arrow">
                    <use xlink:href="#long-right-arrow"/>
                </svg>
            </a>
        </div>
    </div>

</div>
