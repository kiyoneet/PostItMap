<?php
// エラー出力する場合
ini_set( 'display_errors', 1 );

$map_list = array();
$dsn =  'mysql:host=localhost;dbname=postItMap;port=3306';
/* 公開用*/
$db= new PDO($dsn, 'root', 'Nacc2016');
/* 開発用*/
//$db= new PDO($dsn, 'user', 'Nacc2016');

$sql ="SELECT * FROM T_MAP WHERE 1";

$stmt = $db -> query($sql);
$hoge = '';
foreach ($stmt as $row ) {
    $map_list[] = $row['name'];
    $hoge = $hoge ."['" . $row['name']  . "'," . $row['lat'] . "," . $row['lng'] ."] ,";
}

$hoge = substr($hoge, 0 , -1 );

?>

  <!DOCTYPE html>
  <html lang="jp">

  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
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
  </head>

  <body onload="initialize()">
    <!--公開用 -->
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDVbti9y3mOBfGjeOwSRA52zx4I7vnLgD4&sensor=FALSE">
    </script>
    <script type="text/javascript">
      /* ページ読み込み時に地図を初期化 */

      var map;
      var myLatlng = new google.maps.LatLng(35.669847, 139.752057);
      var currentWindow = null;
      var maplist = new Array();
      var cnt = 0;

      /* 地図の初期化 */
      function initialize() {
        var mapDiv = document.getElementById('map_canvas');
        var myOptions = {
          zoom: 12,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapDiv, myOptions);
        var markers = [<?php echo $hoge;?>];
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i][0];
          var latlng = new google.maps.LatLng(markers[i][1], markers[i][2]);
          createMarker(name, latlng, map);
        }
      }

      function createMarker(name, latlng, map) {
        var infoWindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        google.maps.event.addListener(marker, 'click', function() {
          if (currentWindow) {
            currentWindow.close();
          }
          infoWindow.setContent(name);
          infoWindow.open(map, marker);
          currentWindow = infoWindow;
        });
        maplist[cnt++] = marker;
      }

      $(function() {
        $('#mapList li').click(function() {
          var no = $('#mapList li').index(this);
          google.maps.event.trigger(maplist[no], "click");
        });
      });
    </script>





    <h3>マーカー一覧</h3>
    <!-- 地図の埋め込み表示 -->

    <ul id="mapList">
      <?php
foreach ($map_list as $value) {
    
    echo '<li>' . $value .'</li>';
}
?>

    </ul>

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