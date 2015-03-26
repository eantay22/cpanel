<!DOCTYPE HTML>
<HTML lang="ES">
<head>
	<link rel="stylesheet" type="text/css" href="">
	<title>APP</title>
	<meta charset="UTF-8" /><meta name="Description" content="" />
	<!-- ____________ LINKS ____________________ -->
	<link rel="stylesheet" type="text/css" href="/app/css/css-general.css" />
	<link rel="stylesheet" type="text/css" href="/app/css/css-buscador.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<!-- ________ CSS Index _____ -->	
<style type="text/css">

</style>
</head>
<body>
<DIV id="DIV-HEADER">
	<h1>APP</h1>
	<div id="div-buscador" />
		<form name="Form-buscador" action="#" method="POST">
			<input type="text" name="txt-buscador" id="txt-buscador" placeholder="">
			<input type="submit" name="btn-buscador" id="btn-buscador" value="Buscar ..">
		</form>
	</div>
	<div id="div-exit"><a href="exit.php" id="exit">Salir</a></div>
</DIV>
<DIV id="DIV-MAIN">
	
	<style>
b{
	color:blue;
	font-size: 0.9em;
}
p{
	font-size: 0.8em;	
}
#content-resultado{
	background-color: #F1F1F1;
}
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

$txt_buscador = $_POST['txt-buscador'];

if($txt_buscador == ""){
    echo 'Introduca datos...';
}else{
$query = "SELECT * FROM tabla1 where dni like '%$txt_buscador%'";
$respuesta = mysql_query ($query) or die(mysql_error());

if (mysql_fetch_assoc ($respuesta)<=0) {
   
echo "No se encontraron resultados con el termino ".'<b>'.$txt_buscador.'<b>'.".";
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
}
?>
</table>
</DIV>
</body>
</HTML>