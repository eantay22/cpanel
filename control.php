<?php
require "conexion.php";
$user=$_POST["txt-user"];
$pass=$_POST["txt-pass"];

$Query="SELECT email,passwd FROM tab_local_usermdc WHERE email='".$user."' AND passwd='".$pass."' ";
$Result = mysql_query($Query); 
if($msg = mysql_fetch_assoc($Result)) { 
	session_start();
	$_SESSION["autentificado"]=true;
	$_SESSION["username"]=$_POST["txt-user"];
 	header("Location: loading.html");
}else{
	header("Location: index.php?System=empty");
}
?>