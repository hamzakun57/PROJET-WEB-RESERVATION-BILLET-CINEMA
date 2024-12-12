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
                        <div class="sb-sidenav-menu-heading"></div>
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
            <main class="container mt-4">
    <h1 class="text-center mb-4 text-danger">Liste des Films</h1>
    <a href="/films/Ajouter" class="btn btn-danger mb-3">Ajouter un film</a>
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nom du Film</th>
                <th>Genre</th>
                <th>Durée</th>
                <th>Affiche</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= $film['nom_film']; ?></td>
                    <td><?= $film['genre']; ?></td>
                    <td><?= $film['duree']; ?> minutes</td>
                    <td>
                        <img src="<?= base_url('uploads/' . $film['affiche']); ?>" alt="Affiche de <?= $film['nom_film']; ?>" class="img-fluid" style="max-width: 100px;">
                    </td>
                    <td>
                        <a href="<?= base_url('films/details/' . $film['id_film']); ?>" class="btn btn-info">Détails</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
