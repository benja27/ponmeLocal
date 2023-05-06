<?php

	$server = "localhost";
  $username = "root";
  $password = "";
  $db = "pixlapix_ponmelocal";


	$con = mysqli_connect($server, $username, $password, $db);

  if(!$con){
    die("conexion fallida");
  }

?>

19.408537494539342, -99.13248690958042