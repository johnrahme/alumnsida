<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Geocoding service</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBijeQ-xvwSxYXl_g4e49zaLrlqCMm0_E4&sensor=false"></script>
    <script>
var geocoder;
var map;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var mapOptions = {
    zoom: 12,
    center: latlng
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var address = '{{$event->place}}'
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var contentString = '<div id="content">'+
              '<div id="siteNotice">'+
              '</div>'+
              '<h1 id="firstHeading" class="firstHeading">{{$event->name}}</h1>'+
              '<div id="bodyContent">'+
              '<p>{{$event->place}}'+
              '</div>'+
              '</div>';

          var infowindow = new google.maps.InfoWindow({
              content: contentString
          });
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            title: '{{$event->place}}'
        });
          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
          });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>