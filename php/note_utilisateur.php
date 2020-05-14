<?php
    require '../bdd/connexion_bdd.php';
    session_start();

    // Initialisation des variables
    $quartier = "";
    $note = "";

    // if 'register_btn' est clické
    if (isset($_REQUEST['note_btn'])) {
        if (isset($_POST['quartier'],$_POST['note'])) {
            // recuperation des input
            $quatier = $_POST['quartier'];
            $note = $_POST['note'];

            if (!empty($quartier) && !empty($note)) {
                $data = [
                    'quartier' => $quartier,
                    'note' => $note,
                ];
                $request3 = "INSERT INTO users (pseudo, email, passwd) VALUES (:pseudo, :email, :passwd);";
                $request3 = $bd->prepare($request3)->execute($data);
                header('location:../html/NoteUtilisateur.html');
                echo  "<script type='text/javascript'>alert('Votre note à été ajoutée.')</script>";
            } else {
                echo  "<script type='text/javascript'>alert('Veuillez choisir un quartier et une note.')</script>";
            }
        }
    }
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
                    <a class="nav-link" href="index.html">Accueil</a>
                    <a class="nav-link active" href="NoteUtilisateur.html">Quartier</a>
                    <a class="nav-link" href="Map.html">Carte</a>
                    <a class="nav-link" href="Top.html">Top</a>
                    <a class="nav-link" href="#">S'enregistrer</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h2>Note ce quartier :</h2>
            <select name="pets" id="pet-select">
                <option value="" name="quartier">--Selectionner un quartier--</option>
                <option value="" name="quartier">quartier1</option>
                <option value="" name="quartier">quartier2</option>
                <option value="" name="quartier">quartier3</option>
                <option value="" name="quartier">quartier4</option>
                <option value="" name="quartier">quartier5</option>
                <option value="" name="quartier">quartier</option>
            </select>
			<div class="rating rating2"><!--
				--><a href="#5" title="Give 5 stars" name="5">★</a><!--
				--><a href="#4" title="Give 4 stars" name="4">★</a><!--
				--><a href="#3" title="Give 3 stars" name="3">★</a><!--
				--><a href="#2" title="Give 2 stars" name="2">★</a><!--
                --><a href="#1" title="Give 1 star" name="1">★</a>
                <button type="submit" name="note_btn">Valider</button>
			</div>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>© Copyright 2020, Ynov</p>
            </div>
        </footer>
    </div>
    </body>
</html>