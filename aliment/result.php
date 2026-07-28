<?php require_once("../header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $sql = "";
                $params = [];
                $phrase_reussite = "L'aliment à bien été ";
                if (!empty($_POST['action'])) :
                    switch ($_POST['action']) :
                        case 'create' :
                            $sql="INSERT INTO aliment(code_aliment, nom_aliment, stock_aliment) VALUES(:code, :nom, :stock)";
                            $params = [
                                    ':code' => $_POST['code'],
                                    ':nom' => $_POST['nom'],
                                    ':stock' => $_POST['stock']
                            ];
                            $phrase_reussite .= "ajoutée.";
                            break;
                        case 'update' :
                            $sql="UPDATE aliment SET code_aliment = :code,nom_aliment = :nom,stock_aliment = :stock  WHERE id_aliment = :id";
                            $params = [
                                    ':code' => $_POST['code'],
                                    ':nom' => $_POST['nom'],
                                    ':stock' => $_POST['stock'],
                                    ':id' => $_POST['id']
                            ];
                            $phrase_reussite .= "modifiée.";
                            break;
                        case 'delete' :
                            $sql="DELETE FROM aliment WHERE id_aliment = :id";
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