<script>
    function confirmDelete(id) {
        $("#modal-confirm").modal('show');
        $('#btn-delete-confirmed').on('click', function () {
            deletelid(id);
        })
    }
    function deletelid(id) {
        $('#modal-confirm').modal('hide');
        $.get('lidverwijderen.php', {id: id}).then(
            function () {
                window.location.href = 'lidtabel.php';
                window.location.reload(true);
            }
        )
    }
</script>
<?php
include "inlogvalidatie.php"; include "templates/header.php"; include "connectdb.php";
$sql = "SELECT * FROM lid JOIN kosten ON (lid.id = kosten.id)";
$sth = $db->prepare($sql);
$sth->execute();

?>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Aanhef</th>
            <th>Soortlid</th>
            <th>Betaalt</th>
            <th>Hoeveel</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $sth->fetch()) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["voornaam"]; ?></td>
                <td><?php echo $row["achternaam"]; ?></td>
                <td><?php echo $row["aanhef"]; ?></td>
                <td><?php echo $row["soortlid"]; ?></td>
                <td><?php echo $row["betaalt"]; ?></td>
                <td><?php echo $row["hoeveel"]; ?></td>
                <td><a class="btn btn-primary" href="liddetails.php?id=<?php echo $row["id"]?>">Details</a>
                <td><a class="btn btn-primary" href="updatelidform.php?id=<?php echo $row["id"]?>">Wijzigen</a>
                <td><a class="btn btn-primary" href="factuur.php?id=<?php echo $row["id"]?>">Factuur</a>
                <td><button onclick="confirmDelete(<?php echo $row["id"]?>)" class="btn btn-danger">Verwijderen</button></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal" id="modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verwijderen van lid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Wilt dit lid verwijderen ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-delete-confirmed" class="btn btn-danger">Verwijderen</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleeren</button>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(Id) {
        $("#modal-confirm").modal('show');
        $("#btn-delete-confirmed").on('click', function() {
            deleteUser(Id);
        });
    }
    function deleteUser(Id) {
        $("#modal-confirm").modal("hide");
        $.get("lidverwijderen.php", {id:Id}).then(window.location.reload());
    }
</body>
<?php include "templates/footer.php"; ?>
