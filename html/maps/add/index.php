


<!DOCTYPE html>
<html lang="jp">
<head>
      <meta http-equiv="content-type" content="text/html" charset="utf-8"/> 
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 50% }
    </style>

    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
 <?php
 
       $dsn =  'mysql:host=localhost;dbname=postItMap;port=3306';
       $db= new PDO($dsn, 'root', 'Nacc2016');

        $sql ="SELECT * FROM T_MAP WHERE 1";

        $sth = $db -> query($sql);
        if($row = $sth->fetch()){
           $lat = $row['lat'];
           $lng = $row['lng'];
        } else{
            //初期値　皇居
            $lat = 35.685149;
            $lng = 139.752810;
        }
      ?>

    
  </head>
    <body onload="initialize()">
    <!--公開用 -->
  <script type="text/javascript"
      src="//maps.googleapis.com/maps/api/js?key=AIzaSyDVbti9y3mOBfGjeOwSRA52zx4I7vnLgD4&sensor=FALSE">
  </script>
    <script type="text/javascript">
         /* ページ読み込み時に地図を初期化 */
      
        var map;
        var myLatlng  = new google.maps.LatLng(<?php echo $lat . ',' . $lng ; ?>  );

        /* 地図の初期化 */
        function initialize() {
            var mapDiv = document.getElementById('map_canvas');
            var myOptions = {
                zoom: 17,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var map = new google.maps.Map(mapDiv, myOptions);
            var marker = new google.maps.Marker({
                position: myLatlng, /* マーカーを立てる場所の緯度・経度 */
                map: map, /*マーカーを配置する地図オブジェクト */
                title: <?php echo "'" .$row['name'] . "'"; ?>
            });


              /* 地図がクリックされた時 */
            google.maps.event.addListener(map, 'click', function(event) {
                marker = null;
                /* クリックした場所にマーカーを追加 */
                var clickedLocation = new google.maps.LatLng(event.latLng);
                var marker = new google.maps.Marker({
                    position: event.latLng, 
                    map: map
                });
                map.setCenter(event.latLng);
                /* マーカーを立てた位置を追加 */
                document.latlng.lat.value= event.latLng.lat().toString();
                document.latlng.lng.value= event.latLng.lng().toString();
            });
        }
          

    </script>
   
    
   

 
        <h3>地図イベント</h3>
    <p>地図をクリックした位置の緯度・経度を表示し、その位置にマーカーを立てます。</p>
    <!-- 地図の埋め込み表示 -->
    <div id="map_canvas"></div>
    <form  name="latlng" action="map.php" method="POST">
        <p>登録名：<input type="text" name="name" value = ""/></p>
        <input type="hidden" name="lat" value="" />
        <input type="hidden" name="lng" value="" />
        <p>コメント：<textarea name="comment"></textarea></p>

        <input type="submit" name="add-place" value="登録"/>

    </form>



  </body>
</html>

