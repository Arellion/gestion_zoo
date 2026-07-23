<?php
require_once "../header.php";
if (isset($_POST['id_aliment'])) :
    $stmt = $db->query("SELECT * FROM aliment WHERE id_aliment = $_POST[id_aliment]");
    $aliment = $stmt->fetch(PDO::FETCH_ASSOC);
    $action = 'update';
endif;
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="result.php" method="post">
                    <div class="card">
                        <div class="card-header bg-success-subtle  mb-2 d-flex justify-content-center">
                            <?= isset($_POST['id_aliment']) ? '<h1 class="fs-3">Modification d\'un nouvel aliment</h1>' : '<h1 class="fs-3">Création d\'un nouvel aliment</h1>' ?>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="code" maxlength="3" placeholder="Code aliment"
                                       value="<?= (isset($action)) ? $aliment['code_aliment'] : '' ?>"
                                       id="floatingCode" required>
                                <label for="floatingCode">Code Aliment</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nom" placeholder="Nom aliment"
                                       value="<?= isset($action) ? $aliment['nom_aliment'] : '' ?>"
                                       id="floatingNom" required>
                                <label for="floatingNom">Nom aliment</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stock" placeholder="Stock"
                                       value="<?= isset($action) ? $aliment['stock_aliment'] : '' ?>"
                                       id="floatingStock" required>
                                <label for="floatingStock">Stock</label>
                            </div>
                        </div>
                        <div class="card-footer bg-success-subtle d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm me-1" name="action" value="<?= isset($action) ? 'update': 'create' ?>">
                                <?= isset($action) ? 'Modifier l\'aliment': 'Créer l\'aliment' ?>
                            </button>
                            <input type="hidden" value="<?= isset($action) ? $_POST['id_aliment'] : ''?>" name="id_aliment" id="id_aliment">
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once "../footer.php";
