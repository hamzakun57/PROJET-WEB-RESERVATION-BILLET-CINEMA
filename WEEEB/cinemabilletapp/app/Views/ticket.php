<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Recherche Ticket</title>
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
                            <a class="nav-link" href="/seances">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Seances
                            </a>
                            <a class="nav-link" href="/ticket">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ticket
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main class="container mt-4">
                <h1 class="text-center mb-4 text-danger">Recherche de Réservation</h1>

                <!-- Formulaire de recherche -->
                <form action="<?= base_url('/ticket/search') ?>" method="post" class="mb-4">
                    <div class="form-group">
                        <label for="code_reservation">Code de Réservation</label>
                        <input type="text" name="code_reservation" id="code_reservation" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Chercher</button>
                </form>

                <!-- Affichage des résultats de la recherche -->
                <?php if (isset($ticket)): ?>
                    <h3 class="text-center text-success">Détails de la Réservation</h3>
                    <table class="table table-bordered table-striped table-hover mt-4">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom du Film</th>
                                <th>Prix</th>
                                <th>Séance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $ticket['nom_film']; ?></td>
                                <td><?= $ticket['prix']; ?> DH</td>
                                <td><?= $seance['date_heure']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-danger mt-4 text-center"><?= $error; ?></div>
                <?php endif; ?>
            </main>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
