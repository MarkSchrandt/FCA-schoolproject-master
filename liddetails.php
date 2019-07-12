<?php include "inlogvalidatie.php"; include "templates/header.php"; include "readlid.php";?>
<body>
<div id="bg">
    <img src="images/voetbal.jpg">
</div>

<?php

$kostesoortlid = 0;
$kostentraining = 0;

if(!empty ($lid)){
    $voornaam = $lid["voornaam"];
    $achternaam = $lid["achternaam"];
    $lidid = $lid["lidid"];
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
    $kosten  = $lid["kosten"];

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
}


    if ($training == null){
        $training = "geen";
    }
?>

<div class="text-block">
    <?php
    echo
        "ID: " . $id . "<br>" .
        "Aanhef: " . $aanhef . "<br>" .
        "Voornaam: " . $voornaam . "<br>" .
        "Achternaam: " . $achternaam . "<br>" .
        "Geboortedatum: " . $geboortedatum . "<br>" .
        "Postcode: " . $postcode . "<br>" .
        "Plaats: " . $plaats . "<br>" .
        "Straat: " . $straat . "<br>" .
        "Huisnummer: " . $huisnummer. "<br>" .
        "Telefoonnummer: " . $telefoonnummer . "<br>" .
        "Mobielnummer: " . $mobielnummer . "<br>" .
        "Email: " . $email . "<br>" .
        "Soortlid: " . $soortlid . "<br>";

    echo "Lidmaatschap kosten: ";
    foreach ($sthLid as $row) {
        echo $row["prijs"];
        $kostensoortlid = $row["prijs"];
    };

    echo
        "<br>" .
        "Training: " . $training . "<br>" .
        "Training kosten: "
    ;

    foreach ($sthTraining as $row) {
        echo $row["prijs"];
        $kostentraining = $row["prijs"];
    };

    $totaalbedrag = $kostentraining + $kostensoortlid + $kosten - $hoeveelbetaalt;
    echo "<br>" .
        "Betaalt: " . $betaalt . "<br>" .
        "Hoeveel: " . $hoeveelbetaalt . "<br>" .
        "Extra kosten: " . $kosten . "<br>" .
        "Totaal kosten: " . $totaalbedrag;
    ?>
</div>
</body>
<?php include "templates/footer.php";


?>