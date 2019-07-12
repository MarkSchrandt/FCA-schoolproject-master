<?php

session_start();
if (isset($_SESSION["STATUS"]) && $_SESSION["STATUS"] == "1"){
}
else{
    header("Location: index.php?page=niet");
}