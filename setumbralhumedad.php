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

$data = file_get_contents("php://input");

    if (isset($data)) {

        $request = json_decode($data);

        $umbral = $request->sethumedad;

                                }
    
$umbral = stripslashes($umbral);

     

    $sql = "INSERT INTO umbralhumedad (umbral, fecha) VALUES ('$umbral', NOW())";
$result = mysqli_query($con,$sql);

if ($umbral>0){
$response = "correcto";}
else {
$response = "error";}
 echo json_encode( $response);

?>
