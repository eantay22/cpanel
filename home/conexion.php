<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

$Servidor="127.0.0.1";
$Usuario="root";
$Pass="";
$bd="prueba";

$conect=Mysql_Connect($Servidor,$Usuario,$Pass);
Mysql_Select_db($bd,$conect);

/*$conexion = mysqli_connect("localhost", "root", "", "prueba");
mysqli_close($conexion);*/
?>