<?php
$id = empty($_GET["id"]) ? null : $_GET["id"];

include "connectdb.php";
$sql1 = "SELECT * FROM lid INNER JOIN kosten ON (lid.id = kosten.id) WHERE lid.id=:id";
$sql2 = "SELECT * FROM contributie";
$params = array(
    ":id" => $id
);


try{
    $sth1 = $db->prepare($sql1);
    $sth1->execute($params);
    $sth2 = $db->prepare($sql2);
    $sth2->execute();

    $lid = $sth1->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e){
    echo $e-> getMessage();
}