<?php
include "connectdb.php";

$inlognaam = htmlspecialchars(empty($_POST["inlognaam"]) ? null : $_POST["inlognaam"]);
$wachtwoord = htmlspecialchars(empty($_POST["wachtwoord"]) ? null : $_POST["wachtwoord"]);
$sql = "SELECT id FROM user WHERE naam = :inlognaam AND ww = :wachtwoord";
$params = array(
    ":inlognaam" => $inlognaam,
    ":wachtwoord" => $wachtwoord,
);
$sth = $db->prepare($sql);
$sth->execute($params);

$user = $sth->fetch(PDO::FETCH_ASSOC);

if ($user['id'] != null){
    session_start();
    $_SESSION["USER"] = $inlognaam;
    $_SESSION["STATUS"] = 1;
    $_SESSION["ID"] = $_COOKIE["PHPSESSID"];
    header("Location: home.php");
}
if($user['id'] == null){
    header("Location: index.php?page=fout");
}