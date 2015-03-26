<?php
	if (!$_SESSION["autentificado"]) {
		header("Location: exit.php");
	}
?>