<?php require_once "../header.php" ?>

<div class="container">
    <div class="row">
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col">

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-success-subtle  mb-2 d-flex justify-content-center">
                    <h1>Liste des aliments</h1>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <a href="<?= SITE_URL ?>/aliment/create-update.php" class="btn btn-primary btn-sm me-3">
                            <i class="fa-solid fa-plus me-2"></i>Ajouter un aliment
                        </a>
                    </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code aliment</th>
                            <th>Nom aliment</th>
                            <th>Stock aliment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $stmt = $db->query("SELECT * FROM aliment");
                        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                        foreach ($rows as $aliment) : ?>
                            <tr>
                                <td><?= $aliment['id_aliment'] ?></td>
                                <td><?= $aliment['code_aliment'] ?></td>
                                <td><?= $aliment['nom_aliment'] ?></td>
                                <td><?= $aliment['stock_aliment'] ?></td>
                                <td>
                                    <form action="<?= SITE_URL ?>/aliment/result.php" method="post"
                                          onsubmit="return confirm('Ete vous sûre de vouloir supprimer cette aliment? ')"
                                          class="d-inline">
                                        <input type="hidden" name="id_aliment" id="id_aliment"
                                               value="<?= $aliment['id_aliment'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm me-1" name="action"
                                                value="delete">
                                            <i class="fa fa-solid fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <form action="<?= SITE_URL ?>/aliment/create-update.php" method="post"
                                          class="d-inline">
                                        <input type="hidden" name="id_aliment" id="id_aliment"
                                               value="<?= $aliment['id_aliment'] ?>">
                                        <button type="submit" class="btn btn-primary btn-sm me-1">
                                            <i class="fa fa-solid fa-pen"
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

<?php require_once "../footer.php" ?>
