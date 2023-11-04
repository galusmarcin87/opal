<?php
/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\widgets\ListView;
use app\models\mgcms\db\Project;
use app\models\mgcms\db\Category;

$this->title = Yii::t('db', 'Current projects');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Projects Projects--white-top">
    <div class="container">
        <div class="Projects__header__wrapper">
            <h4 class="Projects__header text-center"><?= \app\components\mgcms\MgHelpers::getSettingTypeText('projects header ' . ' ' . Yii::$app->language, false, 'Projects Jewellery ') ?></h4>
            <div class="Select hidden">
                <select class="Select__select">
                    <option>- sortuj w -</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <?=
        ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => [
                'class' => 'Projects__card item'
            ],
            'options' => [
                'class' => 'Projects__sortable ' ,
            ],
            'layout' => '{items}',
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_tileItem', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this]);
            },
        ])

        ?>

    </div>
    <div class="Pagination text-center">
        <?=
        ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{pager}',
            'options' => [
                'class' => 'Page navigation example',
                'tag' => 'nav'
            ],
            'pager' => [
                'firstPageLabel' => '&laquo;',
                'lastPageLabel' => '&raquo;',
                'prevPageLabel' => '&lt;',
                'nextPageLabel' => '&gt;',
                // Customzing CSS class for pager link
                'linkOptions' => [
                    'class' => 'page-link'
                ],
                'activePageCssClass' => 'active',
                'pageCssClass' => 'page-item',
                // Customzing CSS class for navigating link
                'prevPageCssClass' => 'page-item ',
                'nextPageCssClass' => 'page-item page-next',
                'firstPageCssClass' => 'page-item page-first',
                'lastPageCssClass' => 'page-item page-last',
            ],
        ])

        ?>
    </div>

</section>


<?= $this->render('/common/newsletterForm') ?>
