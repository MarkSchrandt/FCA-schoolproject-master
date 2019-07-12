<?php
include "connectdb.php";

$sql1 = "UPDATE contributie SET prijs = verhoging + prijs";

$sth1 = $db->prepare($sql1);
$sth1->execute();