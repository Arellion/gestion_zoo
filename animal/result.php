<?php require_once("../header.php");

?>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $sql = "";
                $params = [];
                $phrase_reussite = "L'animal a bien été ";
                if (!empty($_POST['action'])) :
                    switch ($_POST['action']) :
                        case 'create' :
                            $sql="INSERT INTO animal(nom_animal, date_arrive_animal, date_naissance_animal, sexe_animal, commentaire_animal, id_espece, id_zone) VALUES(:nom, :arrive, :naissance, :sexe, :commentaire, :id_espece, :id_zone)";
                            $params = [
                                ':nom' => $_POST['nom'],
                                ':arrive' => ($_POST['date_arrive']),
                                ':naissance' => !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : NULL,
                                ':sexe' => $_POST['sexe'],
                                ':commentaire' => !empty($_POST['commentaire']) ? $_POST['commentaire'] : NULL,
                                ':id_espece' => $_POST['id_espece'],
                                ':id_zone' => $_POST['id_zone']
                            ];
                            $phrase_reussite .= "ajoutée.";
                            break;
                        case 'update' :
                            $sql="UPDATE animal SET nom_animal = :nom, date_arrive_animal = :arrive, date_naissance_animal = :naissance, sexe_animal = :sexe, commentaire_animal = :commentaire, id_espece = :id_espece, id_zone = :id_zone WHERE id_animal = :id";
                            $params = [
                                    ':nom' => $_POST['nom'],
                                    ':arrive' => ($_POST['date_arrive']),
                                    ':naissance' => !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : NULL,
                                    ':sexe' => $_POST['sexe'],
                                    ':commentaire' => !empty($_POST['commentaire']) ? $_POST['commentaire'] : NULL,
                                    ':id_espece' => $_POST['id_espece'],
                                    ':id_zone' => $_POST['id_zone'],
                                    ':id' => $_POST['id']
                            ];
                            $phrase_reussite .= "modifiée.";
                            break;
                        case 'delete' :
                            $sql="DELETE FROM animal WHERE id_animal = :id";
                            $params = [':id' => $_POST['id']];
                            $phrase_reussite .= "supprimée.";
                            break;
                        default :
                            echo "action inconnue";
                            break;
                    endswitch;
                endif;
                if(!empty($sql)) :
                    try{
                        $stmt = $db->prepare($sql);
                        $stmt->execute($params);
                        echo "<div class='alert alert-success'>$phrase_reussite</div>";
                    } catch(PDOException $e){
                        echo "<div class='alert alert-danger'>" . $e->getMessage() ."</div>";
                    }
                endif;
                ?>
            </div>
        </div>
    </div>
<?php require_once("../footer.php"); ?>