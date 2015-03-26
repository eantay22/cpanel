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
	<link rel="stylesheet" type="text/css" href="css/css-general.css" />
	<link rel="stylesheet" type="text/css" href="css/CSS_HEADER.css">
	<link rel="stylesheet" type="text/css" href="css/CSS_MAIN.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>

<!-- ________ CSS Index _____ -->	
<style type="text/css">

</style>
</head>
<body>
<DIV id="DIV-HEADER">
	<div id="sub-div-logo">
		<img src="img/logomdc.png" width="140">
	</div>
	<div id="sub-div-session">
		<label id="Print-User"><?php echo $_SESSION["username"]; ?></label> &nbsp;&nbsp;&nbsp;<a href="exit.php" class="link_salir">Salir</a>
	</div>
</DIV>

<DIV id="DIV-MAIN">
	<div id="sub-div-buscador">
		<!-- FORMUALRIO DE BUSCADOR -->
		<form Name="Frm_buscador" Action="#" Method="GET">
			<input type="text" name="txt_buscador" id="txt_buscador" placeholder="Escriba aqui.. " />
			<input type="submit" name="btn_buscador" id="btn_buscador" Value="Buscar" />
		</form>
		
	</div>
	<div id="sub-div-contenido">

	</div>
</DIV>

</body>
</HTML>