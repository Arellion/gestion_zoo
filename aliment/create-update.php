<?php
require_once "../header.php";
print_r($_POST);
?>
<?php
$stmt = $db->query("SELECT * FROM aliment WHERE id_aliment = $_POST[id_aliment]");
$stmt->fetch(PDO::FETCH_ASSOC);
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
                            <div>
                                <input type="text" class="form-control" name="code" placeholder="Code aliment"
                                       value=""
                                       id="floatingCode" required>
                                <label for="floatingCode">Code Aliment</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="nom" placeholder="Nom aliment"
                                       value=""
                                       id="floatingNom" required>
                                <label for="floatingNom">Nom aliment</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="stock" placeholder="Stock"
                                       value=""
                                       id="floatingStock" required>
                                <label for="floatingStock">Stock</label>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once "../footer.php";
