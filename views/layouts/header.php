<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use \app\components\mgcms\MgHelpers;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$isHomePage = $this->context->id == 'site' && $this->context->action->id == 'index';

$menu = new NobleMenu(['name' => 'header_' . Yii::$app->language, 'loginLink' => false]);

?>
<?= $this->render('_svg') ?>


<nav class="navbar navbar-expand-lg">
    <div class="container flex-wrap">

        <div class="row w-100 flex-wrap navbar-line1">
            <div class="col-8 col-lg-6">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo-full.png" width="275" alt="">
                </a>
            </div>
            <div class="col-4 text-end d-lg-none">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-wrap align-items-center justify-content-center justify-content-md-end">

                <ul class="nav nav-links">
                    <? if (Yii::$app->user->isGuest): ?>
                        <li class="nav-item">
                            <a href="<?= Url::to('/site/register') ?>"
                               class="nav-link"><?= Yii::t('db', 'Register') ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to('/site/login') ?>" class="nav-link"><?= Yii::t('db', 'Login') ?></a>
                        </li>
                    <? else: ?>
                        <li class="nav-item">
                            <a href="<?= Url::to('/account/index') ?>"
                               class="nav-link"><?= Yii::t('db', 'My account') ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:submitLogoutForm()" class="nav-link">
                                <?= Yii::t('db', 'Log out'); ?>
                            </a>
                        </li>
                    <? endif; ?>
                </ul>
                <ul class="nav nav-language">
                    <? foreach (Yii::$app->params['languagesDisplay'] as $language) : ?>
                        <li class="nav-item">
                            <a href="<?= yii\helpers\Url::to(['/', 'language' => $language]) ?>"
                               class="nav-link"><?= \_\upperCase($language) ?></a>
                        </li>
                    <? endforeach; ?>

                </ul>
                <ul class="nav nav-social">
                    <?
                    $facebook = MgHelpers::getSettingTypeText('facebook');
                    $linkedin = MgHelpers::getSettingTypeText('linkedin');
                    $instagram = MgHelpers::getSettingTypeText('instagram');
                    ?>


                    <li class="nav-item">
                        <a href="<?= $facebook ?>" target="_blank" class="nav-link">
                            <svg class="icon">
                                <use xlink:href="#facebook-circle"/>
                            </svg>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?= $instagram ?>" target="_blank" class="nav-link">
                            <svg class="icon">
                                <use xlink:href="#instagram-circle"/>
                            </svg>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?= $linkedin ?>" target="_blank" class="nav-link">
                            <svg class="icon">
                                <use xlink:href="#linkedin-circle"/>
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="row w-100 navbar-line2">
            <div class="col-12">

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <? foreach ($menu->getItems() as $item): ?>
                                <? if (isset($item['url'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                           href="<?= \yii\helpers\Url::to($item['url']) ?>"><?= $item['label'] ?></a>
                                    </li>
                                <? endif ?>
                            <? endforeach ?>


                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


<?= Html::beginForm(['/site/logout'], 'post', ['id' => 'logoutForm']) ?>
<?= Html::endForm() ?>
<script type="text/javascript">
    function submitLogoutForm() {
        $('#logoutForm').submit();
    }
</script>
