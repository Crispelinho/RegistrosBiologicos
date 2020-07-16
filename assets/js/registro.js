function getProyectos(){
    $.ajax({
		type: "GET",
		url: '../controller/registroController.php?getProyectos',
		data: '',
		dataType: 'json',
		success: function(data){
			console.log(data);
			console.log(data[0] );
		    console.log(data[0]['idProyecto'] );
			if (data!= null && data.length > 0) {
			    for (var i = 0; i < data.length; i++) {
			        $('#selectProyecto').html($('#selectProyecto').html()+
			            '<option value="'+data[i]['idProyecto']+'">'+data[i]['nombre']+'</option>'
					);
					$('#selectProyectoE').html($('#selectProyectoE').html()+
					'<option value="'+data[i]['idProyecto']+'">'+data[i]['nombre']+'</option>'
				);
			    }
			}
		}
	});
}

function getEcoregiones(){
    $.ajax({
		type: "GET",
		url: '../controller/registroController.php?getEcoregiones',
		data: '',
		dataType: 'json',
		success: function(data){
			console.log(data);
			console.log(data[0] );
		    console.log(data[0]['idEcoregion'] );
			if (data!= null && data.length > 0) {
			    for (var i = 0; i < data.length; i++) {
			        $('#selectEcoregion').html($('#selectEcoregion').html()+
			            '<option value="'+data[i]['idEcoregion']+'">'+data[i]['nombre']+'</option>'
					);
					$('#selectEcoregionE').html($('#selectEcoregionE').html()+
					'<option value="'+data[i]['idEcoregion']+'">'+data[i]['nombre']+'</option>'
				);
			    }
			}
		}
	});
}


function eliminarRegistro(id){
	$('#eliminarPersona').modal('show');
	$('#buttonEliminar').html('<button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>'
    +'<button class="btn btn-danger" id="btnEliminar'+id+'" type="button" data-dismiss="modal" onclick="deleteRegistro('+id+');">Eliminar</button>');
}


function getRegistro(id){
    console.log(id);
    $('#editar').modal('show');
    //$('#buttonsave').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" id="editarbtn" onclick="editarPersonas('+id+')">Guardar</button>');
	$.ajax({
		type: "GET",
		url: '../controller/RegistroController.php?getRegistro&id='+id,
		data: '',
		dataType: 'json',
		success: function(data){
			console.log("PRUEBA");
			console.log(data);

			$('#especie').val(data['especie']);
			$('#familia').val(data['familia']);
			$('#nombre_comun').val(data['nombre_comun']);
			$('#base_registro').val(data['base_registro']);
			$('#identificador').val(data['identificador']);
			$('#ano').val(data['ano']);
			$('#identificacion').val(data['identificacion']);
			$('#departamento').val(data['departamento']);
			$('#municipio').val(data['municipio']);
			$('#localidad').val(data['localidad']);
			$('#latitud').val(data['latitud']);
			$('#longitud').val(data['longitud']);
			$('#autor').val(data['autor']);
			$('#fecha').val(data['fecha']);
			$('#idProyecto').val(data['idProyecto']);
			$('#idEcoregion').val(data['idEcoregion']);
		}
	});
	
	
	$('#buttonsave').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" id="editarbtn" onclick="editarRegistro('+id+')">Guardar</button>');

}

function modalRegistros(){
	$('#insertar').modal('show');
	$('#nombreInsertar').val('');
	$('#descripcionInsertar').val('');
}

function crearRegistro(){
    console.log("Creando Registro...");
    var especie = $('#especieInsertar').val();
	var familia = $('#familiaInsertar').val();
	var nombre_comun = $('#nombreComunInsertar').val();
	var base_registro = $('#selectBaseRegistro').val();
	var identificador = $('#identificadorInsertar').val();
	var ano = $('#anoInsertar').val();
	var identificacion = $('#identificacionInsertar').val();
	var departamento = $('#departamentoInsertar').val();
	var municipio = $('#municipioInsertar').val();
	var localidad = $('#localidadInsertar').val();
	var latitud = $('#latitudInsertar').val();
	var longitud = $('#longitudInsertar').val();
	var autor = $('#autorInsertar').val();
	var fecha = $('#fechaInsertar').val();
	var captura = $('#capturaInsertar').val();
	var idProyecto = $('#selectProyecto').val();
	var idEcoregion = $('#selectEcoregion').val();
	var fechaCreacion = "";
	var fechaActualizacion = "";

    if(!valLetras(especie)) return alertError('Completa el campo de nombres');
	if(!valLetras(familia)) return alertError('Completa el campo de apellidos');

    var data = {
	    'especie' : especie,
		'familia' : familia,
		'nombre_comun' : nombre_comun,
		'base_registro' : base_registro,
		'identificador' : identificador,
		'ano' : ano,
		'identificacion' : identificacion,
		'departamento' : departamento,
		'municipio' : municipio,
		'localidad' : localidad,
		'latitud' : latitud,
		'longitud' : longitud,
		'autor' : autor,
		'fecha' : fecha,
		'captura' : captura,
		'idProyecto' : idProyecto,
		'idEcoregion' : idEcoregion,
		'fechaCreacion' : fechaCreacion,
		'fechaActualizacion' : fechaActualizacion,
	  }
	  
      $('#insertar').modal('hide');
	  $.ajax({
        type: "POST",
        url: '../controller/RegistroController.php?crearRegistro',
        data: {'data': data},
        dataType: 'json',
        success: function(data){
            console.log("Creando Registro...");
            if(data['status'] == 'success'){
                location.href ="../views/Registro.php";
            }
        },fail:function(){$('#insertar').modal('hide');}   
    });	

}

