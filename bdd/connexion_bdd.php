<?php
$servername = "db5000452337.hosting-data.io";
$username = "dbu261201";
$password = "Challenge123!";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dbs432740", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


function inscription(){
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
                            header('location:../pages/accueil.php');
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
}

/* fonction pour supprimer une note */
// function delete_note(){
//     // Supprimer note
//     if (isset($_GET['idNote'])) {
//         $id = $_GET['idNote'];
//         try {
//             $request = "DELETE FROM ?? WHERE id?=?";
//             $requestrun = $bd->prepare($request);
//             $requestrun->execute(array($id));
//             header('location:../admin/index.php');
//             echo '<script type="text/javascript">alert("Note supprimée")</script>';
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//     }
// }

/* fonction pour sajouter une note */
// function add_note(){

// }

?>