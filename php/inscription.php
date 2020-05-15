<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require '../bdd/connexion_bdd.php';
    session_start();

    // Initialisation des variables
    $pseudo = "";
    $email = "";
    $passwd1 = "";
    $passwd2 = "";
    $passwd = "";

    // if 'register_btn' est clické
    if (isset($_REQUEST['register_btn'])) {
        if (isset($_POST['pseudo'],$_POST['email'], $_POST['passwd1'], $_POST['passwd2'])) {
            // recuperation des input
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $passwd1 = $_POST['passwd1'];
            $passwd2 = $_POST['passwd2'];

            // les différentes requetes pour verifier si le pseudo et l'email ne sont pas deja utilisé
            $request1 = $bd->query('SELECT pseudo FROM users WHERE pseudo = "' . $pseudo . '"');
            $request1 = $request1->fetch();
            $request2 = $bd->query('SELECT email FROM users WHERE email = "' . $email . '"');
            $request2 = $request2->fetch();

            if (!empty($pseudo) && strlen($pseudo) < 25 && $pseudo != $request1['pseudo']) {
                if (!empty($email) && $email != $request2['email']) {
                    if (!empty($passwd1) && !empty($passwd2)) {
                        if ((!($passwd1 != $passwd2) && !empty($passwd2))) {
                            //mdp crypté avant d'être envoyé à la bdd
                            $passwd = md5($passwd1);
                            // requête sql pour remplir la bdd
                            $data = [
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'passwd' => $passwd
                            ];
                            $request3 = "INSERT INTO users (pseudo, email, passwd) VALUES (:pseudo, :email, :passwd);";
                            $request3 = $bd->prepare($request3)->execute($data);
                            header('location:../php/note_utilisateur.php');
                        } else {
                            echo "<script type='text/javascript'>alert('Mots de passe non identiques')</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Mot de passe invalide')</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Email invalide')</script>";
                }
            } else {
                echo  "<script type='text/javascript'>alert('Pseudo invalide')</script>";
            }
        }
    }
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css"/>

    <title>Inscription</title>
</head>

<body>

<!-- Container -->
<div class="container">
    <h1>Veuillez vous inscrire pour accéder à la suite.</h1>
    <div class="inscription shadow-lg bg-white rounded">
        <h2 class="h2_co">Inscription</h2>
        <p class="h2_co">Veuillez remplir tous les champs.</p>
        <form action="inscription.php" method="post">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" name="pseudo" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="passwd1" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirmez le mot de passe</label>
                <input type="password" name="passwd2" class="form-control">
            </div>
            <div class="h2_co">
                <button type="submit" name="register_btn" class="btn btn-primary" value="S'inscrire">S'inscrire</button>
            </div>
            <div class="h2_co">
                <p>Déjà membre ? <a href="login_user.php">Se connecter</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>