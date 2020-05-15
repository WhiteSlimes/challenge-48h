<?php
    require '../bdd/connexion_bdd.php';
    session_start();

    // Initialisation des variables
    $quartier = "";
    $note = "";

    // if 'note_btn' est clické
    if (isset($_REQUEST['note_btn'])) {
        if (isset($_POST['quartier'],$_POST['note'])) {
            // recuperation des input
            $quatier = $_POST['quartier'];
            $note1 = $_GET['id'];
            $note2 = $_GET['id'];
            $note3 = $_GET['id'];
            $note4 = $_GET['id'];
            $note5 = $_GET['id'];

            if (!empty($quartier) && !empty($note1) && empty($note2) && empty($note3) && empty($note4) && empty($note5)){
                $note = '1';
                add_note();
            } else if (!empty($quartier) && !empty($note2) && empty($note3) && empty($note4) && empty($note5)){
                $note = '2';
                add_note();
            } else if (!empty($quartier) && !empty($note3) && empty($note4) && empty($note5)) {
                $note = '3';
                add_note();
            } else if (!empty($quartier) && !emtpy($note4) && empty($note5)) {
                $note = '4';
                add_note();
            } else if (!empty($quartier) && !emtpy($note5)) {
                $note = '5';
                add_note();
            } else {
                echo "<script type='text/javascript'>alert('Veuillez choisir un quartier et une note.')</script>";
            }
        }
    }

    function add_note() {
        $data = [
            'quartier' => $quartier,
            'note' => $note,
        ];
        $request3 = "INSERT INTO users (pseudo, email, passwd) VALUES (:pseudo, :email, :passwd);";
        $request3 = $bd->prepare($request3)->execute($data);
        header('location:../php/note_utilisateur.php');
        echo  "<script type='text/javascript'>alert('Votre note à été ajoutée.')</script>";
    }

    function add_note_moy() {
        $note = intval($note);
        if ($note == 1) {

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
                    <a class="nav-link" href="../php/index.php">Accueil</a>
                    <a class="nav-link active" href="../php/note_utilisateur.php">Quartier</a>
                    <a class="nav-link" href="../HTML/Map.html">Carte</a>
                    <a class="nav-link" href="../php/top.php">Top</a>
                    <a class="nav-link" href="../php/inscription.php">S'enregistrer</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h2>Notez votre quartier :</h2>
            <select name="pets" id="pet-select">
                <option value="" name="quartier">--Selectionner votre quartier--</option>
                <option value="" name="quartier">Saint-Michel</option>
                <option value="" name="quartier">Fondaudège</option>
                <option value="" name="quartier">Chartrons</option>
                <option value="" name="quartier">Bacalan</option>
                <option value="" name="quartier">Mériadeck</option>
                <option value="" name="quartier">Saint-Genès</option>
            </select>
			<div class="rating rating2"><!--
				--><a href="#5?id='5'" title="Give 5 stars" name="5">★</a><!--
				--><a href="#4?id='4'" title="Give 4 stars" name="4">★</a><!--
				--><a href="#3?id='3'" title="Give 3 stars" name="3">★</a><!--
				--><a href="#2?id='2'" title="Give 2 stars" name="2">★</a><!--
                --><a href="#1?id='1'" title="Give 1 star" name="1">★</a>
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