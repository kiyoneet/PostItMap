
<?php
 

       $dsn =  'mysql:host=localhost;dbname=postItMap;port=3306';
       $db= new PDO($dsn, 'root', 'Nacc2016');



      $sql = "INSERT INTO T_MAP
       		( lat , lng , name , comment )
       		VALUES( :lat , :lng , :name , :comment );";

       echo $sql;
          		
       $sth = $db -> prepare($sql);

       $stmt = $sth -> execute(array(
       		':lat' => $_POST['lat'] ,
       		':lng' => $_POST['lng'] ,
       		':name' => $_POST['name'] ,
       		':comment' => $_POST['comment'] , ));


       		

       var_dump($_POST);





      ?>