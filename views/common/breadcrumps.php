<?

use yii\web\View;

/* @var $this yii\web\View */

?>

<div class="page-header ">
    <div class="page-header-content">
        <div class="container">

            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">
                                <svg class="icon">
                                    <use xlink:href="#home"/>
                                </svg>
                            </a></li>

                        <? if (isset($this->params['breadcrumbs'])): ?>
                            <? foreach ($this->params['breadcrumbs'] as $item): ?>
                                <? if (is_array($item)) : ?>
                                    <li class="breadcrumb-item"><a href="<?= $item[0] ?>"><?= $item[1] ?></a></li>
                                <? else: ?>
                                    <li class="breadcrumb-item"><?= $item ?></li>
                                <? endif; ?>
                            <? endforeach; ?>
                        <? endif; ?>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>


                    </ol>
                </nav>
            </div>

            <h1 class="page-header-title">
                <?= $this->title ?>
            </h1>
        </div>
    </div>
</div>
