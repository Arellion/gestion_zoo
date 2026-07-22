<?php
require_once "../header.php";
?>
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1>Liste des menaces</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="<?= SITE_URL ?>/menace/create-update.php" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-circle-plus"></i>Ajouter Menace
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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $stmt = $db->query("SELECT * FROM menace");
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $menace) :
                        ?>
                        <tr>
                            <td><?=$menace['id_menace']?></td>
                            <td><?=$menace['libelle_menace']?></td>
                            <td>
                                <form action="<?=SITE_URL?>/menace/result.php" method="post" class="d-inline" onsubmit="return confirm('Ete vous sûr de vouloir supprimer cette menace')">
                                    <input type="hidden" name="id" value="<?=$menace['id_menace']?>" >
                                    <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm me-1">
                                        <i class="fa fa-solid fa-trash-alt"></i>
                                    </button>
                                </form>
                                <form action="<?=SITE_URL?>/menace/create-update.php" method="post" class="d-inline">
                                    <input type="hidden" name="id" value="<?=$menace['id_menace']?>">
                                    <button type="submit" class="btn btn-primary btn-sm me-1">
                                        <i class="fa fa-solid fa-pencil"></i>
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
require_once "../footer.php";
?>