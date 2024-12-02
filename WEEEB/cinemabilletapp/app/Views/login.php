<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #000; /* Fond noir */
            color: #fff; /* Texte blanc */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* S'adapte à la hauteur de la fenêtre */
        }
        .form-container {
            background-color: #1a1a1a; /* Fond gris foncé pour le formulaire */
            padding: 30px;
            border-radius: 15px; /* Arrondi des bords */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Ombre légère */
            max-width: 400px;
            width: 100%;
        }
        h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            letter-spacing: 1px; /* Espacement léger entre les lettres */
        }
        .form-control {
            background-color: #333; /* Fond gris foncé pour les champs */
            color: #fff;
            border: 1px solid #555; /* Bordure grise */
            border-radius: 8px; /* Arrondi des bords */
        }
        .form-control:focus {
            background-color: #444;
            border-color: #28a745; /* Bordure verte au focus */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.8); /* Légère ombre verte */
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 8px; /* Arrondi des boutons */
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Animation fluide */
        }
        .btn-primary:hover {
            background-color: #218838;
            transform: scale(1.02); /* Légère mise en relief au hover */
        }
        .alert {
            border-radius: 8px; /* Arrondi des alertes */
        }
        .alert-danger {
            background-color: #dc3545;
            color: #fff;
        }
        label {
            font-weight: bold;
        }
        .form-text {
            font-size: 0.9em;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Connexion</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="text" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">Veuillez entrer un email.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="invalid-feedback">Veuillez entrer un mot de passe.</div>
            </div>

            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>

    <!-- Lien vers Bootstrap JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Validation du formulaire Bootstrap
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
