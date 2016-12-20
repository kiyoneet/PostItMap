<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>GmapsLibExample</title>
  <!-- jQuery -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <!-- GoogleMapAPIKey -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVbti9y3mOBfGjeOwSRA52zx4I7vnLgD4&sensor=TRUE"></script>
  <!--gMapsLib -->
  <script type="text/javascript" src="../../../lib/js/gmaps/gmaps.js"></script>
  <!-- gMapsCode -->
  <script type="text/javascript">
    var map;
    $(document).ready(function() {
      map = new GMaps({
        div: '#map',
        lat: 35.689161,
        lng: 139.691781,
        zoom: 16
      });
      map.addMarker({
        lat: 35.689161,
        lng: 139.691781,
        title: 'Lima',
        click: function(e) {
          alert('You clicked in this marker');
        }
      });
      map.addMarker({
        lat: 35.690659,
        lng: 139.699978,
        title: 'Marker',
        infoWindow: {
          content: '<p>HTML Content</p>'
        }
      });
    });
  </script>
  <style>
    #map {
      width: 95%;
      height: 500px;
    }
  </style>
</head>

<body>
  <!-- マップ表示領域 -->
  <div id="map"></div>
</body>

</html>