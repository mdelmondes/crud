<!DOCTYPE html>
<html>
<head>
	<title>Deletar</title>
</head>
<body>
	<?php 
	
		include 'config.php';

		$id=$_GET["id"];
		$base->query("DELETE FROM clientes WHERE ID='$id'");

		header("Location:index.php");
	?>
</body>
</html>
