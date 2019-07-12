<?php
include "connectdb.php";
/*De variabele vanuit de form */
$voornaam = htmlspecialchars(empty($_POST["voornaam"]) ? null : $_POST["voornaam"]);
$achternaam = htmlspecialchars(empty($_POST["achternaam"]) ? null : $_POST["achternaam"]);
$geboortedatum = htmlspecialchars(empty($_POST["geboortedatum"]) ? null : $_POST["geboortedatum"]);
$aanhef = htmlspecialchars(empty($_POST["aanhef"]) ? null : $_POST["aanhef"]);
$postcode = htmlspecialchars(empty($_POST["postcode"]) ? null : $_POST["postcode"]);
$plaats = htmlspecialchars(empty($_POST["plaats"]) ? null : $_POST["plaats"]);
$straat = htmlspecialchars(empty($_POST["straat"]) ? null : $_POST["straat"]);
$huisnummer = htmlspecialchars(empty($_POST["huisnummer"]) ? null : $_POST["huisnummer"]);
$telefoonnummer = htmlspecialchars(empty($_POST["telefoonnummer"]) ? null : $_POST["telefoonnummer"]);
$mobielnummer = htmlspecialchars(empty($_POST["mobielnummer"]) ? null : $_POST["mobielnummer"]);
$email = htmlspecialchars(empty($_POST["email"]) ? null : $_POST["email"]);
$soortlid = htmlspecialchars(empty($_POST["soortlid"]) ? null : $_POST["soortlid"]);
$betaalt = htmlspecialchars(empty($_POST["betaalt"]) ? null : $_POST["betaalt"]);
$hoeveel = htmlspecialchars(empty($_POST["hoeveel"]) ? null : $_POST["hoeveel"]);
$kosten = htmlspecialchars(empty($_POST["kosten"]) ? null : $_POST["kosten"]);
$training = htmlspecialchars(empty($_POST["training"]) ? null : $_POST["training"]);

/* zorgen dat er geen error komt als er geen kosten zijn */
if ($hoeveel < 1){
    $hoeveel = null;
}if ($kosten < 1){
    $kosten = null;
}

/* gegevens in de database invoeren */
$sql1 = "INSERT INTO lid ( voornaam, achternaam, geboortedatum, aanhef, postcode, plaats, straat, huisnummer, 
                   telefoonnummer, mobielnummer, email)
VALUES(:voornaam, :achternaam, :geboortedatum, :aanhef, :postcode, :plaats, :straat, :huisnummer, 
       :telefoonnummer, :mobielnummer, :email)";

$sql2 = "INSERT INTO kosten (soortlid, betaalt, hoeveel, kosten, training)
values (:soortlid, :betaalt, :hoeveel, :kosten, :training)";

$params1 = array(
    ":voornaam" => $voornaam,
    ":achternaam" => $achternaam,
    ":geboortedatum" => $geboortedatum,
    ":aanhef" => $aanhef,
    ":postcode" => $postcode,
    ":plaats" => $plaats,
    ":straat" => $straat,
    ":huisnummer" => $huisnummer,
    ":telefoonnummer" => $telefoonnummer,
    ":mobielnummer" => $mobielnummer,
    ":email" => $email,
);

$params2 = array(
    ":soortlid" => $soortlid,
    ":betaalt" => $betaalt,
    ":hoeveel" => $hoeveel,
    ":kosten" => $kosten,
    ":training" => $training,
);

try {
    /* Voer het statement uit */
    $sth1 = $db->prepare($sql1);
    $sth1->execute($params1);
    $sth2 = $db->prepare($sql2);
    $sth2->execute($params2);

    /* insert is gelukt, leg vast in session variable */
    $_SESSION["insert_result"] = "succes";
    header("Location: lidtabel.php");
} catch (PDOException $ex) {
    /* insert is fout gegaan, leg vast in session variable */
    $_SESSION["insert_result"] = $ex;
    echo $ex;
}