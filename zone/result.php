<?php require_once "../header.php";
$params = "";
$fonctionne = 1;
print_r($_POST);
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                switch ($_POST ['action']) :
                    case 'create' :
                        $sql = ("INSERT INTO zone (code_zone, libelle_zone, id_employe) VALUES (:code, :libelle, :id_employe)");
                        $params = [
                                ':code' => $_POST['code'],
                                ':libelle' => $_POST['libelle'],
                                ':id_employe' => $_POST['id_employe'],
                        ];
                        $phrase = 'créer';
                        break;
                    case 'update' :
                        $sql = ("UPDATE zone SET code_zone = :code, libelle_zone = :libelle, id_employe = :id_employe WHERE id_zone = :id_zone");
                        $params = [
                                ':id_zone' => $_POST['id_zone'],
                                ':code' => $_POST['code'],
                                ':libelle' => $_POST['libelle'],
                                ':id_employe' => $_POST['id_employe'],
                        ];
                        $phrase = 'mis à jour';
                        break;
                    case 'delete' :
                        $sql = ("DELETE FROM zone WHERE id_zone = :id_zone");
                        $params = [':id_zone' => $_POST['id_zone']];
                        $phrase = 'supprimer';
                        break;
                    default :
                        echo "<div class='alert alert-danger alert-dismissible' role='alert'>Erreur action introuvable</div>";
                        $fonctionne = 0;

                endswitch;
                if ($fonctionne != 0) {
                    try {
                        $stmt = $db->prepare($sql);
                        $stmt->execute($params);
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>L'zone à bien été $phrase </div>";
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger alert-dismissible' role='alert'>" . $e->getMessage() . "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>


<?php require_once "../footer.php";
