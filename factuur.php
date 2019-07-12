<?php include "inlogvalidatie.php"; include "readlid.php";

if(!empty ($lid)) {
    $voornaam = $lid["voornaam"];
    $achternaam = $lid["achternaam"];
    $geboortedatum = $lid["geboortedatum"];
    $aanhef = $lid["aanhef"];
    $postcode = $lid["postcode"];
    $plaats = $lid["plaats"];
    $straat = $lid["straat"];
    $huisnummer = $lid["huisnummer"];
    $telefoonnummer = $lid["telefoonnummer"];
    $mobielnummer = $lid["mobielnummer"];
    $email = $lid["email"];
    $soortlid = $lid["soortlid"];
    $id = $lid["id"];
    $betaalt = $lid["betaalt"];
    $hoeveelbetaalt = $lid["hoeveel"];
    $training = $lid["training"];
    $kosten = $lid["kosten"];

    /*prijs berekenen van het type lidmaatschap*/
    $sqlLid = "SELECT prijs FROM contributie where naam = :soortlid";
    $paramsLid = array(
        ":soortlid" => $soortlid
    );
    $sthLid = $db->prepare($sqlLid);
    $sthLid->execute($paramsLid);

    /*prijs berekenen voor de training*/
    $sqlTraining = "SELECT prijs FROM contributie where naam = :kostentraining";
    $paramsTraining = array(
        ":kostentraining" => $training
    );
    $sthTraining = $db->prepare($sqlTraining);
    $sthTraining->execute($paramsTraining);

    if ($hoeveelbetaalt == null){
        $hoeveelbetaalt = 0;
    } if ($kosten == null){
        $kosten = 0;
    }
}
$naam = $voornaam . " " . $achternaam;
$adres = $straat . " " . $huisnummer . ", " . $plaats;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Factuur</title>
    <link rel="stylesheet" href="css/factuurstyle.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="images/voetbal.png">
    </div>
    <h1>FCA factuur</h1>
    <div id="company" class="clearfix">
        <div>FCA</div>
        <div>Molenstraat 24,<br /> 1624 NP, Hoorn</div>
        <div>0228-761973</div>
        <div><a href="mailto:info@fca.com">info@fca.com</a></div>
    </div>
    <div id="project">
        <div><span>ONDERWERP</span> Jaar factuur</div>
        <div><span>AAN</span> <?php echo $naam?></div>
        <div><span>ADRES</span> <?php echo $adres?></div>
        <div><span>EMAIL</span> <a href="mailto:<?php echo $email?>"><?php echo $email?></a></div>
        <div><span>DATUM</span> <?php echo date("d-m-y")?></div>
        <div><span>UITERLIJKE BETALING</span> <?php echo date("d-m-y", strtotime("+1 month"))?></div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRIJS</th>
            <th></th>
            <th>TOTAAL</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="service">Lidmaatschap</td>
            <td class="desc">Jaarprijs voor het lid zijn van de club, lid: <?php echo $soortlid?></td>
            <td class="unit"><?php echo "€";
                foreach ($sthLid as $row) {
                    echo $row["prijs"];
                    $kostensoortlid = $row["prijs"];
                };
                ?></td>
            <td class="qty"></td>
            <td class="total"><?php echo "€" . $kostensoortlid; ?></td>
        </tr>
        <tr>
            <td class="service">Extra training</td>
            <td class="desc">Kosten voor eventuele extra training, extra training: <?php echo $training?> </td>
            <td class="unit"><?php echo "€";
                foreach ($sthTraining as $row) {
                    echo $row["prijs"];
                    $kostentraining = $row["prijs"];
                };
                ?></td>
            <td class="qty"></td>
            <td class="total"><?php echo "€" . $kostentraining; ?></td>
        </tr>
        <tr>
            <td class="service">Nog te betalen</td>
            <td class="desc">Kosten die nog openstaan, bijvoorbeeld kantine kosten</td>
            <td class="unit"><?php echo "€" . $kosten; ?></td>
            <td class="qty"></td>
            <td class="total"><?php echo "€" . $kosten; ?></td>
        </tr>
        <tr>
            <td class="service">Betaalt</td>
            <td class="desc">Dit bedrag is al betaalt en wordt van het totaal bedrag afgehaald</td>
            <td class="unit"><?php echo "€" . $hoeveelbetaalt; ?></td>
            <td class="qty"></td>
            <td class="total"><?php echo "€" . $hoeveelbetaalt; ?></td>
        </tr>
        <tr>
            <td colspan="4">SUBTOTAAL</td>
            <td class="total"><?php
                $subbedrag = $kostentraining + $kostensoortlid + $kosten;
                echo "€" . $subbedrag;
                ?></td>
        </tr>
        <tr>
            <td colspan="4">MIN</td>
            <td class="total"><?php echo "€" . $hoeveelbetaalt; ?></td>
        </tr>
        <tr>
            <td colspan="4" class="grand total">Totaal</td>
            <td class="grand total"><?php
                $totaalbedrag = $kostentraining + $kostensoortlid + $kosten - $hoeveelbetaalt;
                echo "€" . $totaalbedrag;
                ?></td>
        </tr>
        </tbody>
    </table>
</main>
<footer>
    Factuur was gemaakt door een computer en is geldig zonder handtekening.
</footer>
</body>
</html>