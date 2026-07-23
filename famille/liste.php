<?php
require_once("../header.php");
?>
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h1>Liste des familles</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <a href="<?=SITE_URL?>/famille/create-update.php" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-circle-plus"></i> Ajouter une famille
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
                                <th>Code</th>
                                <th>Libellé</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stmt = $db->query("SELECT * FROM famille");
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $famille) :
                                ?>
                                <tr>
                                    <td><?= $famille['id_famille']; ?></td>
                                    <td><?= $famille['code_famille']; ?></td>
                                    <td><?= $famille['libelle_famille']; ?></td>
                                    <td>
                                        <form action="<?= SITE_URL; ?>/famille/create-update.php" method="POST" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $famille['id_famille']; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm me-1">
                                                <i class="fa fa-solid fa-pencil"></i>
                                            </button>
                                        </form>
                                        <form action="<?= SITE_URL; ?>/famille/result.php" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette famille')">
                                            <input type="hidden" name="id" value="<?= $famille['id_famille']; ?>">
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