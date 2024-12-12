<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ajouter une séance</title>
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
            <main class="container mt-4">
    <h1 class="text-center mb-4 text-danger">Ajouter une Séance</h1>
    <form method="post" action="<?= base_url('/seances/ajouter') ?>" class="border p-4 shadow-sm rounded">
        <div class="mb-3">
            <label for="film" class="form-label">Nom du Film</label>
            <select id="film" name="id_film" class="form-select">
                <option value="" disabled selected>Sélectionner un film</option>
                <?php foreach ($films as $film): ?>
                    <option value="<?= $film['id_film']; ?>"><?= $film['nom_film']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="date_heure" class="form-label">Date et Heure de la Séance</label>
            <input type="datetime-local" id="date_heure" name="date_heure" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="places_disponibles" class="form-label">Nombre de Places Disponibles</label>
            <input type="number" id="places_disponibles" name="places_disponibles" class="form-control" value="50" min="1" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <select name="prix" id="prix" class="form-select" required>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Ajouter la Séance</button>
    </form>
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
    </body>
</html>
