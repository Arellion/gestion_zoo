<?php
require_once "../header.php";
?>
<link rel="stylesheet" href="../style.css">
<div class="container temp">
    <div class="text-center">
        <h1>Liste des employés</h1>
    </div>
    <div>
        <a href="#" class="btn btn-sm btn-primary">
            <i class="fa-solid fa-circle-plus"></i>Ajouter un employé
        </a>
    </div>
    <div>
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
                $stmt =$db->query(query: "SELECT * FROM employe");
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $employe) :?>
                    <!--HTML-->
                <tr>
                    <td><?= $employe['id_employe'];?></td>
                    <td><?= $employe['nom_emp'];?></td>
                    <td><?= $employe['prenom_emp'];?></td>
                    <td><?= $employe['poste_emp'];?></td>
                    <td><i class="fa-solid fa-pencil"></i> </td>

                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once "../footer.php";
?>
