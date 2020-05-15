$.ajax({
    url: '../bdd/connexion_bdd.php', // my php file
    type: 'GET', // type of the HTTP request
    success: function (result) {
        console.log(result)
        //var obj = jQuery.parseJSON(result);
        //console.log(obj);
    }
});

let map = L.map("mapid").setView([44.8333, -0.5667], 13);
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    maxZoom: 18,
    minZoom: 1
}).addTo(map);

L.circle([44.8333, -0.5667], {
    color: "red",
    fillColor: '#f03',
    fillOpacity: 0.2,
    radius: 500
}).addTo(map).bindPopup('<h3>St-Michel</h3><p>Note: 5/5</p>')

L.circle([44.8633, -0.5667], {
    color: "red",
    fillColor: '#f03',
    fillOpacity: 0.2,
    radius: 500
}).addTo(map).bindPopup('<h3>Chartrons</h3><p>Note: 3/5</p>')

L.circle([44.8501073, -0.5799909], {
    color: "red",
    fillColor: "#f03",
    radius: 500,
    fillOpacity: 0.2
}).addTo(map).bindPopup('<h3>Fondaudége</h3><p>Note: 4/5</p>')

L.circle([44.8759425, -0.5483491], {
    color: "red",
    fillColor: "#f03",
    radius: 500,
    fillOpacity: 0.2
}).addTo(map).bindPopup('<h3>Bacalan</h3><p>Note: 3/5</p>')

L.circle([44.8373835,-0.5856761], {
    color: "red",
    fillColor: "#f03",
    radius: 500,
    fillOpacity: 0.2
}).addTo(map).bindPopup('<h3>Mériadeck</h3><p>Note: 2/5</p>')

L.circle([44.8260812,-0.5822204], {
    color: "red",
    fillColor: "#f03",
    radius: 500,
    fillOpacity: 0.2
}).addTo(map).bindPopup('<h3>St-Genés</h3><p>Note: 4/5</p>')