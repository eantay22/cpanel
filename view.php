<!DOCTYPE HTML>
<HTML lang="ES">
<head>
	<link type="image/x-icon" href="favicon.ico" rel="icon" />
	<title>CPANEL-MDC</title>
	<meta charset="UTF-8" /><meta name="Description" content="" />

	<!-- ____________ LINKS ____________________ -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	
<!-- ________ CSS Index _____ -->	
<style type="text/css">
*{margin: 0px; padding: 0px;}
body{background-color: #e9eaed; font-family: 'Ubuntu', sans-serif;}
#DIV-MAIN{
	margin: 0 auto;
	margin-top: 100px;
	width: 650px;
	height: auto;
	border: 1px solid #999999;
	padding: 20px;
	height: auto;
	background-color: #FFF;
	height: 200px;
	border-radius: 4px;
	/*border: 1px solid rgba(0, 0, 0, 0.15);*/
  	/*box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.4); */
}
	#sub-div-img{
		float: left;
		/*border: 1px solid blue;*/
	}
	#sub-div-formulario{
		float: right;
		/*border: 1px solid yellow;*/
	}

/*BUTTONES*/
input[type="text"]
{
	width: 250px;
	border: 1px solid #CCC;
	height: 25px;
	padding-left: 3px;
	outline: none;
}
input[type="password"]
{
	width: 250px;
	border: 1px solid #CCC;
	height: 25px;
	padding-left: 3px;
	outline: none;
}
input[type="submit"]
{
	width: 100px;
	border: 1px solid #3b5998;
	height: 30px;
	outline: none;
	background-color: #3b5998;
	color: #FFF;
	font-weight: bold;
	border-radius: 4px;
}
b{
	color: #e20800;
	font-size: 0.8em;
}
</style>

</head>
<body>

<DIV id="DIV-MAIN">
	<div id="sub-div-img">
		<img src="img/logomdc.png"/>
	</div>
	<div id="sub-div-formulario">

		<form name="Form-Login" action="control.php" Method="POST">
			<label>Usuario</label><br />
			<input type="text" name="txt-user" id="txt-user" palaceholder="" /> <br /><br />
			<label>Contraseña</label><br />
			<input type="password" name="txt-pass" id="txt-pass" placeholder="" /><br /><br />
			<input type="submit" name="btn-submit" id="btn-submit" value="Ingresar" />
		</form>
		
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
			if ($_GET["System"]=="empty") 
			{
				echo "<br /><b>Usuario o contraseña son incorrectos ..!</b>";
			}
		?>
	</div>
</DIV>
</body>
</HTML>