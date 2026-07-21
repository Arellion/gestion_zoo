<?php
require_once "../header.php";
$sql = "SELECT * FROM employe WHERE id_employe = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$_GET['id']]);
$employe = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if (!empty($employe)) :
                ?>
                <form action="<?= SITE_URL ?>/employe/result-update.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h1>Modification de <?=$employe['nom_emp']?></h1>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNom" placeholder="Nom" name="nom"
                                       required value="<?=$employe['nom_emp']?>">
                                <label for="floatingNom">Nom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPrenom" placeholder="Prenom"
                                       name="prenom" required value="<?=$employe['prenom_emp']?>">
                                <label for="floatingPrenom">Prenom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPoste" placeholder="Poste"
                                       name="poste" required value="<?=$employe['poste_emp']?>">
                                <label for="floatingPoste">Poste</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="<?=$employe['id_employe']?>">
                            <button type="submit" class="btn btn-primary btn-sm">Modifié</button>
                        </div>
                    </div>
                </form>
            <?php
            else :
                ?>
                <div class="alert alert-danger">
                    Aucun employé à cette identifiant.
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
<?php
require_once "../footer.php";
?>
