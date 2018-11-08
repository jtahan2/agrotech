<?php

  define('HOST','localhost');

  define('USER','root');

  define('PASS','root');

  define('DB','agrotech4all');

 class DBi {
    public static $con;
}
DBi::$con = new mysqli(HOST, USER, PASS, DB);

   if (!DBi::$con){

                 die('Error in connection' . mysqli_connect_error()) ;

  }

?>
