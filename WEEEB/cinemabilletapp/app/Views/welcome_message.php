<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            background-color: #000; /* Fond noir */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff; /* Texte blanc pour le contraste */
        }
        .container {
            background-color: #333; /* Fond gris foncé */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #28a745; /* Vert pour le titre */
        }
        p {
            color: #bbb; /* Texte légèrement gris pour le contraste */
        }
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #28a745; /* Vert pour les boutons */
            color: #fff; /* Texte blanc */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #1e7e34; /* Vert plus foncé au survol */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Bienvenue !</h1>
        <p>Choisissez une option :</p>
        <a href="/login">Se connecter</a><br>
        <a href="/register">S'inscrire</a>
    </div>

</body>
</html>
