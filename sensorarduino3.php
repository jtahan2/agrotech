<?php
// www.internetdelascosas.cl
//
// Script para recolectar datos enviados por arduinos conectados a la red
//
// contacto@internetdelascosas.cl
//
require "dbconnect2.php";


//$apagar=0;
//$id  = 1;//htmlspecialchars($_GET["id"],ENT_QUOTES);
$nombre = "temperatura";
$temperatura = htmlspecialchars($_GET["temperatura"],ENT_QUOTES);
$humedad = htmlspecialchars($_GET["humedad"],ENT_QUOTES);
$luminosidad = htmlspecialchars($_GET["luminosidad"],ENT_QUOTES);
 
// Valida que esten presente todos los parametros
if (($temperatura!="") and ($humedad!="") and ($luminosidad!="")) {
	//mysql_connect($mysql_servidor,$mysql_usuario,$mysql_clave) or die("Imposible conectarse al servidor.");
	//mysql_select_db($mysql_base) or die("Imposible abrir Base de datos");
	$sql = "insert into variable (fecha, nombre, valor) values (NOW(), '$nombre','$temperatura')";
$result = mysqli_query($con,$sql);
	$sql = "insert into humedad (porcentaje, fecha) values ('$humedad', NOW())";
$result = mysqli_query($con,$sql);
	$sql = "insert into luz (fecha, valor) values (NOW(),'$luminosidad')";
//$sql = "update variable set fecha=now(), nombre='$nombre', valor='$valor' where id=$id";
$result = mysqli_query($con,$sql);
//mysqli_query(DBi::$con,$sql);
	//mysql_query($sql);
//$sql = "INSERT INTO riego (estado, fecha) VALUES ('$estado', NOW())";
//$result = mysqli_query($con,$sql);

$sql = "SELECT  estado  FROM riego ORDER BY id DESC limit 1";
      $result = mysqli_query($con,$sql);
	$result1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $estado1 = $result1['estado'];

$sql = "SELECT  umbral  FROM umbraltemp ORDER BY id DESC limit 1";
      $result = mysqli_query($con,$sql);
	$result1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $umbraltemp = $result1['umbral'];

$sql = "SELECT  umbral  FROM umbralhumedad ORDER BY id DESC limit 1";
      $result = mysqli_query($con,$sql);
	$result3 = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $umbralhumedad = $result3['umbral'];

$sql = "SELECT  umbral  FROM umbralluz ORDER BY id DESC limit 1";
      $result = mysqli_query($con,$sql);
	$result1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $umbralluz = $result1['umbral'];



}
//echo ($encender);

if ($humedad < $umbralhumedad or $estado1>0)
	echo "<agua>1</agua>";
	
	else
	echo "<agua>0</agua>";

if ($temperatura > $umbraltemp )

	echo "<aire>1</aire>";
	
	else
	echo "<aire>0</aire>";
	


if ($luminosidad > $umbralluz)
	echo "<luz>1</luz>";
	else
	echo "<luz>0</luz>";
	echo "\n";


        //echo json_encode( $response );
//return $encender;
?>
