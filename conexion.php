<?php
error_reporting(E_ALL ^ E_NOTICE);
//VARIABLES
#$VarTAB_USER="tab_local_usermdc";
//CONEXION LAN
$host="127.0.0.1";
$user="root";
$pass="";
$ODBC="cloud";

//CONEXION WAN


$conect=Mysql_Connect($host,$user,$pass);
Mysql_select_db($ODBC,$conect);