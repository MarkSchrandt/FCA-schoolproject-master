<?php include "templates/header.php"; include "connectdb.php"; include "inlogvalidatie.php"?>
<div id="bg">
  <img src="images/voetbal.jpg">
  <div class="text-block">
    <h4>Welkom tot de Startpagina</h4>
    <p>Het is vandaag <?php echo $datum?></p>
  </div>
  <div class="informatie">
    <p>Jarige deze maand</p>
        <?php
        $sql = "SELECT voornaam, achternaam, geboortedatum FROM lid WHERE MONTH(geboortedatum) = MONTH(CURDATE());";
        $sth = $db->prepare($sql);
        $sth->execute();
        ?>
      <div class="table">
          <table>
              <thead>
              <tr>
                  <th>Voornaam</th>
                  <th>Achternaam</th>
                  <th>Geboortedatum</th>
              </tr>
              </thead>
              <tbody>
              <?php while($row = $sth->fetch()) { ?>
                  <tr>
                      <td><?php echo $row["voornaam"]; ?></td>
                      <td><?php echo $row["achternaam"]; ?></td>
                      <td><?php echo $row["geboortedatum"]; ?></td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
      </div>

  </div>
</div>
</body>
<?php include "templates/footer.php"; ?>