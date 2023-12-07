<?php
/* @var $this yii\web\View */

use app\models\mgcms\db\Project;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$this->title = Yii::t('db', 'Campaigns');
?>

<?= $this->render('/common/breadcrumps') ?>
<?= $this->render('_investor') ?>


<div class="account-page">
    <div class="container">


        <div class="row gx-4">
            <?= $this->render('_leftNav',['tab' => $tab]) ?>
            <div class="col-lg-10 account-content-col">


                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-primary">
                            + Dodaj nową
                        </a>
                    </div>
                </div>

                <div class="account-filters">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="sort" class="form-label">Sortuj</label>
                            <select name="sort" id="sort" class="form-select">
                                <option value="newest">Oczekujące na start</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="date_from" class="form-label">Data wystąpienia</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="field-has-label mb-3">
                                        <input type="date" class="form-control" id="date_from" placeholder="Od">
                                        <label for="floatingInput">Od</label>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="field-has-label mb-3">
                                        <input type="date" class="form-control" id="date_to" placeholder="Do">
                                        <label for="floatingInput">Do</label>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <label for="date_from" class="form-label">Data zakończenia</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="field-has-label mb-3">
                                        <input type="date" class="form-control" id="date_from" placeholder="Od">
                                        <label for="floatingInput">Od</label>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="field-has-label mb-3">
                                        <input type="date" class="form-control" id="date_to" placeholder="Do">
                                        <label for="floatingInput">Do</label>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <label for="name" class="form-label">Nazwa</label>
                            <input type="text" class="form-control" name="name" id="name">

                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Filtruj</button>
                    </div>
                </div>

                <div class="table-responsive-lg">
                    <table class="table table-striped account-table">
                        <tr>
                            <th>Lp.</th>
                            <th class="text-start">Nazwa kampanii</th>
                            <th>Data zakończenia</th>
                            <th>Zebrana kwota</th>
                            <th>Udziały (w %)</th>
                            <th>Liczba inwestorów</th>
                            <th>Liczba inwestycji</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td class="text-start">Lorem Ipsum Lorem Ipsum</td>
                            <td>15.11.2023</td>
                            <td>6134849 PLN</td>
                            <td>30</td>
                            <td>76</td>
                            <td>189</td>
                            <td>Aktywny</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td class="text-start">Lorem Ipsum Lorem Ipsum</td>
                            <td>15.11.2023</td>
                            <td>6134849 PLN</td>
                            <td>30</td>
                            <td>76</td>
                            <td>189</td>
                            <td>Aktywny</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td class="text-start">Lorem Ipsum Lorem Ipsum</td>
                            <td>15.11.2023</td>
                            <td>6134849 PLN</td>
                            <td>30</td>
                            <td>76</td>
                            <td>189</td>
                            <td>Aktywny</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td class="text-start">Lorem Ipsum Lorem Ipsum</td>
                            <td>15.11.2023</td>
                            <td>6134849 PLN</td>
                            <td>30</td>
                            <td>76</td>
                            <td>189</td>
                            <td>Aktywny</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td class="text-start">Lorem Ipsum Lorem Ipsum</td>
                            <td>15.11.2023</td>
                            <td>6134849 PLN</td>
                            <td>30</td>
                            <td>76</td>
                            <td>189</td>
                            <td>Aktywny</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td class="text-start">Lorem Ipsum Lorem Ipsum</td>
                            <td>15.11.2023</td>
                            <td>6134849 PLN</td>
                            <td>30</td>
                            <td>76</td>
                            <td>189</td>
                            <td>Aktywny</td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 ms-lg-auto">
                <div class="account-main-block">

                    <div class="bg-green-right">
                        <div class="bg-green-right-content">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <h3 class="fs-4 fw-light font-museo mb-5 text-uppercase">
                                        Złóż wniosek o status inwestora doświadczonego
                                    </h3>

                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <a href="survey.html">
                                        <svg class="icon icon-long-arrow">
                                            <use xlink:href="#long-right-arrow"/>
                                        </svg>
                                    </a>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 ms-lg-auto">

                <h3 class="fw-semibold mb-5 text-center">
                    Jakie są korzyści posiadania konta inwestora doświadczonego?
                </h3>


                <div class="advantages pt-5">


                    <div class="advantages-item">
                        <div class="advantages-icon">
                            <img src="assets/images/icons/wartosc.svg" alt="">
                        </div>
                        <div class="advantages-title">
                            Lorem ipsum
                        </div>
                    </div>


                    <div class="advantages-item">
                        <div class="advantages-icon">
                            <img src="assets/images/icons/walidacja.svg" alt="">
                        </div>
                        <div class="advantages-title">
                            Lorem ipsum
                        </div>
                    </div>


                    <div class="advantages-item">
                        <div class="advantages-icon">
                            <img src="assets/images/icons/ukryte_koszty.svg" alt="">
                        </div>
                        <div class="advantages-title">
                            Lorem ipsum
                        </div>
                    </div>


                    <div class="advantages-item">
                        <div class="advantages-icon">
                            <img src="assets/images/icons/zysk.svg" alt="">
                        </div>
                        <div class="advantages-title">
                            Lorem ipsum
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>


</div>
