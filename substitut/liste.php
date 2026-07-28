<?php
require_once("../header.php");
?>
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h1>Liste des animaux</h1>
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
                                <th>Code aliment Base</th>
                                <th>Nom Aliment</th>
                                <th>Code aliment substitut</th>
                                <th>Nom aliment substitut</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT substituer.*, ab.nom_aliment as nom_aliment_base, ab.code_aliment as code_aliment_base, sub.nom_aliment as nom_aliment_substitue, sub.code_aliment as code_aliment_substitue FROM substituer ";
                            $sql .= "INNER JOIN aliment ab ON substituer.id_aliment_base = ab.id_aliment ";
                            $sql .= "INNER JOIN aliment sub ON substituer.id_aliment_substitue = sub.id_aliment ";
                            $stmt = $db->query($sql);
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $substituer) :
                                ?>
                                <tr>
                                    <td><?= $substituer['code_aliment_base']; ?></td>
                                    <td><?= $substituer['nom_aliment_base']; ?></td>
                                    <td><?= $substituer['code_aliment_substitue']; ?></td>
                                    <td><?= $substituer['nom_aliment_substitue']; ?></td>
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