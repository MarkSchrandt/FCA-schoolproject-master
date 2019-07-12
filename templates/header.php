<!DOCTYPE html>
<html lang="nl">
<head>
    <title>FCA Voetbal</title>
    <link rel="icon" type="image/png" href="images/voetbal.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $datum = date("Y-m-d H:i:s");?>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">FCA Voetbal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="lidtabel.php">Ledentabel</a>
                <a class="nav-item nav-link" href="lidtoevoegenform.php">Lidtoevoegen</a>
                <a class="nav-item nav-link" onclick="prijsVerhogen()">Prijs verhogen</a>
            </div>
        </div>

        <a class="btn btn-primarry" href="logout.php">Logout</a>
    </nav>
    <script>
        function prijsVerhogen() {
        var zeker = confirm("Wil je de contributie en de training prijs verhogen?");
        if (zeker == true){
            $.get("prijsverhogen.php").then(location.reload());
        }
        }
    </script>
</header>
