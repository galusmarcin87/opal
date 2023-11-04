<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\data\ActiveDataProvider;
use yii\web\View;
use app\models\mgcms\db\Project;
use yii\widgets\ListView;

$query = Project::find()->where(['status' => Project::STATUS_PLANNED])->orderBy(['id' => SORT_DESC]);

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

?><div class="section upcoming-campaigns-section">
    <div class="upcoming-campaigns-decoration">
        <img src="/images/dots.png" alt="" class="img-fluid">
    </div>
    <div class="container">

        <div class="bg-light-right">
            <div class="bg-light-right-content">

                <h2 class="section-title section-title--small">
                    <?= Yii::t('db', 'Upcoming campaigns') ?>
                </h2>

                <div class="swiper upcoming-campaigns">
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

                <div class="campaigns-readmore text-end">
                    <a href="<?= \yii\helpers\Url::to(['/project/index', 'status' => Project::STATUS_PLANNED]) ?>" class="btn btn-arrow"><?= Yii::t('db', 'See all') ?>
                        <svg class="icon-long-arrow">
                            <use xlink:href="#long-right-arrow" />
                        </svg>
                    </a>
                </div>


            </div>
        </div>

    </div>
</div>
