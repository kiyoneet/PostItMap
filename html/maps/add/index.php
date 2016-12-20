<!DOCTYPE html>


<html lang="jp">

<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    html {
      height: 100%
    }
    
    body {
      height: 100%;
      margin: 0;
      padding: 0
    }
    
    #map_canvas {
      height: 50%
    }
  </style>

  <!-- jQuery -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <?php

$dsn =  'mysql:host=localhost;dbname=postItMap;port=3306';
$db= new PDO($dsn, 'root', 'Nacc2016');

$sql ="SELECT * FROM T_MAP WHERE 1";

$sth = $db->query($sql);
$row = $sth->fetch();


?>


</head>

<body onload="initialize()">
  <!--googleMapApiKey -->
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDVbti9y3mOBfGjeOwSRA52zx4I7vnLgD4&sensor=FALSE">
  </script>
  <script type="text/javascript">
    /* ページ読み込み時に地図を初期化 */

    var map;

    /* 地図の初期化 */
    function initialize() {
      // マーカーリスト
      var marker_list = new google.maps.MVCArray();
      // 初期位置皇居
      var initPos = new google.maps.LatLng(35.685149, 139.752810);


      var myOptions = {
        zoom: 17,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      var map = new google.maps.Map(mapDiv, myOptions);
      var marker = new google.maps.Marker({
        position: myLatlng,
        /* マーカーを立てる場所の緯度・経度 */
        map: map,
        /*マーカーを配置する地図オブジェクト */
        title: <?php echo "'" .$row['name'] . "'"; ?>
      });

      map_canvas = document.getElementById('map_canvas');
      /* 地図がクリックされた時 */
      GEvent.addListener(map_canvas, "click", clickAction);

    }
    // ロード時
    function load() {
      var rows = <?php json_safe_encode($row); ?>;

      for (var i = 0; i < rows.lengh; i++) {
        var latlng = new google.maps.LatLng(rows.lat, rows.lng);


        //マーカーを作成したら marker_list に追加
        var marker = createMarker(map_canvas, latlng);
        marker_list.push(marker);
      }
    }
    function clickAction(){
      var clickedLocation = new google.maps.LatLng(event.latLng);
        var marker = new google.maps.Marker({
          position: event.latLng,
          map: map
        });
        map.setCenter(event.latLng);
        /* マーカーを立てた位置を追加 */
        document.latlng.lat.value = event.latLng.lat().toString();
        document.latlng.lng.value = event.latLng.lng().toString();
    }
    //マーカー作成
    function createMarker(map, latlng) {
      var marker = new google.maps.Marker();
      marker.setPosition(latlng);
      marker.setMap(map);
      return marker;
    }
    //　マーカー削除
    function removeMarkers() {
      marker_list.forEach(function(marker, idx) {
        marker.setMap(null);
      });
    }

    google.maps.event.addDomListenerOnce(window, "load", initialize);
  </script>





  <h3>地図イベント</h3>
  <p>地図をクリックした位置の緯度・経度を表示し、その位置にマーカーを立てます。</p>
  <!-- 地図の埋め込み表示 -->
  <div id="map_canvas"></div>
  <form name="latlng" action="map.php" method="POST">
    <p>登録名：
      <input type="text" name="name" value="" />
    </p>
    <input type="hidden" name="lat" value="" />
    <input type="hidden" name="lng" value="" />
    <p>コメント：
      <textarea name="comment"></textarea>
    </p>

    <input type="submit" name="add-place" value="登録" />

  </form>



</body>

</html>
<?php
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
?>