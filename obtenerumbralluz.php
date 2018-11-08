<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {

        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

        header('Access-Control-Allow-Credentials: true');

        header('Access-Control-Max-Age: 86400');    // cache for 1 day

    }

    // Access-Control headers are received during OPTIONS requests

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){

            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");        

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){

            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
}
}
    }

  require "dbconnect2.php";

    

     

    $sql = "SELECT  umbral  FROM umbralluz ORDER BY id DESC limit 1";

      $result = mysqli_query($con,$sql);
	$result1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $umbralluz = $result1['umbral'];

     //echo ($valor); 
                  

      if($umbralluz >0) {

     $response= "$umbralluz";

      }

 echo json_encode( $response);

?>
