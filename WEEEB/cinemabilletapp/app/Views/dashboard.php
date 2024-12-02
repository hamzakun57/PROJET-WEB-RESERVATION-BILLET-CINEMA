<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Catalogue de films" />
    <meta name="author" content="Cinema uiz" />
    <title>Catalogue de Films - Cinema uiz</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        /* General styles */
        body {
            background-color: #000; /* Noir */
            color: #fff; /* Blanc */
            font-family: 'Arial', sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: #990000; /* Rouge foncé */
        }
        .navbar a {
            color: #fff;
        }
        .navbar a:hover {
            color: #ddd;
        }

        /* Header */
        header {
            background-image: url('<?= base_url("assets/cinema_bg.jpg"); ?>');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            height: 80px; /* Réduit la hauteur */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        header h1 {
            font-size: 2.5rem; /* Taille réduite */
            font-weight: bold;
        }

        /* Cards */
        .card {
            background-color: #111; /* Noir profond */
            border: 2px solid #990000; /* Rouge */
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(255, 0, 0, 0.6);
        }
        .card h5 {
            color: #ff0000; /* Rouge vif */
            font-weight: bold;
          
        }
        .card img {
            border-bottom: 2px solid #990000;
        }

        /* Buttons */
        .btn-outline-success {
            color: #fff;
            border-color: #ff0000; /* Rouge */
        }
        .btn-outline-success:hover {
            background-color: #ff0000;
            color: #fff;
        }

        /* Alerts */
        .alert-success {
            background-color: #ff0000; /* Rouge vif */
            color: #fff;
            border: none;
            border-radius: 0.5rem;
        }

        /* Footer */
        footer {
            background-color: #111; /* Noir profond */
            border-top: 3px solid #990000;
        }
        footer p {
            margin: 0;
            color: #fff;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand fw-bold" href="#!">Cinema uiz</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <button class="btn btn-outline-dark" type="button" onclick="window.location.href='<?= base_url('/choix') ?>'">
                        <i class="bi-person-circle me-1"></i>
                        Login / Register
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <h1>Catalogue de Films</h1>
    </header>

    <!-- Films Section -->
    <section class="py-0">
        <div class="container px-4 px-lg-15">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($films as $film): ?>
                    <div class="col mb-5">
                        <div class="card h-200">
                            <img class="card-img-top img-fluid" src="<?= base_url('uploads/' . $film['affiche']); ?>" alt="Affiche de <?= esc($film['nom_film']); ?>" style="height:350px; width: 100%; object-fit: cover;" />
                            <div class="card-footer text-center">
                                <a class="btn btn-outline-success mt-auto" href="/choix">Réserver maintenant</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container text-center">
            <p>&copy; Cinema uiz | Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
