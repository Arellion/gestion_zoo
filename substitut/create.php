<?php require_once('../header.php');
$sql = "SELECT * FROM aliment WHERE id_aliment = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$_POST['id']]);
$aliment_base = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT substituer.id_aliment_substitue, sub.nom_aliment as nom_aliment_substitue, sub.code_aliment as code_aliment_substitue FROM substituer ";
$sql .= "INNER JOIN aliment sub ON substituer.id_aliment_substitue = sub.id_aliment ";
$sql .= "WHERE substituer.id_aliment_base = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$_POST['id']]);
$substituts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->query("SELECT * FROM aliment");
$aliments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ids_aliments_substitut = array();
$ids_aliments_substitut[] = $aliment_base['id_aliment'];
foreach ($substituts as $sub) :
    $ids_aliments_substitut[] = $sub['id_aliment_substitue'];
endforeach;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card h-100">
                    <div class="card-header">
                        Ajouter un substitut à <?= $aliment_base['nom_aliment'] ?? ""; ?>
                    </div>
                    <form action="<?= SITE_URL; ?>/substitut/result.php" method="POST">
                        <div class="card-body">
                            <select name="id_substitut" class="form-select">
                                <option selected disabled value="">-- Choisir un aliment de substitution --</option>
                                <?php
                                foreach ($aliments as $aliment):
                                    if (!in_array($aliment['id_aliment'],
                                            $ids_aliments_substitut)) :?>
                                        <option value="<?= $aliment['id_aliment']; ?>">
                                            <?= $aliment['nom_aliment']; ?>
                                        </option>
                                    <?php endif;
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="card-footer d-grid">
                            <input type="hidden" name="id_aliment_base" value="<?= $aliment_base['id_aliment']; ?>">
                            <button type="submit" class="btn btn-outline-primary " name="action" value="create">Créer le
                                substitut
                            </button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header">
                        Liste des substituts existant
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            if (count($substituts) > 0) :
                                foreach ($substituts as $sub): ?>
                                    <li class="list-group-itemb d-flex justify-content-between">
                                        <div>
                                            <?= $sub['nom_aliment_substitue']; ?>
                                        </div>
                                        <div>
                                            <form action="<?= SITE_URL ?>/substitut/result.php" method="post">
                                                <input name="id_aliment_base" value="<?= $aliment_base['id_aliment']; ?>" type="hidden">
                                                <input name="id_substitut" value="<?= $sub['id_aliment_substitue']; ?>" type="hidden">
                                                <button class="btn btn-danger rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 25px; height: 25px" type="submit" name="action" value="delete"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                <?php endforeach;
                            else:
                                echo "Aucun substitut";
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../footer.php'); ?>