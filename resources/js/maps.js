let map;
// initMap is now async
async function initMap() {
    // Request libraries when needed, not in the script tag.
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    // Short namespaces can be used.
    map = new Map(document.getElementById("map"), {
        center: { lat: -22.691801656111604, lng: -51.19844132429282 },
        zoom: 8,
    });
}

initMap();