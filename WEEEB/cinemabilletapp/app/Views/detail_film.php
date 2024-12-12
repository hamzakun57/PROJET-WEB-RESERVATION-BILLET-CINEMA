<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/stylesadmin.css'); ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="<?= base_url('/films') ?>">Cinema Uiz</a>
            <form class="d-flex">
                <button class="btn" style="background-color: #28a745; color: white; border: none; margin-left: 910px" type="button" onclick="window.location.href='<?= base_url('/logout') ?>'">
                    <i class="bi-person-circle me-2"></i>
                    Déconnexion
                </button>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                
                            <a class="nav-link" href="<?= base_url('/films') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Films
                            </a>
                            <a class="nav-link" href="/seances" a-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Seances
                            </a>
                            <a class="nav-link" href="/ticket" a-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ticket
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main class="container mt-5">
    <h1 class="text-center mb-4 text-danger">Détails du Film</h1>

    <?php if ($film): ?>
        <div class="row">
            <!-- Informations du film à gauche avec les boutons Modifier et Supprimer en haut -->
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Boutons Modifier et Supprimer -->
                    <div>
                        <a href="<?= base_url('films/Modifier/' . $film['id_film']); ?>" class="btn btn-primary me-3">Modifier</a>
                        <a href="<?= base_url('films/Supprimer/' . $film['id_film']); ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>

                <!-- Informations du film -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= $film['nom_film']; ?></h5>
                        <p class="card-text"><strong>Genre:</strong> <?= $film['genre']; ?></p>
                        <p class="card-text"><strong>Durée:</strong> <?= $film['duree']; ?> minutes</p>
                    </div>
                </div>
            </div>

            <!-- Affiche du film à droite -->
            <div class="col-md-4 text-center">
                <img src="<?= base_url('uploads/' . $film['affiche']); ?>" alt="Affiche de <?= $film['nom_film']; ?>" class="img-fluid mb-4" style="max-width: 100%; height: auto;">
            </div>
        </div>
    <?php else: ?>
        <p class="text-center text-warning">Film non trouvé</p>
    <?php endif; ?>
</main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
