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
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('/films') ?>">Cinema Uiz</a>
            <!-- Navbar-->
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
                            
                            <a class="nav-link" href="/films" a-expanded="false" aria-controls="collapseLayouts">
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
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main class="container mt-5">
    <h3 class="text-center mb-4 text-danger">Ajouter un Film</h3>

    <form action="/films/Ajouter" method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label for="nom_film" class="form-label">Nom du Film :</label>
            <input type="text" name="nom_film" id="nom_film" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="genre" class="form-label">Genre :</label>
            <input type="text" name="genre" id="genre" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="duree" class="form-label">Durée :</label>
            <input type="text" name="duree" id="duree" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="affiche" class="form-label">Affiche :</label>
            <input type="file" name="affiche" id="affiche" class="form-control" required>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Ajouter Film</button>
        </div>
    </form>
</main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Cinema Uiz</div>
                            <div>
                                <a href="#"> </a>
                            
                                <a href="#"> </a>
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
