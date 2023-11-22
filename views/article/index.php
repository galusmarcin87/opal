<?php
/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\widgets\ListView;

$this->title = Yii::t('db', 'News');
if (isset($tag) && $tag) {
    $this->title = Yii::t('db', 'Tag') . ' - ' . $tag;
}


$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){ 
    $('.search-form').toggle(1000); 
    return false; 
});";
$this->registerJs($search);

?>

<?= $this->render('/common/breadcrumps') ?>

<div class="section-background">
    <div class="container">
        <?=
        ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => [
                'class' => 'col-lg-4'
            ],
            'options' => [
                'class' => 'row gy-5',
            ],
            'layout' => '{items}',
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_index', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this,'displayImageHook' => true]);
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



