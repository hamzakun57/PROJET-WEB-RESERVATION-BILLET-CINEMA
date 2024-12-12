<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Réservation de Film</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
    <style>
        /* Personnalisation des couleurs */
        body {
            background-color: #1c1c1c;
            color: white;
        }
        .navbar {
            background-color: #111;
        }
        .navbar-brand {
            color: #ff4d4d;
        }
        .navbar-toggler {
            border-color: #ff4d4d;
        }
        .navbar-toggler-icon {
            background-color: #ff4d4d;
        }
        .btn-outline-success {
            color: #ff4d4d;
            border-color: #ff4d4d;
        }
        .btn-outline-success:hover {
            background-color: #ff4d4d;
            color: white;
        }
        .card {
            background-color: #333;
            color: white;
        }
        .card-body, .card-footer {
            background-color: #222;
        }
        .alert {
            border-radius: 10px;
        }
        .footer {
            background-color: #111;
            color: white;
        }
        .form-control, .btn {
            border-radius: 8px;
        }
        h1, h2, h3 {
            color: #ff4d4d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container px-4 px-lg-5">
        <a class="navbar-brand ps-3" href="<?= base_url('/dashboard') ?>">Cinema Uiz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link text-white active" href="#!"></a></li>
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

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
    <?php endif; ?>

    <!-- Reservation Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Affiche du film à gauche -->
                <div class="col-md-4">
                    <img src="<?= base_url('uploads/' . esc($film['affiche'])); ?>" alt="Affiche du film" class="img-fluid rounded">
                </div>

                <!-- Détails du film à droite -->
                <div class="col-md-8">
                    <h1 class="display-4"><?= esc($film['nom_film']); ?></h1>
                    <p><strong>Genre:</strong> <?= esc($film['genre']); ?></p>
                    <p><strong>Durée:</strong> <?= esc($film['duree']); ?> min</p>

                    <!-- Formulaire de réservation -->
                    <form method="POST" action="/confirmerReservation">
                        <input type="hidden" name="nom_film" value="<?= esc($film['nom_film']); ?>" />
                        <input type="hidden" name="id_film" value="<?= esc($film['id_film']); ?>" />

                        <!-- Sélection de la séance -->
                        <div class="form-group mb-3">
                            <label for="seance">Séance</label>
                            <select name="seance" class="form-control" id="seance" onchange="updatePlacesAndPrice(this)">
                                <option value="" disabled selected>Choisir une séance</option>
                                <?php foreach ($seances as $seance): ?>
                                <option value="<?= $seance['id_seance']; ?>" data-prix="<?= $seance['prix']; ?>">
                                    <?= $seance['date_heure']; ?> (Places restantes: <?= $seance['places_disponibles']; ?>)
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Affichage du prix -->
                        <div class="form-group mb-3">
                            <label for="prix">Prix de la Séance</label>
                            <input type="text" class="form-control" id="prix" name="prix" readonly />
                        </div>

                        <!-- Sélection de la place -->
                        <div class="form-group mb-3">
                            <label for="place">Place</label>
                            <select name="place" class="form-control" id="place" required></select>
                        </div>

                        <button type="submit" class="btn btn-danger mt-3">Confirmer la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 footer">
        <div class="container"><p class="m-0 text-center">Copyright &copy; Cinema uiz</p></div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script pour mettre à jour les places disponibles et afficher le prix -->
    <script>
        function updatePlacesAndPrice(seanceSelect) {
            const selectedOption = seanceSelect.options[seanceSelect.selectedIndex];
            const prix = selectedOption.getAttribute('data-prix');
            const prixInput = document.getElementById('prix');
            prixInput.value = prix;  // Mettre à jour le champ du prix

            fetch(`/getAvailablePlaces/${seanceSelect.value}`)
                .then(response => response.json())
                .then(data => {
                    let placeSelect = document.getElementById('place');
                    placeSelect.innerHTML = '';  // Vider les options précédentes
                    if (data.length > 0) {
                        data.forEach(place => {
                            let option = document.createElement('option');
                            option.value = place;
                            option.textContent = `Place ${place}`;
                            placeSelect.appendChild(option);
                        });
                    } else {
                        let option = document.createElement('option');
                        option.textContent = "Aucune place disponible";
                        placeSelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Erreur lors du chargement des places:', error));
        }
    </script>
</body>
</html>
