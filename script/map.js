let map = L.map("mapid").setView([44.8333, -0.5667], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        maxZoom: 18,
        minZoom: 1
    }).addTo(map);



        
            
    L.circle([44.8333, -0.5667],{
        color: "red",
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map).bindPopup('<p>Note: 4/5</p>')

    L.circle([44.8633, -0.5667],{
        color: "red",
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map).bindPopup('<p>Note: 4/5</p>')
        
    

    
        
    
    
    