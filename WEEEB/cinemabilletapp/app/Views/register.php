<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            max-width: 500px;
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
        .alert-success {
            background-color: #28a745;
            color: #fff;
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
        <h2>Inscription</h2>

        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <form action="/register" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= old('username'); ?>" required>
                <div class="invalid-feedback">Veuillez entrer un nom d'utilisateur.</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= old('email'); ?>" required>
                <div class="invalid-feedback">Veuillez entrer un email valide.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="invalid-feedback">Veuillez entrer un mot de passe.</div>
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmer le mot de passe :</label>
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
                <div class="invalid-feedback">Veuillez confirmer le mot de passe.</div>
            </div>

            <button type="submit" class="btn btn-primary">S'inscrire</button>
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
