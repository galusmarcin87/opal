<?php
/* @var $this yii\web\View */

/* @var $model \app\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$this->title = MgHelpers::getSettingTranslated('contact_header', 'Contact');


?>

<div class="text-page">
    <div class="container">
        <div class="text-page-intro">
            <div class="row">
                <div class="col-lg-6">

                    <?= $this->render('/common/breadcrumps') ?>

                    <?= MgHelpers::getSettingTypeText('contact - text ' . Yii::$app->language, true, ' <p class="contact-info">
                        <strong>Opalcrowd Spółka z Ograniczoną Odpowiedzialnością</strong><br>
                        Siedziba: ul. Żurawia 6/12 lok. 321<br>
                        00-503 Warszawa

                    </p>') ?>


                    <div class="contact-details">
                        <div class="contact-details-icon">
                            <svg class="icon">
                                <use xlink:href="#phone-call"/>
                            </svg>
                        </div>
                        <div class="text">
                            <?= MgHelpers::getSetting('contact phone', false, '123456789') ?>
                        </div>
                    </div>
                    <div class="contact-details">
                        <div class="contact-details-icon">
                            @
                        </div>
                        <div class="text">
                            <?= MgHelpers::getSetting('contact mail', false, 'mail@opalcrowd.com') ?>
                        </div>
                    </div>

                    <div class="contact-iod">
                        <p>
                            <strong>
                                <?= MgHelpers::getSettingTypeText('contact - position label' . Yii::$app->language, false, 'Inspektor Ochrony Danych') ?>
                            </strong>
                        </p>
                        <?= MgHelpers::getSettingTypeText('contact - position label' . Yii::$app->language, true, '<p>
                            
                            Izabela Suligowska<br>
                            e-mail: iod@opalcrowd.com
                        </p>') ?>

                    </div>
                    <?= MgHelpers::getSettingTypeText('contact - text 2' . Yii::$app->language, true, '<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis.
                    </p>') ?>

                </div>

                <div class="col-lg-6">
                    <img src="/images/opal2.svg" alt="Kontakt" class="img-fluid mt-4">
                </div>
            </div>
        </div>


        <div class="container">
            <div id="googlemap" class="escape-container-left" style="height:465px"
                 data-lat="<?= MgHelpers::getSetting('contact_map_lat', false, '52.2296756') ?>"
                 data-lng="<?= MgHelpers::getSetting('contact_map_long', false, '21.0122287') ?>"></div>
            <div class="map-points">
                <div class="map-point" data-lat="<?= MgHelpers::getSetting('contact_map_lat', false, '52.2296756') ?>"
                     data-lng="<?= MgHelpers::getSetting('contact_map_long', false, '21.0122287') ?>"
                     data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "></div>
            </div>
        </div>

        <div class="block-media block-media--reverse">
            <div class="block-media-text">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(true)
                ]);

                echo $form->errorSummary($model);
                ?>


                <h3>
                    <strong><?= Yii::t('db', 'Questions?') ?></strong> <?= Yii::t('db', 'Write to us!') ?>
                </h3>


                <div class="mb-4">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>
                </div>


                <div class="mb-4">
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
                </div>


                <div class="mb-4">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                </div>


                <div class="mb-4">
                    <?= $form->field($model, 'body')->textarea(['placeholder' => $model->getAttributeLabel('body'), 'rows' => 6]) ?>
                </div>

                <div class="form-check form-check-acceptance mb-4">
                    <?= $form->field($model, 'acceptTerms',
                        [
                            'options' => [
                                'class' => "Form__group form-group",
                            ],
                            'checkboxTemplate' => "{input}\n{label}\n{error}",
                        ]
                    )->checkbox(['class' => 'form-check-input']) ?>


                </div>
                <div class="form-check form-check-acceptance mb-6">
                    <?= $form->field($model, 'acceptTerms2',
                        [
                            'options' => [
                                'class' => "Form__group form-group",
                            ],
                            'checkboxTemplate' => "{input}\n{label}\n{error}",
                        ]
                    )->checkbox(['class' => 'form-check-input']) ?>
                </div>

                <div class="text-end my-4">
                    <button class="btn btn-primary" type="submit"><?= Yii::t('db', 'Send') ?></button>
                </div>


                <?php ActiveForm::end(); ?>
            </div>
            <div class="block-media-image">
                <img src="/images/contact.png" alt="" class="block-media-img">
            </div>
        </div>


    </div>
</div>
