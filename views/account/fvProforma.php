<?
/* @var $company \app\models\mgcms\db\Company */

use app\components\mgcms\MgHelpers;

$vat = MgHelpers::getSetting('fv proforma vat', false, '23%');
$priceNet = MgHelpers::getSetting('fv proforma price netto', false, 1200);
$priceVat = MgHelpers::getSetting('fv proforma price vat', false, 276);
$priceGross = MgHelpers::getSetting('fv proforma price brutto', false, 1476);
?>

<table>
    <tr>
        <th>FAKTURA PROFORMA</th>
    </tr>
</table>

<br/><br/>

<table class="cols2">
    <tbody>
    <tr>
        <td>

            <img src="/img/logo_meetfaces_trading.png" width="150"/>
        </td>
        <td>
            <table class="bordered">
                <tr>
                    <th>Nr faktury</th>
                    <td>FPF <?= date('d/m/Y') ?></td>
                </tr>
                <tr>
                    <th>Data wystawienia</th>
                    <td><?= date('Y-m-d') ?></td>
                </tr>
                <tr>
                    <th>Data sprzedaży</th>
                    <td><?= date('Y-m-d') ?></td>
                </tr>
            </table>
        </td>

    </tr>
    </tbody>
</table>

<br/><br/>

<table class="cols2 bordered">
    <tbody>
    <tr>
        <th>Sprzedający</th>
        <th>Kupujący</th>
    </tr>
    <tr>
        <td>
            <?= MgHelpers::getSetting('fv proforma seller', false, 'Meetfaces Trading<br/>
            ul. Reformacka 6<br/>
            35-026 Rzeszów<br/>
            NIP: 8133721576') ?>

        </td>
        <td>
            <?= $company->name ?><br/>
            <?= $company->street ?> <br/>
            <?= $company->postcode ?> <?= $company->city ?> <br/>
            NIP: <?= $company->nip ?>
        </td>
    </tr>
    </tbody>
</table>

<br/><br/>

<table class=" bordered">
    <tbody>
    <tr>
        <th>Lp</th>
        <th>Nazwa</th>
        <th>Ilość</th>
        <th>J.m.</th>
        <th>Cena jedn.<br/> netto</th>
        <th>Wartość<br/>netto</th>
        <th>Stawka VAT</th>
        <th>Kwota VAT</th>
        <th>Wartość<br/> brutto</th>

    </tr>
    <tr>
        <td>1</td>
        <td><?= MgHelpers::getSetting('fv proforma name', false, 'Abonament Meetfaces<br/> Trading')?></td>
        <td>1</td>
        <td>szt.</td>
        <td><?= $priceNet ?>zł</td>
        <td><?= $priceNet ?></td>
        <td><?= $vat ?></td>
        <td><?= $priceGross ?></td>
        <td><?= $priceGross ?></td>
    </tr>
    </tbody>
</table>

<br/><br/>

<table class="bordered right">
    <tbody>
    <tr>
        <th>W tym</th>
        <td><?= $priceNet ?>zł</td>
        <td><?= $vat ?></td>
        <td>276.00zł</td>
        <td><?= $priceGross ?></td>
    </tr>
    <tr>
        <th>W sumie</th>
        <td><?= $priceNet ?>zł</td>
        <td> x</td>
        <td>276.00zł</td>
        <td><?= $priceGross ?></td>
    </tr>
    </tbody>
</table>


<br/><br/><br/>


<table class="bordered p70">
    <tbody>
    <tr>
        <th>Sposób zapłaty</th>
        <td>Przelew bankowy</td>
    </tr>
    <tr>
        <th>Termin płatności</th>
        <td><?= date('Y-m-d', strtotime("+7 day")) ?></td>
    </tr>
    <tr>
        <th>Nr rachunku</th>
        <td><?= MgHelpers::getSetting('fv proforma bank account', false, '89 9430 1061 6000 4693 2000 0001')?></td>
    </tr>
    <tr>
        <th>Tytuł przelewu</th>
        <td><?= MgHelpers::getSetting('fv proforma title', false, 'Opłata za dostęp do platformy Meetfaces Trading')?>
        </td>
    </tr>
    </tbody>
</table>

<br/><br/><br/>


<table class="">
    <tr>
        <td class="bordered">Imię, nazwisko i podpis osoby upoważnionej do odebrania dokumentu <br/><br/><br/><br/><br/><br/><br/>
        </td>
        <td class="w30"></td>
        <td class="bordered">Imię, nazwisko i podpis osoby upoważnionej do wystawienia dokumentu
            <br/><br/><br/><br/><br/><br/><br/></td>
    </tr>
</table>


<p>
    <?= MgHelpers::getSetting('fv proforma footer', false, 'Podstawa prawna: Ustawa o VAT, art. 43 ust. 1, pkt. 40. Zgodnie z Rozporządzeniem Ministra Finansów z dnia 28
    listopada 2008r. w prawie[...] wystawiania faktur [...] IDz.U. Nr212, poz 1337. Faktura nie wymaga podpisu ani
    pieczęci
    wystawiającego')?>

</p>
