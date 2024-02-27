<?php
/* @var $this yii\web\View */

use app\models\mgcms\db\Project;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$newestCampaign = Project::find()->where(['status' => Project::STATUS_ACTIVE])->orderBy('id DESC')->one();
$query = Project::find()->where(['status' => Project::STATUS_ACTIVE]);

$dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 6,
    ],
    'sort' => [
        'attributes' => [
            'order' => SORT_ASC,
        ]
    ],
]);
$this->title = Yii::t('db', 'Main panel');
?>

<?= $this->render('/common/breadcrumps') ?>

<div class="container">
<div class="row">
	<div class="col-12">
		<a href="<?= \yii\helpers\Url::to('/site/knowledge-test') ?>" class="btn btn-primary">
			<?= Yii::t('db', 'Apply for experienced investor status') ?>
		</a>
	</div>
</div>
</div><br>

<?= $this->render('_investor') ?>
<div class="account-page">
    <div class="container">
		
        <div class="row gx-4">

            <?= $this->render('_leftNav',['tab' => $tab]) ?>

            <div class="col-lg-8 account-content-col">


                <div class="account-main-block">

                    <h2 class="section-title section-title--small">
                        <?= Yii::t('db', 'The newest edition') ?>
                    </h2>

                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <?= $this->render('/project/_tileItem', ['model' => $newestCampaign]) ?>


                        </div>
                        <div class="col-lg-6">

                            <a class="cta cta--style1"
                               href="<?= \yii\helpers\Url::to(['project/buy', 'id' => $newestCampaign->id]) ?>">
                                <span class="cta-large">
                                  <?= Yii::t('db', 'See new edition') ?>
                                </span>
                                <span class="cta-small">
                                  <?= Yii::t('db', 'Invest now!') ?>
                                </span>
                                <svg class="icon icon-long-arrow">
                                    <use xlink:href="#long-right-arrow"/>
                                </svg>
                            </a>

                        </div>
                    </div>

                </div>


                <div class="account-main-block">
                    <h2 class="section-title section-title--small">
                        <?= Yii::t('db', 'All campaigns') ?>
                    </h2>


                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => [
                            'class' => 'col-lg-6'
                        ],
                        'options' => [
                            'class' => 'row gy-5',
                        ],
                        'layout' => '{items}',
                        'itemView' => function ($model, $key, $index, $widget) {
                            return $this->render('/project/_tileItem', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this]);
                        },
                    ])

                    ?>

                    <div class="Pagination text-center">
                        <?=
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => '{pager}',
                            'options' => [
                                'class' => 'Page navigation',
                                'tag' => 'nav'
                            ],
                            'pager' => [
                                'options' => ['class' => 'pagination justify-content-center'],
                                'firstPageLabel' => false,
                                'lastPageLabel' => false,
                                'prevPageLabel' => '<svg class="icon">
                            <use xlink:href="#long-left-arrow"></use>
                        </svg>',
                                'nextPageLabel' => '<svg class="icon">
                            <use xlink:href="#long-right-arrow"/>
                        </svg>',
                                // Customzing CSS class for pager link
                                'linkOptions' => [
                                    'class' => 'page-link'
                                ],
                                'activePageCssClass' => 'active',
                                'pageCssClass' => 'page-item',
                                // Customzing CSS class for navigating link
                                'prevPageCssClass' => 'page-item prev',
                                'nextPageCssClass' => 'page-item next',
                                'firstPageCssClass' => 'page-item first',
                                'lastPageCssClass' => 'page-item page-last',
                            ],
                        ])

                        ?>
                    </div>

                </div>


            </div>
        </div>

        <?= $this->render('_greenBar')?>

    </div>
</div>
