<?php require_once "../header.php";
$params = "";
$fonctionne = 1 ;
print_r($_POST);
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                switch ($_POST ['action']) :
                    case 'create' :
                        $sql = ("INSERT INTO substituer (id_aliment_base, id_aliment_substitue) VALUES (:id_aliment_base, :id_aliment_substitue)");
                        $params = [':id_aliment_base' => $_POST['id_aliment_base'],
                            ':id_aliment_substitue' => $_POST['id_substitut'],
                        ];
                        $phrase = 'créer';
                        break;
                    case 'delete' :
                        $sql = ("DELETE FROM substituer WHERE id_aliment_base = :id_aliment_base AND id_aliment_substitue = :id_aliment_substitue");
                        $params = [':id_aliment_base' => $_POST['id_aliment_base'],
                        $params = ':id_aliment_substitue' => $_POST['id_substitut']];
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
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Le substitut à bien été $phrase </div>";
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger alert-dismissible' role='alert'>" . $e->getMessage() ."</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>


<?php require_once "../footer.php";
