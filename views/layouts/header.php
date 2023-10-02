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
<div class="menu-wrapper">
    <div class="container">
        <div class="menu">
            <a href="/">
                <img
                        class="menu__logo"
                        src="/img/logo_meetfaces_trading.png"
                        alt=""
                />
            </a>

            <div>
                <div class="arr-down">
                    <div class="dropdown">
                        <? foreach ($menu->getItems() as $item): ?>
                            <? if (isset($item['url'])): ?>
                                <a href="<?= \yii\helpers\Url::to($item['url']) ?>"><?= $item['label'] ?></a>
                            <? endif ?>
                        <? endforeach ?>
                    </div>
                </div>
            </div>
            <div class="search-wrapper">

                <form action="<?= Url::to('/search/index') ?>">
                    <input
                            type="text"
                            placeholder="Filmy, usługi, produkty, NIP, REGON, KRS..."
                            class="search"
                            name="q"
                            value="<?= $this->context->request->getQueryParam('q') ?>"
                    />
                    <img class="search-wrapper__icon" src="/svg/lupa.svg" alt=""/>
                </form>
            </div>
            <? if (Yii::$app->user->isGuest): ?>
                <div>
                    <a class="btn btn--secondary" href="<?= Url::to('/site/register') ?>"
                    ><?= Yii::t('db', 'Register') ?></a
                    >
                </div>
                <div>
                    <a class="btn btn--primary" href="<?= Url::to('/site/login') ?>"><?= Yii::t('db', 'Log in') ?></a>
                </div>
            <? else: ?>
                <div>
                    <a class="btn btn--secondary"
                       href="<?= Url::to('/account/index') ?>"><?= Yii::t('db', 'My account') ?></a>
                </div>
                <div>
                    <a href="javascript:submitLogoutForm()"
                       class="btn btn--primary"> <?= Yii::t('db', 'Log out'); ?> </a>
                </div>

            <? endif; ?>
            <div class="language-select">
                <img
                        class="language-select__selected-lang"
                        src="/img/flaga_<?= Yii::$app->language ?>.png"
                        alt=""
                />
                <div class="dropdown">
                    <? foreach (Yii::$app->params['languagesDisplay'] as $language) : ?>
                        <a href="<?= yii\helpers\Url::to(['/', 'language' => $language]) ?>">
                            <img
                                    class="language-select__selected-lang"
                                    src="/img/flaga_<?= $language ?>.png"
                                    alt=""
                            />
                        </a>
                    <? endforeach ?>


                </div>
            </div>
        </div>
    </div>
</div>

<?= Html::beginForm(['/site/logout'], 'post', ['id' => 'logoutForm']) ?>
<?= Html::endForm() ?>
<script type="text/javascript">
    function submitLogoutForm () {
        $('#logoutForm').submit();
    }
</script>
