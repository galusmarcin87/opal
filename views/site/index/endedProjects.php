<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\data\ActiveDataProvider;
use yii\web\View;
use app\models\mgcms\db\Project;
use yii\widgets\ListView;

$query = Project::find()->where(['status' => Project::STATUS_ENDED])->orderBy(['id' => SORT_DESC]);

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
<div class="section finished-campaigns-section">
    <div class="container">
        <h2 class="section-title section-title--small">
            <?= Yii::t('db', 'Ended campaigns') ?>
        </h2>

        <div class="swiper finished-campaigns">
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
            <a href="<?= \yii\helpers\Url::to(['/project/index', 'status' => Project::STATUS_ENDED]) ?>" class="btn btn-arrow"><?= Yii::t('db', 'See all') ?>
                <svg class="icon-long-arrow">
                    <use xlink:href="#long-right-arrow" />
                </svg>
            </a>
        </div>

    </div>
</div>
