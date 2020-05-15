<?php
$posteur = $bdd->quote($_SESSION['id']);
$id_actualite= $bdd->quote($_GET['id']);
$getNewsQuery = $bdd->query("SELECT * FROM `note` WHERE posteur=$posteur AND id_actualite=$id_actualite");
if( $getNewsQuery->fetch() !== false )
{ 
   // Le visiteur a déjà voté car on a trouvé un enregistrement
 }
else
{
   echo '<div class="rating rating2">
        --><a href="?mod=actualite&id='.$_GET['id'].'&stars=5" title="Donner 5/5">★</a><!--
        --><a href="?mod=actualite&id='.$_GET['id'].'&stars=4" title="Donner 4/5">★</a><!--
        --><a href="?mod=actualite&id='.$_GET['id'].'&stars=3" title="Donner 3/5">★</a><!--
        --><a href="?mod=actualite&id='.$_GET['id'].'&stars=2" title="Donner 2/5">★</a><!--
        --><a href="?mod=actualite&id='.$_GET['id'].'&stars=1" title="Donner 1/5">★</a>
    </div>';
}
if (isset ($_GET['id'])&& isset ($_GET['stars'])){
                $posteur = $_SESSION['id'];
                $id_actualite= $_GET['id'];
                $note = $_GET['stars'];
$getVoteJoueur = $bdd->query("SELECT * FROM `note` WHERE posteur=$posteur AND id_actualite=$id_actualite");
if( $getVoteJoueur->fetch() !== false )
{ 
   // Le membrea déjà voté
 }
            else
{
                $addnote = $bdd->prepare("INSERT INTO `note` VALUES ('', ?, ?, ?)");
                $addnote->execute(array($posteur, $id_actualite, $note));   
    echo '<div id="infos"><p style="color:green;text-align:center;">Votre note a bien été pris en compte !</p></div>';     
}
}
?>