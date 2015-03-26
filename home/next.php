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
<!-- ________ CSS Index _____ -->	
<style type="text/css">
#div-campana{
	/*border: 1px solid #CCC;*/
	margin-top: 5px;

}
select{
	width: 400px;
	height: 50px;
	border: 2px solid #CCC;
	outline: none;
	font-size: 1.2em;
}
#btn-submit{
	width: 100px;
	height: 40px;
	border: 1px solid transparent;
	background-color: #8BBB27;
	color: #FFF;
	font-weight: bold;
	border-radius: 4px;
}
#btn-submit:hover{
	cursor: pointer;
}
b{
	color: #FF140D;
	font-size: 0.8em;
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
	<center><h1>Escoja una campaña</h1></center>

<div id="div-campana">
	<center>
		<br />
		<br />
<?php
error_reporting(E_ALL ^ E_NOTICE);
$Archivo =$_GET["Out"];
?>
<form name="Form-List" action="<?php echo $Archivo; ?>" method="POST">
<select name="System-ODBC">
	<option>----</option>
<?php
$nombre_bd = 'prueba';
if (!mysql_connect('127.0.0.1', 'root', '')) {
    echo 'No se pudo conectar a MySql';
    exit;
}

$sql = "SHOW TABLES FROM $nombre_bd";
$resultado = mysql_query($sql);

if (!$resultado) {
    echo "Error de BD, no se pudieron listar las tablas\n";
    echo 'Error MySQL: ' . mysql_error();
    exit;
}

while ($fila = mysql_fetch_row($resultado)) {
    echo "<option>{$fila[0]}\n</option>";
    #echo "Tabla: {$fila[0]}\n";
}
	mysql_free_result($resultado);
?>
</select>
<input type="hidden" name="Archivo" value="<?php echo $Archivo;?>" />
<input type="submit" name="btn-submit" id="btn-submit" Value="Siguiente">
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
	if ($_GET["System"]=="empty") {
		echo "<br /><b>Escoja una campaña. !</b>";
	}else{
		echo "<br />";
	}

?>
</center>
</div>
</DIV>
</body>
</HTML>