function alertError(text){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: text
      })
}


function editarRegistro(id){
	console.log(id);
	
    var especie = $('#especie').val();
	var familia = $('#familia').val();
	var nombre_comun = $('#nombreComun').val();
	var base_registro = $('#selectBaseRegistroE').val();
	var identificador = $('#identificador').val();
	var ano = $('#anoInsertar').val();
	var identificacion = $('#identificacion').val();
	var departamento = $('#departamento').val();
	var municipio = $('#municipio').val();
	var localidad = $('#localidad').val();
	var latitud = $('#latitud').val();
	var longitud = $('#longitud').val();
	var autor = $('#autor').val();
	var fecha = $('#fecha').val();
	var captura = $('#captura').val();
	var idProyecto = $('#selectProyectoE').val();
	var idEcoregion = $('#selectEcoregionE').val();
	var fechaCreacion = "";
	var fechaActualizacion = "";

    var data = {
		'idRegistro' : id,
	    'especie' : especie,
		'familia' : familia,
		'nombre_comun' : nombre_comun,
		'base_registro' : base_registro,
		'identificador' : identificador,
		'ano' : ano,
		'identificacion' : identificacion,
		'departamento' : departamento,
		'municipio' : municipio,
		'localidad' : localidad,
		'latitud' : latitud,
		'longitud' : longitud,
		'autor' : autor,
		'fecha' : fecha,
		'captura' : captura,
		'idProyecto' : idProyecto,
		'idEcoregion' : idEcoregion,
		'fechaCreacion' : fechaCreacion,
		'fechaActualizacion' : fechaActualizacion,
	  }
      
      console.log(data);
	  $('#editar').modal('hide');
	  

	  $.ajax({
			type: "POST",
			url: '../controller/RegistroController.php?editarRegistro',
			data: {'data': data},
			dataType: 'json',
			success: function(data){
               
				if(data['status'] == 'success'){
				   location.href ="../views/Registro.php";
				}
			}   
		});	

}

function eliminarRegistro(id){

	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	  }).then((result) => {
		if (result.value) {
		  Swal.fire(
			'Deleted!',
			'Your file has been deleted.',
			'success'
		  )
		  deleteRegistro(id);
		}
	  })

	//$('#eliminarPersona').modal('show');
	//$('#buttonEliminar').html('<button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>'
    //+'<button class="btn btn-danger" id="btnEliminar'+id+'" type="button" data-dismiss="modal" onclick="deleteRegistro('+id+');">Eliminar</button>');
}
function deleteRegistro(id){
	console.log(id);
	
	
    $.ajax({
		type: "POST",
		url: '../controller/RegistroController.php?deleteRegistro',
		data: {'id': id},
		dataType: 'json',
		success: function(data){
			console.log("aqui");
		    if(data['status'] ==  'success'){
		        location.href ="../views/Registro.php";
		    }
		}
	});
}

// function deleteRegistro(id){
//     console.log(id);

//     var nombre = $('#nombre').val();
//     var descripcion = $('#descripcion').val();

//     var data = {
//         'idRegistro': id,
// 	    'nombre' : nombre,
// 	    'descripcion' : descripcion,
//       }
      
//       console.log(data);
	  
// 	  $.ajax({
// 			type: "POST",
// 			url: '../controller/RegistroController.php?editarRegistro',
// 			data: {'data': data},
// 			dataType: 'json',
// 			success: function(data){
// 				if(data['status'] == 'success'){
// 				   //location.href ="../pacientes/";
// 				}
// 			}   
// 		});	

// }

function valLetras(content){
	
	if(
		content == '' 
		|| content == null 
		|| content == 'null' 
		|| content === undefined 
		|| content == 'undefined' 
		|| content  == NaN 
		|| content == 'NaN'
		|| content == '0'
		|| content == 0
	) return false;

	return true;
}