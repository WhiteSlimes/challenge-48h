<?php
require '../bdd/connexion_bdd.php';
session_start();

?>
<!Doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>HoodFuss</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet">
    </head>

    <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">HoodFuss</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="../php/index.php">Accueil</a>
                    <a class="nav-link active" href="../php/note_utilisateur.php">Quartier</a>
                    <a class="nav-link" href="../HTML/map.html">Carte</a>
                    <a class="nav-link" href="../php/top.php">Top</a>
                    <a class="nav-link" href="../php/inscription.php">S'enregistrer</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Bienvenue sur HoodFuss</h1>
            <p class="lead">Une application web pour noter le quartier dans lequel vous vous situez, pratique pour des utilisateurs qui veulent avoir des renseignements sur certain quartier (bruit, accessibilité, transports...)</p>
            <p class="lead">
                <a href="../php/inscription.php" class="btn btn-lg btn-secondary">En savoir plus</a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>© Copyright 2020, Ynov</p>
            </div>
        </footer>
    </div>
    </body>
</html>