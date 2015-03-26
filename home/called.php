<?php
session_start();
include "autentificado.php";
?>
<!DOCTYPE HTML>
<HTML lang="ES">
<head>
	<link rel="stylesheet" type="text/css" href="">
	<title>APP</title>
	<meta charset="UTF-8" /><meta name="Description" content="" />
	<!-- ____________ LINKS ____________________ -->
	<link rel="stylesheet" type="text/css" href="/app/css/css-general.css" />
	<link rel="stylesheet" type="text/css" href="/app/css/css-buscador.css">
	<link rel="stylesheet" type="text/css" href="/app/css/banner.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<!-- ________ CSS Index _________________________-->	
<style type="text/css">
b{
		color: #737373;
		font-size: 0.8em;
	}
#volver{
		text-decoration: none;
		font-size: 0.8em;
		color: #508917;
		padding: 8px 6px;
		color: #515151;
		border-radius: 4px;
		border: 1px solid #DBDBDB;
		background-color: #F5F5F5;
	}
	#volver:hover{
		background-color: #F1F1F1;
	}
</style>
</head>
<body>
<DIV id="DIV-HEADER">
	<div id="MAYOR">
	<div id="Div-Banner-Left"><h1>APP</h1></div>
	<div id="Div-Banner-Right">
		<label id="Print-User"><?php echo $_SESSION["username"]; ?></label> &nbsp;&nbsp;&nbsp;<a href="exit.php" id="A-exit">Salir</a>
	</div>
	<div id="Div-Banner-Center" />
		<form name="Form-buscador" action="show.php" method="POST">
			<input type="text" name="txt-buscador" id="txt-buscador" placeholder="">
			<input type="submit" name="btn-buscador" id="btn-buscador" value="Buscar">
		</form>
	</div>
	</div>
</DIV>
<DIV id="DIV-MAIN">

</style>
<table border="1">
	<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>DNI</td>
		<td>Edad</td>
		<td>Fecha</td>
		<td>Numero</td>
	</tr>

<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
//creamos la conexion a la base de datos
include "conexion.php";
$query = "SELECT * FROM tabla1 where estado like 'OFF'";
$respuesta = mysql_query ($query) or die(mysql_error());

if (mysql_fetch_assoc ($respuesta)<=0) {
   
echo "<center><b>No se han encontrado datos.. !</b>&nbsp; <a href='index.php' id='volver'>Volver</a> </center>";
}else {
$respuesta = mysql_query ($query) or die(mysql_error());
while($row = mysql_fetch_array($respuesta))
{
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['apellido']."</td>";
	echo "<td>".$row['dni']."</td>";
	echo "<td>".$row['edad']."</td>";
	echo "<td>".$row['fecha']."</td>";
	echo "<td>".$row['numero']."</td>";
	echo "</tr>";

}
}mysql_free_result($respuesta);
?>
</table>
</DIV>
</body>
</HTML>