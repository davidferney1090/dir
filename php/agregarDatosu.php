<?php

	include "conexion.php";
	$conexion=conexion();

	$datos=array(
			$conexion->real_escape_string(htmlentities($_POST['usuario'])),
			$conexion->real_escape_string(htmlentities($_POST['password']))
				);	
	$sql="INSERT into usuarios (usuario,
								password)
						values (?,?)";

	$query=$conexion->prepare($sql);
	$query->bind_param('ss',$datos[0],
								$datos[1]);
	echo $query->execute();

	$query->close();
?>