<?php
require '../bdd/connexion.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HoodFuss</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">HoodFuss</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="../php/index.php">Accueil</a>
                <a class="nav-link" href="../php/note_utilisateur.php">Quartier</a>
                <a class="nav-link" href="../HTML/Map.html">Carte</a>
                <a class="nav-link active" href="../php/top.php">Top</a>
                <a class="nav-link" href="../php/inscription">S'enregistrer</a>
            </nav>
        </div>
    </header>

    <h4 class="cover-heading">Voici la liste des meilleurs quartiers :</h4>
    <ul>
        <li class="list-group">Nom : </li>
        <li class="list-group">Etoile :</li>
    </ul>
    <ul>
        <li class="list-group">Nom :</li>
        <li class="list-group">Etoile :</li>
    </ul>


    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>© Copyright 2020, Ynov</p>
        </div>
    </footer>
</div>
</body>
</html>