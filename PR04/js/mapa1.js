var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat:41.399406, lng: 2.104716},
  });
}


function dirCasa() {
  var geocoder = new google.maps.Geocoder();
  var address = document.getElementById('direc_casa').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else if (document.getElementById('direc_casa').value=="") {
      alert('El campo casa no puede estar vacio');
      marker.setMap(null);
    }else{
      alert('No hemos encontrado el destino');
    }
  });
}

function dirTrabajo() {
  var geocoder = new google.maps.Geocoder();
  var address = document.getElementById('direc_trabajo').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else if(document.getElementById('direc_trabajo').value==""){
      alert('El campo trabajo no puede estar vacio');

    }else{
      alert('No hemos encontrado el destino');
    }
  });
}