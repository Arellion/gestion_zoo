<?php
require_once("../header.php");
if(isset($_POST['id'])) :
    $sql = "SELECT * FROM geographie WHERE code_geo = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $geo = $stmt->fetch(PDO::FETCH_ASSOC);
endif;
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="<?= SITE_URL; ?>/geographie/result.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($geo['code_geo']) ? 'Modification de la' : 'Création d\'une' ?> géographie
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingCode" placeholder="Code" name="code" value="<?= isset($geo['code_geo']) ? $geo['code_geo'] : ''; ?>" maxlength="10" <?= isset($geo['code_geo']) ? 'readonly' : 'required'; ?>>
                                <label for="floatingCode">Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingLibelle" placeholder="Libellé" name="libelle" value="<?= isset($geo['libelle_geo']) ? $geo['libelle_geo'] : ''; ?>" maxlength="80" required>
                                <label for="floatingLibelle">Libellé</label>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php if(isset($geo['code_geo'])) : ?>
                                <input type="hidden" name="id" value="<?= $geo['code_geo']; ?>">
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">Modifier la géographie</button>
                            <?php else : ?>
                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">Ajouter une géographie</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("../footer.php");
?>