<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="estilos.css" />
    <script type="module" src="./index.js"></script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    
    <div id="map"></div>

    <!--
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises
      with https://www.npmjs.com/package/@googlemaps/js-api-loader.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU2V4MODTl1ivjUpFpwxd8o77DsuYh4Rw&callback=initMap&v=weekly"
      defer
    ></script>

    <script>
      function initMap() {
  // The location of Uluru
  const uluru = { lat: 19.40287, lng: -99.01571 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: uluru,
  });

  map.addListener('click', function(event) {
  var latLng = event.latLng;
  if (confirm('¿Es esta tu ubicación? Latitud: ' + latLng.lat() + ', Longitud: ' + latLng.lng())) {
    // Si el usuario confirma que esta es su ubicación, llama a la función getLocation() para obtener la geolocalización del punto seleccionado.
    getLocation(latLng);
  }
});


  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
function getLocation(latLng) {
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({'location': latLng}, function(results, status) {
    if (status === 'OK') {
      if (results[0]) {
        alert(results[0].formatted_address);
      } else {
        alert('No se encontró ninguna dirección para esta ubicación.');
      }
    } else {
      alert('Geocode falló debido a: ' + status);
    }
  });
}

window.initMap = initMap;
    </script>
  

</body>
</html>