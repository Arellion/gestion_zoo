<?php
require_once("../header.php");
?>
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h1>Liste animaux</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <a href="<?=SITE_URL?>/animal/create-update.php" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-circle-plus"></i> Ajouter un animal
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Date d'arrivé</th>
                                <th>Date de naissance</th>
                                <th>Sexe</th>
                                <th>Commentaire</th>
                                <th>Espèce</th>
                                <th>Nom Vulgaire</th>
                                <th>Zone</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM animal ";
                            $sql .= "INNER JOIN espece ON animal.id_espece = espece.id_espece ";
                            $sql .= "INNER JOIN zone ON animal.id_zone = zone.id_zone ";
                            echo $sql;
                            $stmt = $db->query($sql);
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $animal) :
                                ?>
                                <tr>
                                    <td><?= $animal['id_animal']; ?></td>
                                    <td><?= $animal['nom_animal']; ?></td>
                                    <td><?= date('d/m/y', strtotime($animal['date_arrive_animal'])); ?></td>
                                    <td><?= date('d/m/y', strtotime($animal['date_naissance_animal'])); ?></td>
                                    <td><?= $animal['sexe_animal']; ?></td>
                                    <td><?= $animal['commentaire_animal']; ?></td>
                                    <td><?= $animal['nom_scientifique_esp']; ?></td>
                                    <td><?= $animal['nom_vulgaire_esp']; ?></td>
                                    <td><?= $animal['libelle_zone']; ?></td>
                                    <td>
                                        <form action="<?= SITE_URL; ?>/animal/create-update.php" method="POST" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $animal['id_animal']; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm me-1">
                                                <i class="fa fa-solid fa-pencil"></i>
                                            </button>
                                        </form>
                                        <form action="<?= SITE_URL; ?>/animal/result.php" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette animal')">
                                            <input type="hidden" name="id" value="<?= $animal['id_animal']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm me-1" name="action" value="delete">
                                                <i class="fa fa-solid fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once("../footer.php");
?>