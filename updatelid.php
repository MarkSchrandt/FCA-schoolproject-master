<?php
include "connectdb.php";
/*De variabele vanuit de form */
$id = htmlspecialchars(empty($_POST["id"]) ? null : $_POST["id"]);
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



$sql1 = "UPDATE lid SET voornaam = :voornaam, achternaam = :achternaam, geboortedatum = :geboortedatum,
 aanhef = :aanhef, postcode = :postcode, plaats = :plaats, straat = :straat, huisnummer = :huisnummer,
 telefoonnummer = :telefoonnummer, mobielnummer = :mobielnummer, email = :email WHERE lid.id = :id";

$sql2 = "UPDATE Kosten SET soortlid = :soortlid, betaalt = :betaalt, hoeveel = :hoeveel, kosten = :kosten,
 training = :training WHERE kosten.id = :id";

$params1 = array(
	":id" => $id,
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
	":id" => $id,
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



	header("Location: lidtabel.php");
} catch (PDOException $ex) {
	echo $ex;
}
?>