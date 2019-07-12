<?php include "inlogvalidatie.php"; include "templates/header.php"?>
    <body>
    <?php include "readlid.php";?>
    <div class= "container">
        <form action="updatelid.php" method="POST">
            <div class= "form-group">
                <?php include "inputlid.php";?>
            </div>
        </form>
    </div>
    </body>
<?php include "templates/footer.php"?>