<?php
include "connectdb.php";

$id = empty($_GET["id"]) ? null : $_GET["id"];

$sql1 = "DELETE FROM lid WHERE lid.id = :id";

$sql2 = "DELETE FROM kosten WHERE kosten.id = :id";

$params = array(
    ":id" => $id,
);

try {
    /* Voer het statement uit */
    $sth1 = $db->prepare($sql1);
    $sth1->execute($params);
    $sth2 = $db->prepare($sql2);
    $sth2->execute($params);

    /* insert is gelukt, leg vast in session variable */
    $_SESSION["insert_result"] = "succes";
    header("location: lidtabel.php");

} catch (PDOException $ex) {
    /* insert is fout gegaan, leg vast in session variable */
    $_SESSION["insert_result"] = $ex;
}
