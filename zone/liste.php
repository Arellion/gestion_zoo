<?php
require_once "../header.php";
$stmt = $db->query("SELECT * FROM zone INNER JOIN employe ON zone.id_employe = employe.id_employe");
$rows = $stmt->fetchAll();
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>Liste des zones</h1>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <a href="create-update.php">
                                <button class="btn btn-primary btn-sm">Ajouter une zone</button>
                            </a>
                        </div>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code de la zone</th>
                                    <th>Nom de la zone</th>
                                    <th>Nom du responsable</th>
                                    <th>Prenom du responsable</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($rows as $zone) : ?>
                                    <tr>
                                        <td><?= $zone['id_zone']; ?></td>
                                        <td><?= $zone['code_zone']; ?></td>
                                        <td><?= $zone['libelle_zone']; ?></td>
                                        <td><?= $zone['nom_emp']; ?></td>
                                        <td><?= $zone['prenom_emp']; ?></td>
                                        <td>
                                            <form method="post" action="<?= SITE_URL ?>/zone/create-update.php" class="d-inline">
                                                <button type="submit" name="id_zone" value="<?= $zone['id_zone']; ?>" class="btn btn-primary btn-sm me-1">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                            </form>
                                            <form method="post" action="<?= SITE_URL ?>/zone/result.php" class="d-inline"
                                                  onsubmit="return confirm('Ete vous sûre de vouloir supprimer cette aliment?')">
                                                <input type="hidden" name="id_zone" value="<?= $zone['id_zone']; ?>">
                                                <button type="submit" name="action" value="delete"
                                                        class="btn btn-danger btn-sm me-1">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "../footer.php";
