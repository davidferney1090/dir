<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from usuarios";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['id'].'</td>
							<td>'.$datos['usuario'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicionu('.$datos['id'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatosu('.$datos['id'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>Id</th>
					<th>Usuario</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>';

 ?>