<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Catalogue de Films</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
</head>
<body class="bg-dark text-white">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-success" href="#!">Cinema uiz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#!">About</a></li>
                </ul>
                <div class="d-flex justify-content-start align-items-center">
                    <form class="d-flex"> 
                        <button class="btn btn-outline-success" type="button" onclick="window.location.href='<?= base_url('/logout') ?>'">
                            <i class="bi-person-circle me-1"></i>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>
    <header class="bg-black" style="height: 100px;">
        <div class="container px-4 px-lg-5 d-flex align-items-center justify-content-center" style="height: 100%;">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder text-success">Catalogue de Films</h1>
            </div>
        </div>
    </header>

    <!-- Films Section -->
    <section class="py-1 bg-white">
        <div class="container px-4 px-lg-15 mt-10">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($films as $film): ?>
                    <div class="col mb-5">
                        <div class="card h-100 bg-dark text-white border-0">
                            <img class="card-img-top img-fluid" src="<?= base_url('uploads/' . $film['affiche']); ?>" alt="Affiche de <?= esc($film['nom_film']); ?>" style="height:350px; width: 100%; object-fit: cover;" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= esc($film['nom_film']); ?></h5>
                                    <p>Genre : <?= esc($film['genre']); ?></p>
                                    <p>Durée : <?= esc($film['duree']); ?> min</p>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-success mt-auto" href="/reserverFilm/<?= $film['id_film']; ?>">Réserver maintenant</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Cinema uiz</p></div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
