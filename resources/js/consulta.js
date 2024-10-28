/**
 * @license
 * Copyright 2022 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
let map;
let marker;
let infoWindow;

async function initMap2() {
  // Request needed libraries.
  //@ts-ignore
  const [{ Map }, { AdvancedMarkerElement }] = await Promise.all([
    google.maps.importLibrary("marker"),
    google.maps.importLibrary("places"),
  ]);

  // Initialize the map.
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 40.749933, lng: -73.98633 },
    zoom: 13,
    mapId: "4504f8b37365c3d0",
    mapTypeControl: false,
  });

  //@ts-ignore
  const placeAutocomplete = new google.maps.places.PlaceAutocompleteElement();

  //@ts-ignore
  placeAutocomplete.id = "place-autocomplete-input";
  

  const card = document.getElementById("place-autocomplete-card");

  //@ts-ignore
  card.appendChild(placeAutocomplete);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);
  // Create the marker and infowindow
  marker = new google.maps.marker.AdvancedMarkerElement({
    map,
  });
  infoWindow = new google.maps.InfoWindow({});
  // Add the gmp-placeselect listener, and display the results on the map.
  //@ts-ignore
  placeAutocomplete.addEventListener("gmp-placeselect", async ({ place }) => {
    await place.fetchFields({
      fields: ["displayName", "formattedAddress", "addressComponents", "location"],
    });
    // If the place has a geometry, then present it on a map.
    if (place.viewport) {
      map.fitBounds(place.viewport);
    } else {
      map.setCenter(place.location);
      map.setZoom(17);
    }
    let content =
      '<div id="infowindow-content">' +
      '<span id="place-displayname" class="title">' +
      place.displayName +
      "</span><br />" +
      '<span id="place-address">' +
      place.formattedAddress +
      "</span>" +
      "</div>";

    updateInfoWindow(content, place.location, place.addressComponents);
    marker.position = place.location;
  });
}

// Helper function to create an info window.
function updateInfoWindow(content, center, address) {
  infoWindow.setContent(content);
  infoWindow.setPosition(center);
  infoWindow.open({
    map,
    anchor: marker,
    shouldFocus: false,
  });

  for (const component of address) {
        // @ts-ignore remove once typings fixed
        const componentType = component.types[0];
    
    switch (componentType) {
        case "street_number": {
            document.getElementById("numero").value = component.longText;
            break;
        }
    
        case "route": {
            document.getElementById("logradouro").value = component.longText;
            console.log( component.longText );
            break;
        } 
            case "postal_code": {
            document.getElementById("cep").value = component.longText;
            break;
        }
    
        case "sublocality_level_1": {
            document.getElementById("bairro").value = component.longText;
            break;
        }

        case "administrative_area_level_2":{
            document.getElementById("cidade").value = component.longText;
            break;
        }

        case "administrative_area_level_1": {
            document.getElementById("uf").value = component.shortText;
            break;
        }
      }
    }

    var latitude = document.getElementById('latitude');
    latitude.value = center.lat();

    var longitude = document.getElementById('longitude');
    longitude.value = center.lng();
}

initMap2();
