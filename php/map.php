<?php
require '../php/connexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HoodFuss</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">HoodFuss</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="../php/index.php">Accueil</a>
            <a class="nav-link active" href="../php/note_utilisateur.php">Quartier</a>
            <a class="nav-link" href="../php/map.php">Carte</a>
            <a class="nav-link" href="../php/top.php">Top</a>
            <a class="nav-link" href="../php/inscription.php">S'enregistrer</a>
        </nav>
    </div>
</header>
    <div id="mapid" style="height: 700px;"></div>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script>let map = L.map("mapid").setView([44.8333, -0.5667], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        maxZoom: 18,
        minZoom: 1
    }).addTo(map);



        function onMapClick(e) {
            console.log(e.latlng)
            
            L.circle([e.latlng.lat, e.latlng.lng],{
                color: "red",
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map)
        }
        
    
    map.on('click', onMapClick);
    
    

    </script>
</body>
</html>