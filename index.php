<!DOCTYPE html>
<html lang="nl">
<head>
    <title>FCA Voetbal</title>
    <link rel="icon" type="image/png" href="images/voetbal.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <form action="inlog.php" method="post" class="container">
        <input type="text" required name="inlognaam" placeholder="inlognaam" class="form-control form-group">
        <input type="password" required name="wachtwoord" class="form-control form-group" placeholder="wachtwoord">
        <input type="submit" value="Inloggen" class="btn btn-primary form-group">
    </form>
</body>
<?php if(isset($_GET["page"]) && $_GET["page"] == "fout") {
    echo "<h3>Het wachtwoord of naam is niet goed!</h3>";
} if(isset($_GET["page"]) && $_GET["page"] == "niet") {
    echo "<h3>Je bent niet ingelogd!</h3>";
}
include "templates/footer.php"; ?>