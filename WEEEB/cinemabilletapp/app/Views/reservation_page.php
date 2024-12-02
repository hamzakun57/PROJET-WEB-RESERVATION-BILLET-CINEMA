<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Réservation de Film</title>
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
                    <img src="<?= base_url('uploads/' . esc($film['affiche'])); ?>" alt="Affiche du film" class="img-fluid" />
                </div>

                <!-- Détails du film à droite -->
                <div class="col-md-8">
                    <h1><?= esc($film['nom_film']); ?></h1>
                    <p>Genre: <?= esc($film['genre']); ?></p>
                    <p>Durée: <?= esc($film['duree']); ?> min</p>

                    <!-- Message d'erreur s'il y a une erreur -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/confirmerReservation">
                    <input type="hidden" name="nom_film" value="<?= esc($film['nom_film']); ?>" /> <!-- Champ caché pour le nom du film -->

                    <input type="hidden" name="id_film" value="<?= esc($film['id_film']); ?>" />
                        <!-- Sélection de la séance -->
                        <div class="form-group">
                            <label for="seance">Séance</label>
                     <select name="seance" class="form-control" id="seance" onchange="updatePlaces(this.value)">
    <option value="" disabled selected>Choisir une séance</option> <!-- Option par défaut -->
    <?php foreach ($seances as $seance): ?>
        <option value="<?= $seance['id_seance']; ?>">
            <?= $seance['date_heure']; ?> (Places restantes: <?= $seance['places_disponibles']; ?>)
        </option>
    <?php endforeach; ?>
</select>
           </div>
                        <div class="form-group">
                            <label for="place">Place</label>
                            <select name="place" class="form-control" id="place" required>
                                <!-- Les places seront insérées ici via JavaScript -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Confirmer la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Cinema uiz</p></div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script pour mettre à jour les places disponibles -->
    <script>
function updatePlaces(seanceId) {
    // Ajouter un message de log pour vérifier que la fonction est bien appelée
    console.log("Séance sélectionnée :", seanceId);

    fetch(`/getAvailablePlaces/${seanceId}`)
        .then(response => response.json())
        .then(data => {
            console.log("Places disponibles reçues :", data); // Debug: Affiche les places disponibles
            let placeSelect = document.getElementById('place');
            placeSelect.innerHTML = ''; // Réinitialiser la liste des places

            // Vérifier si des places sont disponibles
            if (data.length > 0) {
                data.forEach(place => {
                    let option = document.createElement('option');
                    option.value = place;
                    option.textContent = `Place ${place}`;
                    placeSelect.appendChild(option);
                });
            } else {
                // Afficher un message si aucune place n'est disponible
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
