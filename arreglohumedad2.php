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

    

     

    $sql = "SELECT  porcentaje  FROM humedad  ORDER BY id DESC limit 20";

      $result = mysqli_query($con,$sql);
$lectura = array();
//$i=1;
	while($field = $result -> fetch_array())

      //$temp1 = $result1['valor'];
//$i=1;
 // foreach($result1 as $valor)
 {
$porcentaje=$field['porcentaje'];
	//$response[$i]= $field["porcentaje"];
	//$a=$valor;//['valor'];
	//mysqli_free_result($result);
	//$i++;
//$lectura[]= array('porcentaje'=>$porcentaje);
$lectura[]= array($porcentaje);
}   
     $json_string = json_encode($lectura,JSON_NUMERIC_CHECK);

 echo $json_string;
//'porcentaje'=>
?>
