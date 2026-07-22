<?php
require_once "../header.php";
//Si j'ai une id il faut la récupérer
if (isset($_POST["id"])) :
    $sql = "SELECT * FROM `menace` WHERE `id_menace` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST["id"]]);
    $menace = $stmt->fetch(PDO::FETCH_ASSOC);
endif;
?>
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col">
                <form method="post" action="<?= SITE_URL ?>/menace/result.php">
                    <div class="card">
                        <div class="card-header">
                            <!--                            if(isset($menace['id_menace'])) :-->
                            <!--                            echo "Création d'une menace"-->
                            <!--                            else :-->
                            <!--                            echo "Création d'une menace"-->
                            <!--                            Pareil que-->
                            <?= isset($menace['id_menace']) ? 'Modification de la menace' : 'Creation de la menace' ?>
                        </div>
                        <div class="card-body">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="libelle" placeholder="libelle"
                                       value="<?= isset($menace['libelle_menace']) ? $menace['libelle_menace'] : ''; ?>"
                                       id="floatingLibelle" required>
                                <label for="floatingLibelle">Libelle</label>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php if (isset($menace['id_menace'])) : ?>
                            <input type="hidden" name="id" value="<?= $menace['id_menace']; ?>">
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">Modifié la menace</button>
                            <?php else :?>

                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">Créer la menace</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once "../footer.php";
