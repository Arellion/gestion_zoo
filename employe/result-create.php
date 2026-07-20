<?php
require_once("../header.php");
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if (isset($_POST['nom']) && isset ($_POST['prenom']) && isset($_POST['poste'])) :
                if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['poste'])) :
                    ?>
                    <div class="alert alert-danger">
                        Erreur, un ou plusieurs champs sont vides
                    </div>
                <?php
                else :
                    try {
                        $sql = "INSERT INTO employe(nom_emp, prenom_emp, poste_emp) VALUES(:nom, :prenom, :poste)";
                        $stmt = $db->prepare($sql);
//                      protection contre les attaque à injection SQL
//                      trim supprime les espace en trop
                        $stmt->bindValue(':nom', trim($_POST['nom']));
                        $stmt->bindValue(':prenom', trim($_POST['prenom']));
                        $stmt->bindValue(':poste', trim($_POST['poste']));
                        $stmt->execute(); ?>
                        <div class="alert alert-success">
                            L'employé a bien été créé.
                        </div>
                        <?php
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }

                endif;
            else :
                ?>
                <div class="alert alert-danger">
                    Erreur, il manque un ou des champs !
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>