<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\data\ActiveDataProvider;
use yii\web\View;
use app\models\mgcms\db\Article;
use yii\widgets\ListView;

$query = Article::find()->where(['status' => Article::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC]);

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
<div class="section news-section home-news">
    <div class="container">
        <h2 class="section-title">
            <?= Yii::t('db', 'News') ?>
        </h2>

        <div class="row">
            <div class="col-lg-8">


                <div class="swiper swiper-news">
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
                            return $this->render('/article/_index', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this]);
                        },
                    ])

                    ?>
                    <div class="swiper-pagination"></div>

                </div>


            </div>
            <div class="col-lg-4 my-5 my-lg-0 text-center">
                <img src="/images/home-news.png" alt="" class="img-fluid">
            </div>
        </div>
        <div class="text-center text-lg-start">
            <a href="<?= \yii\helpers\Url::to(['/article/index']) ?>" class="readmore btn btn-primary"><?= Yii::t('db', 'See all') ?></a>
        </div>

    </div>

</div>
