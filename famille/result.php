<?php require_once("../header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $sql = "";
                $params = [];
                $phrase_reussite = "La famille a bien été ";
                if (!empty($_POST['action'])) :
                    switch ($_POST['action']) :
                        case 'create' :
                            $sql="INSERT INTO famille(code_famille, libelle_famille) VALUES(:code, :libelle)";
                            $params = [
                                ':code' => $_POST['code'],
                                ':libelle' => $_POST['libelle']
                            ];
                            $phrase_reussite .= "ajoutée.";
                            break;
                        case 'update' :
                            $sql="UPDATE famille SET code_famille = :code, libelle_famille = :libelle WHERE id_famille = :id";
                            $params = [
                                ':code' => $_POST['code'],
                                ':libelle' => $_POST['libelle'],
                                ':id' => $_POST['id']
                            ];
                            $phrase_reussite .= "modifiée.";
                            break;
                        case 'delete' :
                            $sql="DELETE FROM famille WHERE id_famille = :id";
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