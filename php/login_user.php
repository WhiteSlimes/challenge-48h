<?php
require '../bdd/connexion_bdd.php';
session_start();

// Initialisation des variables
    $email = "";
    $passwd = "";
    $request1 = "";
    $request1bis = "";
    $request2 = "";
    $request2bis = "";

    if (isset($_REQUEST['login_btn'])) {
        if (isset($_POST['email'], $_POST['passwd'])) {

            global $bd, $email, $role, $passwd, $request1, $request1bis, $request2, $request2bis;
            // recuperation des input
            $email = $_POST['email'];
            $passwd = md5($_POST['passwd']);

            // les différentes requetes pour verifier si le pseudo et l'email correspondent bien
            $request1 = $bd->query('SELECT email FROM users WHERE email = "'.$email.'"');
            $request1bis = $request1->fetch();
            $request2 = $bd->query('SELECT passwd FROM users WHERE passwd = "'.$passwd.'"');
            $request2bis = $request2->fetch();

            // verifier que les champs ne soient pas vides
            if (!empty($email) && !empty($passwd)) {
                // verifier si l'email correspond
                if ($email == $request1bis['email'] && $passwd == $request2bis['passwd']) {
                    $_SESSION['user'];
                    header('location:../note/accueil.php');
                } else {
                    echo "<script type='text/javascript'>alert('Email ou Mot de passe invalide')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Veuillez remplir tous les champs')</script>";
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

    <title>Connexion</title>
</head>

<body>

<!-- Container -->
<div class="container">
    <div class="connexion shadow-lg bg-white rounded">
        <h2 class="h2_co">Connexion</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="passwd" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="h2_co">
                <button type="submit" class="btn btn-primary" name="login_btn">Se connecter</button>
            </div>
            <div class="h2_co">
                <p>Pas encore membre ? <a href="register.php">S'enregistrer</a></p>
            </div>
        </form>
    </div>
</div>
</body>

</html>