<?php
require_once "../header.php";
print_r($_POST);
if (isset($_POST["id_zone"])) :
    $sql = "SELECT * FROM zone WHERE id_zone = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['id_zone']]);
    $zone = $stmt->fetch(PDO::FETCH_ASSOC);
    $action = 'update';
endif;
$stmt = $db->query('SELECT * FROM employe');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1><?= isset($action) ? 'Modification' : 'Creation' ?> de la zone</h1>
                    </div>
                    <form action="result.php" method="post">
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" maxlength="3" id="floatingCode" name="code"
                                       value="<?= isset($action) ? $zone['code_zone'] : '' ?>"
                                       placeholder="Code de la zone">
                                <label for="floatingCode">Code de la zone</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" maxlength="20" id="floatingLibelle"
                                       name="libelle"
                                       value="<?= isset($action) ? $zone['libelle_zone'] : '' ?>"
                                       placeholder="Nom de la zone">
                                <label for="floatingLibelle">Nom de la zone</label>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="id_employe">
                                        <option selected disabled>--- Choisir un d'employe ---</option>
                                    <?php
                                    foreach ($rows as $employe) :
                                        ?>
                                        <option value="<?= $employe['id_employe'] ?>" <?= $zone['id_employe'] == $employe['id_employe'] ? 'selected' : ''?>>
                                            <?= $employe['nom_emp'], ' ', $employe['prenom_emp'], ' ', $employe['poste_emp'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php if (isset($action)) : ?>
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">
                                    Modifier une zone
                                </button>
                                <input name="id_zone" value="<?= $zone['id_zone'] ?>" type="hidden">
                            <?php else : ?>
                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">Créer
                                    une zone
                                </button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require_once "../footer.php";
?>