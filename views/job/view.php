<?
/* @var $model app\models\mgcms\db\Job */

use yii\web\View;

//$model->language = Yii::$app->language;
?>

<section class="service-wrapper company-wrapper">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?= \yii\helpers\Url::to('job/index') ?>"> <?= Yii::t('db', 'Job offers') ?> </a>
            <span><?= $model->name ?></span>
        </div>

        <div class="service single-company">
            <div class="badge-corner"><?= Yii::t('db', 'Job offer') ?></div>
            <div class="relative">
                <? if ($model->file && $model->file->isImage()): ?>
                    <img
                            class="single-company__image"
                            src="<?= $model->file->getImageSrc(1530) ?>"
                            alt=""
                    />
                <? else: ?>
                    <img class="single-company__image"
                         src="/images/companybg.jpeg"
                         alt=""/>
                <? endif ?>
                <? if ($model->company->thumbnail && $model->company->thumbnail->isImage()): ?>
                    <img src="<?= $model->company->thumbnail->getImageSrc(300, 0) ?>" class="training__logo"/>
                <? endif ?>


            </div>
            <div class="single-company__content">
                <h1 class="text-left"><?= $model->position ?></h1>

                <div class="flex">
                    <div>
                        <div class="label"><?= Yii::t('db', 'Address') ?>:</div>
                        <strong> <?= $model->country ?>, <?= $model->city ?>, <?= $model->address ?></strong>
                    </div>
                    <div>
                        <div class="label"><?= Yii::t('db', 'Industry') ?>:</div>
                        <div class="highlighted"><?= Yii::t('db', $model->industry) ?></div>
                    </div>
                    <div>
                        <div class="label"><?= Yii::t('db', 'Salary') ?>:</div>
                        <div class="highlighted"><?= $model->salary ?></div>
                    </div>
                </div>
                <div class="hr"></div>
                <h3><?= Yii::t('db', 'General information') ?></h3>
                <?= $model->info ?>
                <h3><?= Yii::t('db', 'Requirements') ?></h3>
                <div class="description">
                    <?= $model->requirements ?>
                </div>

                <h3 class="" hidden><?= Yii::t('db', 'Vacancy') ?></h3>
                <table class="table hidden">
                    <thead>
                    <tr>
                        <th>Kraj</th>
                        <th>Miasto</th>
                        <th>Wakat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="highlighted">Polska</div>
                        </td>
                        <td>
                            <div class="highlighted">Nazwa miasta</div>
                        </td>
                        <td>
                            <div class="highlighted">1</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="highlighted">Polska</div>
                        </td>
                        <td>
                            <div class="highlighted">Nazwa miasta</div>
                        </td>
                        <td>
                            <div class="highlighted">1</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center hidden">
                    <form class="contact-form" method="POST">
                        <div class="contact-form__header">Formularz kontaktowy</div>
                        <div class="flex">
                            <input
                                    type="text"
                                    class="input"
                                    placeholder="Imie"
                                    name="imie"
                            />
                            <input
                                    type="text"
                                    class="input"
                                    placeholder="Nazwisko"
                                    name="nazwisko"
                            />
                        </div>
                        <div class="flex">
                            <input
                                    type="email"
                                    class="input"
                                    placeholder="Email"
                                    name="email"
                            />
                            <input
                                    type="text"
                                    class="input"
                                    placeholder="Telefon"
                                    name="telefon"
                            />
                        </div>
                        <textarea
                                class="input input-textarea"
                                placeholder="Adres"
                                name="adres"
                        ></textarea>
                        <textarea
                                class="input input-textarea"
                                placeholder="Wiadomość"
                                name="wiadomosc"
                        ></textarea>
                        <input
                                type="file"
                                name="file"
                                id="file"
                                class="inputfile"
                                data-multiple-caption="{count} pliki"
                                multiple
                        />
                        <label for="file">wgraj plik</label>
                        <button class="btn btn--primary btn--block" type="submit">
                            Wyślij wiadomość
                        </button>
                    </form>
                </div>
                <?= $this->render('/common/_socialShare', [
                    'title' => $model->name,
                    'description' => $model->info,
                    'image' => $model->company->thumbnail && $model->company->thumbnail->isImage() ? $model->company->thumbnail->getImageSrc(240, 0) : false,
                ]) ?>
            </div>
        </div>
    </div>
</section>
