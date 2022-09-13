<?php
	
	include "conexion.php";
	$conexion=conexion();

	$datos=array(			
			$conexion->real_escape_string(htmlentities($_POST['usuariou'])),
			$conexion->real_escape_string(htmlentities($_POST['passwordu'])),
			$conexion->real_escape_string(htmlentities($_POST['idu']))
				);
	$sql="UPDATE usuarios set usuario=?,
								password=?
						where id=?";
	$query=$conexion->prepare($sql);
	$query->bind_param('ssi',$datos[0],
								$datos[1],
								$datos[2]);
	echo $query->execute();
	$query->close();
?>