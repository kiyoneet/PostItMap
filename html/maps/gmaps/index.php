<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>GmapsLibExample</title>
  <!-- jQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <!-- GoogleMapAPIKey -->
  <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVbti9y3mOBfGjeOwSRA52zx4I7vnLgD4&sensor=FALSE"></script>-->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <!--gMapsLib -->
  <script type="text/javascript" src="../../../lib/js/gmaps/gmaps.js"></script>
  <!-- gMapsCode -->
  <script type="text/javascript">
    var map;
    $(document).ready(function() {
      map = new GMaps({
        div: '#map-canvas',
        lat: 35.689161,
        lng: 139.691781,
        zoom: 16
      });
    });
  </script>
</head>

<body>
<!-- マップ表示領域 -->
  <div id="map-canvas"></div>
</body>

</html>