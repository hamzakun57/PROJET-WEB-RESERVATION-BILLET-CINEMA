<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><style>
        /* Style de base de la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Conteneur principal */
        .container {
            text-align: center;
        }

        /* Effet de flou sur toute la page */
        .blur-effect {
            filter: blur(5px);
            pointer-events: none; /* Empêche l'interaction avec la page floue */
        }

        /* Style du widget utilisateur */
        .user-widget {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 300px;
            padding: 20px;
            z-index: 1000;
            text-align: left;
        }

        /* Style du bouton de fermeture */
        .close-btn {
            display: block;
            margin-left: auto;
            cursor: pointer;
            font-size: 16px;
            color: #aaa;
            padding: 2px;
            text-align: right;
        }

        /* Arrière-plan sombre en mode flou */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <form class="d-flex ms-4">
        <button class="btn btn-outline-dark" type="button" onclick="showUserWidget()">
            <i class="bi-person me-1"></i>
        </button>
    </form>
</div>

<!-- Overlay pour l'effet de flou -->
<div class="overlay" id="overlay"></div>

<!-- Widget utilisateur -->
<div class="user-widget" id="userWidget">
    <span class="close-btn" onclick="hideUserWidget()">✕</span>
    <h3>Nom d'utilisateur</h3>
    <p>Email: user@example.com</p>
</div>

<script>
    function showUserWidget() {
        // Activer le flou et l'overlay
        document.querySelector('.container').classList.add('blur-effect');
        document.getElementById('overlay').style.display = 'block';
        
        // Afficher le widget utilisateur
        document.getElementById('userWidget').style.display = 'block';
    }

    function hideUserWidget() {
        // Désactiver le flou et l'overlay
        document.querySelector('.container').classList.remove('blur-effect');
        document.getElementById('overlay').style.display = 'none';
        
        // Masquer le widget utilisateur
        document.getElementById('userWidget').style.display = 'none';
    }
</script>

</body>
</body>
</html>