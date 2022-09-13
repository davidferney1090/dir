<?php

	include "conexion.php";
	$conexion=conexion();

	$datos=array(
			$conexion->real_escape_string(htmlentities($_POST['idContacto'])),
			$conexion->real_escape_string(htmlentities($_POST['nombreContacto'])),
			$conexion->real_escape_string(htmlentities($_POST['direccionContacto'])),
			$conexion->real_escape_string(htmlentities($_POST['telefonoContacto'])),
			$conexion->real_escape_string(htmlentities($_POST['emailContacto'])),
			$conexion->real_escape_string(htmlentities($_POST['ciudadContacto'])),
			$conexion->real_escape_string(htmlentities($_POST['paisContacto']))
				);	
	$sql="INSERT into contactos (idContacto,
								nombreContacto,
								direccionContacto,
								telefonoContacto,
								emailContacto,
								ciudadContacto,
								paisContacto)
						values (?,?,?,?,?,?,?)";

	$query=$conexion->prepare($sql);
	$query->bind_param('issssss',$datos[0],
								$datos[1],
								$datos[2],
								$datos[3],
								$datos[4],
								$datos[5],
								$datos[6]);
	echo $query->execute();

	$query->close();
?>