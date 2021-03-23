<?php

include 'php/template.php';
include 'inc/connect.pdo.php';
include 'FonixSzallito.php';

$pdo = newPdoConnection();

$tmp = new template("temp/index.htm");

$script = '<link href="css/bootstrap_min_wer.css" rel="stylesheet">
           <link href="css/font-awesome_min_wer.css" rel="stylesheet">
           <link href="css/fonix_szallito_felulet.css" rel="stylesheet" type="text/css">
           <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>    
           <script src="js/karbantartas/popper_min_wer.js"></script>    
           <script type="text/javascript" src="js/karbantartas/bootstrap_min_wer.js"></script>
           <script type="text/javascript" src="js/karbantartas/fonix_szallito.js?v=' . microtime(true) . '"></script>  ';

$tmp->set('script', $script);

$tmp_tartalom = new template("temp/karbantartas/fonix_szallito_felulet.htm");

//feldolgozatlan szállítók lekérdezése
$fonixAdatok = new Adatok($pdo);
$szallitok = $fonixAdatok->getAdat();
$alTablaAzonosito = 1;
foreach ($szallitok as $szallito) {
    //adott szállítóhoz tartozó feldolgozatlan tételek
    $tetelek = $fonixAdatok->getAdatok($szallito);
    $tetelekSzama = count($tetelek);
    $tableData .= "<tr class='font-weight-bolder table-active'>
                <td class='border-info text-info text-center align-middle p-1' colspan='3'>" . $szallito["adat"] . "</td>                
                <td class='border-info text-info text-center p-1'></td>
                <td class='border-info text-info text-center p-1'></td>
                <td class='border-info text-info text-center p-1'></td>
                <td class='border-info text-info text-center align-middle p-1'>" . $tetelekSzama . "</td>
                <td class='border-info text-info text-center align-middle p-2' colspan='1'><input type='checkbox' name='szallitok' id='" . $szallito["adat"] . "' value='" . $szallito["adat"] . "'  onclick='munkalapToggle(this, $alTablaAzonosito)'></td>
                <td class='border-info text-info text-center align-middle p-0' colspan='1'><input class='btn btn-outline-info btn-light align-middle py-0' type='button' name='lenyitasSZallito' id='lenyitasSzallito' value='Szállító lenyitása' onclick='szallitoLenyit($alTablaAzonosito)'></td>
    </tr>
    <tr hidden class='thead-light altabla  ".$alTablaAzonosito."'>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'> </th>
    <th class='border-info text-info text-center p-1'></th>
    <th class='border-info text-info text-center p-1'></th>
</tr>
";
    foreach ($tetelek as $tetel) {
        $tableData .= "<tr hidden class='altabla ".$alTablaAzonosito."'>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'>" . $tetel[""] . "</td>
    <td class='border-info text-info text-center p-1'><input type='checkbox' name='$alTablaAzonosito' id='". $tetel["adat"] . "' value='". $tetel["adat"] . "' onclick='osszesCheck($alTablaAzonosito,  \"$szallito[0]\")'></td>
</tr>";
    }
    $alTablaAzonosito++;
}

$tmp_tartalom->set('tableData', $tableData);
$tmp->set('tartalom', $tmp_tartalom->get());
echo $tmp->get();
