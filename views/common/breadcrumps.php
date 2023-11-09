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
                        <li class="breadcrumb-item"><a href="#"><svg class="icon"><use xlink:href="#home" /></svg></a></li>


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
