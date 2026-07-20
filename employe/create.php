<?php
require_once "../header.php";
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="<?= SITE_URL?>/employe/result-create.php" method="POST">
                <div class="card">
                    <div class="card-header">
                        <h1>Créer un employé</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingNom" placeholder="Nom" name="nom" required>
                            <label for="floatingNom">Nom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPrenom" placeholder="Prenom" name="prenom" required>
                            <label for="floatingPrenom">Prenom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPoste" placeholder="Poste" name="poste" required>
                            <label for="floatingPoste">Poste</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../footer.php";
?>
