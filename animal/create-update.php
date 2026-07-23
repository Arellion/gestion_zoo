<?php
require_once("../header.php");
if (isset($_POST['id'])) :
    $sql = "SELECT * FROM animal WHERE id_animal = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
endif;
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="<?= SITE_URL; ?>/animal/result.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($animal['id_animal']) ? 'Modification de la' : 'Création d\'une' ?> animal
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNom" placeholder="Nom" name="nom"
                                       value="<?= isset($animal['nom_animal']) ? $animal['nom_animal'] : ''; ?>"
                                       required>
                                <label for="floatingNom">Nom</label>
                            </div>


                            <input type="date" class="form-control" id="floatingDateArrive"
                                   placeholder="Date d'arrivée" name="date_arrive"
                                   value="<?= isset($animal['date_arrive_animal']) ? $animal['date_arrive_animal'] : ''; ?>"
                                   required>
                            <label for="floatingDateArrive">Date d'arrivée</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="date" class="form-control" id="floatingDateNaissance"
                                   placeholder="Date de naissance" name="date_naissance"
                                   value="<?= isset($animal['date_naissance_animal']) ? $animal['date_naissance_animal'] : ''; ?>"
                                   required>
                            <label for="floatingDateNaissance">Date de naissance</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="form-check form-check-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexe" value="M" id="radioM">
                                    <label class="form-check-input" for="radioM">M</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexe" value="F" id="radioF">
                                    <label class="form-check-input" for="radioF">F</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexe" value="Indéterminé"
                                           id="radioIndeter" checked>
                                    <label class="form-check-input" for="radioIndeter">Indéterminé</label>
                                </div>
                                <label for="form-label">Commentaire</label>
                                <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="id_espece">
                                    <option selected disabled>--- Choisir une espèce ---</option>
                                    <?php
                                    $stmt = $db->query("SELECT * FROM espece");
                                    $row_espece = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($row_espece as $espece) :
                                        ?>
                                        <option value="<? $espece['id_espece']; ?>'"><?= $espece['nom_vulgaire_esp'];?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="id_zone">
                                    <option selected disabled>--- Choisir une zone ---</option>
                                    <?php
                                    $stmt = $db->query("SELECT * FROM zone");
                                    $row_zone = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($row_zone as $zone) :
                                        ?>
                                        <option value="<? $zone['id_zone']; ?>'"><?= $zone['libelle_zone'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php if (isset($animal['id_animal'])) : ?>
                                <input type="hidden" name="id" value="<?= $animal['id_animal']; ?>">
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">
                                    Modifier la animal
                                </button>
                            <?php else : ?>
                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">
                                    Ajouter une animal
                                </button>
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