<?php
require_once("../header.php");
if(isset($_POST['id'])) :
    $sql = "SELECT * FROM famille WHERE id_famille = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $famille = $stmt->fetch(PDO::FETCH_ASSOC);
endif;
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="<?= SITE_URL; ?>/famille/result.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($famille['id_famille']) ? 'Modification de la' : 'Création d\'une' ?> famille
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingCode" placeholder="Code" name="code" value="<?= isset($famille['code_famille']) ? $famille['code_famille'] : ''; ?>" maxlength="10" required>
                                <label for="floatingCode">Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingLibelle" placeholder="Libellé" name="libelle" value="<?= isset($famille['libelle_famille']) ? $famille['libelle_famille'] : ''; ?>" maxlength="80" required>
                                <label for="floatingLibelle">Libellé</label>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php if(isset($famille['id_famille'])) : ?>
                                <input type="hidden" name="id" value="<?= $famille['id_famille']; ?>">
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">Modifier la famille</button>
                            <?php else : ?>
                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">Ajouter une famille</button>
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