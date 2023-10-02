<?
/* @var $model app\models\mgcms\db\Product */

/* @var $this View */

use yii\web\View;
use \app\models\mgcms\db\Category;
use yii\widgets\ListView;
use app\components\mgcms\MgHelpers;

?>


<section class="companies-wrapper">
    <div class="container">
        <? if ($country): ?>
            <h1 class="text-left"><?= Yii::t('db', $country) ?></h1>
            <div class="companyListCountryDesc mb-5">
                <?= MgHelpers::getSetting('country description '.$country.' '.Yii::$app->language) ?>
            </div>
        <? else: ?>
            <h1 class="text-left"><?= Yii::t('db', 'Search results') ?></h1>
        <? endif ?>
        <div class="search-results">
            <?= $this->render('/common/leftMenu') ?>
            <div>
                <div class="companies__labels">
                    <div class="label"><?= Yii::t('db', 'Companies') ?></div>
                    <div class="labell text-right hidden" style="margin-top: -12px">
                        Sortuj wg
                        <div class="select-wrqpper">
                            <select class="select">
                                <option>- największa liczba wejść na MFT</option>
                            </select>
                            <i
                                    class="select__icon fa fa-chevron-down"
                                    aria-hidden="true"
                            ></i>
                        </div>
                    </div>
                </div>
                <div class="companies companies--wide">
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => [
                            'class' => ''
                        ],
                        'options' => [
                            'class' => 'companies companies--wide',
                        ],
                        'layout' => '{items}',
                        'itemView' => function ($model, $key, $index, $widget) {
                            return $this->render('_index', ['model' => $model, 'key' => $key, 'index' => $index, 'widget' => $widget, 'view' => $this]);
                        },
                    ])

                    ?>

                    <?= $this->render('/common/_pagination', ['dataProvider' => $dataProvider, '']) ?>
                </div>
            </div>
        </div>
</section>
