<?php
require_once "../header.php";
print_r($_POST);
?>
<?php
$stmt = $db->query("SELECT * FROM aliment WHERE id_aliment = $_POST[id_aliment]")
$stmt->fetch(PDO::FETCH_ASSOC)
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form>
                    <div class="card">
                        <div class="card-header">
                            <?= isset($_POST['id_aliment']) ?'Modification d\'un nouvel aliment' : 'Création d\'un nouvel aliment' ?>
                        </div>
                        <div class="card-body">
                            <input name="code_aliment" placeholder="Code aliment" value=""
                        </div>
                        <div class="card-footer">

                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once "../footer.php";
