<?php
require_once "../header.php";
?>
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <div class="text-center">
                <h1>Liste des employés</h1>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href="<?= SITE_URL ?>/employe/create.php" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-circle-plus"></i>Ajouter un employé
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <table class="table table-hover">
            <thead>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Poste</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $stmt = $db->query(query: "SELECT * FROM employe");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $employe) :?>
                <tr>
                    <td><?= $employe['id_employe']; ?></td>
                    <td><?= $employe['nom_emp']; ?></td>
                    <td><?= $employe['prenom_emp']; ?></td>
                    <td><?= $employe['poste_emp']; ?></td>
                    <td><a class="link-primary" href="<?=SITE_URL ?>/employe/update.php?id=<?=$employe['id_employe']?>"><i class="fa-solid fa-pencil"></i></a> <a href="<?=SITE_URL ?>/employe/result-delete.php?id=<?=$employe['id_employe']?>" class="link-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\'employé?')"><i class="fa-solid fa-trash-alt"></i></td></a>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php
require_once "../footer.php";
?>
