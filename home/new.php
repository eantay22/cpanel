<!DOCTYPE HTML>
<?php
session_start();
include "autentificado.php";
?>
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
#div-left{
	float: left;
	margin-left: 5px;
	width: 300px;
	height: auto;
	padding: 10px;
	background-color: #EAEAEA;
	border-radius: 4px;
}
	#txt-Numero{
		width: 290px;
		height: 40px;
		font-size: 1.1em;
		padding-left: 4px;
		border: 1px solid #CCC;
		outline: none;
	}
	#txt-Numero:focus{
		border: 1px solid #7FBA00;
		box-shadow: 0px 0px 6px #7FBA00;
	}
#div-right{
	/*border: 1px solid orange;*/
	margin-left: 340px;
	margin-right: 5px;
	padding: 10px;
}
	#label-1{
		font-size: 0.9em;
	}
	#label-2{
		font-size: 1.1em;	
	}
	select{
		height: 30px;
		border: 2px solid #CCC;
	}
	textarea{
		width: 400px;
		height: 80px;
		border: 1px solid #CCC;
		resize:none;
		padding-top: 4px;
		padding-left: 4px;
	}
	textarea:focus{
		border: 1px solid #009bfe;
	}
	#btn-reset{
		width: 120px;
		height: 40px;
		border: 1px solid #8C98A5;
		background-color: #8C98A5;
		font-weight: bold;
		border-radius: 4px;
	}
	#btn-reset:hover{
		background-color: #A5988C;
		cursor: pointer;
	}
	#btn-enviar{
		width: 120px;
		height: 40px;
		border: 1px solid #6B9316;
		background-color: #6B9316;
		font-weight: bold;
		color: #FFF;
		border-radius: 4px;
	}
	#btn-enviar:hover{
		background-color: #7EBA00;
		cursor: pointer;
	}
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
<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
include "conexion.php";
$ODBC=$_POST["System-ODBC"];
$Public=$_POST["Archivo"];
if ($ODBC !="----" ) {

$query = "SELECT * FROM $ODBC WHERE cpu LIKE 'ON'";
$result = mysql_query ($query) or die(mysql_error());

if (mysql_fetch_assoc ($result)<=0) {
   	echo "<center><b>No se han encontrado datos.. !</b>&nbsp; <a href='index.php' id='volver' title='Volver a inicio'>Volver</a> </center>";
}else {
$result = mysql_query ($query) or die(mysql_error());

$msg = mysql_fetch_array($result);
$id = $msg["id"];
Mysql_query("UPDATE $ODBC SET cpu='OFF' WHERE id= $id");

echo "<form name='Form-Resultado' action='upload.php' Method='POST'>
		<div id='div-left'>
		<input type='text' name='txt-Numero' id='txt-Numero' value='".$msg["numero"]."' />
		</div>
		<div id='div-right'>

		<label id='label-1'>Nombre</label>:&nbsp;
		<label id='label-2'>".$msg["name"]."</label>
		<br /><br />
		<label id='label-1'>DNI</label>:&nbsp;
		<label id='label-2'>".$msg["apellido"]."</label>
		<br /><br />
		<label id='label-1'>DNI</label>:&nbsp;
		<label id='label-2'>".$msg["dni"]."</label>
		<br /><br />
		<label id='label-1'>Edad</label>:&nbsp;
		<label id='label-2'>".$msg["edad"]."</label>
		<br /><br />
		<label id='label-1'>Fecha</label>:&nbsp;
		<label id='label-2'>".$msg["fecha"]."</label>
		<br /><br />
		<label id='label-1'>Estado</label>:&nbsp;
		<select name='option-estado' id='option-estado' required>
			<option>Ninguno</option>
			<option>Contesto</option>
			<option>No contesto</option>
			<option>volver a llamar</option>
			<option>numero equivocado</option>
		</select>
		<br /><br />
		<label id='label-1'>Notas</label><br />
		<textarea name=''></textarea>
		<br /><br />
		<input type='reset' name='btn-reset' id='btn-reset' Value='Limpiar'>
		<input type='submit' name='btn-enviar' id='btn-enviar' Value='Siguiente'>
		</div>
	</form>
";
}
#$id = $msg["id"];Mysql_query("UPDATE $ODBC SET cpu='ON' WHERE id= $id");
mysql_free_result($result);

}else{
	header("Location: next.php?System=empty&Out=$Public");
}
?>
</table>
</DIV>
</body>
</HTML>