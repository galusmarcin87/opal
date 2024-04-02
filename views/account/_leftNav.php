<div class="col-lg-2 account-sidebar-col">
    <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasAccount"
         aria-labelledby="offcanvasAccountLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title"
                id="offcanvasExaoffcanvasAccountLabelmpleLabel"><?= Yii::t('db', 'My account') ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="account-menu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'main' ? 'active' : '' ?>" aria-current="page"
                           href="<?= \yii\helpers\Url::to(['index', 'tab' => 'main']) ?>"><?= Yii::t('db', 'Main panel') ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'campaigns' ? 'active' :'' ?>" aria-current="page"
                           href="<?= \yii\helpers\Url::to(['index', 'tab' => 'campaigns']) ?>"><?= Yii::t('db', 'Campaigns') ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'investitions' ? 'active' : '' ?>" aria-current="page"
                           href="<?= \yii\helpers\Url::to(['index', 'tab' => 'investitions']) ?>"><?= Yii::t('db', 'Investitions') ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'mydata' ? 'active' : '' ?>" aria-current="page"
                           href="<?= \yii\helpers\Url::to(['index', 'tab' => 'mydata']) ?>"><?= Yii::t('db', 'My data') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'favorite' ? 'active' : '' ?>" aria-current="page"
                           href="<?= \yii\helpers\Url::to(['index', 'tab' => 'favorite']) ?>"><?= Yii::t('db', 'Favorite') ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'password' ? 'active' : '' ?>" aria-current="page"
                           href="<?= \yii\helpers\Url::to(['index', 'tab' => 'password']) ?>"><?= Yii::t('db', 'Change password') ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $tab == 'logout' ? 'active' : '' ?>" aria-current="page"
                           href="javascript:submitLogoutForm()"><?= Yii::t('db', 'Log out') ?></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>
