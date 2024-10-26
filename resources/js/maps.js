let map;
// initMap is now async
async function initMap() {
    // Request libraries when needed, not in the script tag.
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const myLatlng = { lat: -23.326452152480098, lng: -51.18034835950851 };
    // Short namespaces can be used.
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: myLatlng,
        mapId: "DEMO_MAP_ID",
      });

    let table = $('#contatos').DataTable();

    table.on('click', 'tbody tr', function () {

        let data =  table.row(this).data();
        let latitude = data['latitude'];
        let longitude = data['longitude'];
        let nome = data['nome'];

        let marker = new google.maps.marker.AdvancedMarkerElement({
            position: new google.maps.LatLng(latitude, longitude),
            map: map,
            title: nome 
        });
        
        map.setCenter(marker.position);
    });
}

initMap();