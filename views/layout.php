<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>PostItMap</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo $base_url; ?>/lib/bootstrap3/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/lib/bootstrap3/css/font-awesome.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="<?php echo $base_url; ?>/lib/bootstrap3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDVbti9y3mOBfGjeOwSRA52zx4I7vnLgD4"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var sideslider = $('[data-toggle=collapse-side]');
      var sel = sideslider.attr('data-target');
      var sel2 = sideslider.attr('data-target-2');
      sideslider.click(function(event) {
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
      });
    });
  </script>
  <style type="text/css">
    
  </style>

</head>


<?php echo $_content; ?>

  </body>

</html>