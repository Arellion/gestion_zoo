<!DOCTYPE html>
<html>
<?php require_once("config.inc.php"); ?>
<head>
    <title>Zoologik</title>
    <link rel="stylesheet" href="style.css">
    <!--        bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous">
    </script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
            integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<header class="mb-3">
                <!---TODO: LE MENU--->
                <nav class="navbar navbar-expand-lg bg-success-subtle shadow p-3">
                    <div class="container">
                        <a class="navbar-brand" href="<?= SITE_URL ?>">Zoologik</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= SITE_URL ?>"> <i class="fa-solid fa-house"></i> Accueil</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-people-group"></i> Employé
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/employe/liste.php">Liste des
                                                employés</a></li>
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/employe/create.php">Ajouter
                                                des employés</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-skull"></i> Menace
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/menace/liste.php">Liste des
                                                menace</a></li>
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/menace/create-update.php">Ajouter
                                                des menace</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-utensils"></i> Aliment
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/aliment/liste.php">Liste des aliments</a></li>
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/aliment/create-update.php">Ajouter
                                                des aliments</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-skull"></i> Famille
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/famille/liste.php">Liste des
                                                familles</a></li>
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/famille/create-update.php">Ajouter
                                                des familles</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-skull"></i> Geographie
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/geographie/liste.php">Liste des
                                                geographies</a></li>
                                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/geographie/create-update.php">Ajouter
                                                des geographies</a></li>

                                    </ul>
                                </li>
                        </div>
                    </div>
                </nav>

</header>
<body>
<?php
try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
</body>
</html>