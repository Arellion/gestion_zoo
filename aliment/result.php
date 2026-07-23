<?php require_once "../header.php";
$params = "";
$fonctionne = 1 ;
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                switch ($_POST ['action']) :
                    case 'create' :
                        $sql = ("INSERT INTO aliment (code_aliment, nom_aliment, stock_aliment) VALUES (:code, :nom, :stock)");
                        $params = [':code' => $_POST['code'],
                                ':nom' => $_POST['nom'],
                                ':stock' => $_POST['stock']
                        ];
                        $phrase = 'créer';
                        break;
                    case 'update' :
                        $sql = ("UPDATE aliment SET id_aliment = :id_aliment ,code_aliment = :code, nom_aliment = :nom, stock_aliment = :stock WHERE id_aliment = :id_aliment");
                        $params = [
                                ':id_aliment' => $_POST['id_aliment'],
                                ':code' => $_POST['code'],
                                ':nom' => $_POST['nom'],
                                ':stock' => $_POST['stock']
                        ];
                        $phrase = 'mis à jour';
                        break;
                    case 'delete' :
                        $sql = ("DELETE FROM aliment WHERE id_aliment = :id_aliment");
                        $params = [':id_aliment' => $_POST['id_aliment']];
                        $phrase = 'supprimer';
                        break;
                    default :
                        echo "<div class='alert alert-danger alert-dismissible' role='alert'>Erreur action introuvable</div>";
                        $fonctionne = 0 ;

                endswitch;
                if($fonctionne != 0) {
                    try {
                        $stmt = $db->prepare($sql);
                        $stmt->execute($params);
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>L'aliment à bien été $phrase </div>";
                        } catch (PDOException $e) {
                        echo "<div class='alert alert-danger alert-dismissible' role='alert'>" . $e->getMessage() ."</div>";
                    }
                        }
                ?>
            </div>
        </div>
    </div>


<?php require_once "../footer.php";
