function mostrarDatosu(){
	$.ajax({
		url:"../php/mostrarDatosu.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}

function agregarDatosu(){

	if($('#usuario').val()==""){
		swal("Debes agregar Nombre de Usuario!");
		return false;
	}else if($('#password').val()==""){
		swal("Debes agregar Contraseña!");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatosu').serialize(),
		url:"../php/agregarDatosu.php",
		success:function(r){
			if(r==1){
				$('#frmAgregarDatosu')[0].reset();
				mostrarDatosu();
				swal("Agregado Correctamente", {icon: "success"});
			}else{
				swal("Error al agregar", {icon: "error"});
			}
		}
	});
}

function eliminarDatosu(id){
	swal({
		title: "Estas seguro de eliminar este registro?",
		text: "El registro NO se podra recuperar!!!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"id=" + id,
				url:"../php/eliminaru.php",
				success:function(r){
					if(r==1){						
						mostrarDatosu();
						swal("Eliminado Correctamente", {icon: "success"});
					}else{
						swal("Error al eliminar", {icon: "error"});
					}
				}
			});
		} 
	});
}

function agregaDatosParaEdicionu(id){
	$.ajax({
		type:"POST",
		data:"id=" + id,
		url:"../php/datosUpdateu.php",
		success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idu').val(datos['id']);
			$('#usuariou').val(datos['usuario']);
			$('#passwordu').val(datos['password']);
		}
	});
}
	function actualizarDatosu(){
		if($('#usuariou').val()==""){
			swal("Debes agregar un Nombre de Usuario!");
			return false;
		}

		$.ajax({
			type:"POST",
			data:$('#frmAgregarDatosuu').serialize(),
			url:"../php/actualizarDatosu.php",
			success:function(r){
				if(r==1){					
					mostrarDatosu();
					swal("Actualizado Correctamente", {icon: "success"});
				}else{
					swal("Error al Actualizar", {icon: "error"});
				}
			}
		});

	}