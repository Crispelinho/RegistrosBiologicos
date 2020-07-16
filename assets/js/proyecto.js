function eliminarProyecto(id){
	$('#eliminarPersona').modal('show');
	$('#buttonEliminar').html('<button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>'
    +'<button class="btn btn-danger" id="btnEliminar'+id+'" type="button" data-dismiss="modal" onclick="deleteProyecto('+id+');">Eliminar</button>');
}


function getProyecto(id){
    console.log(id);
    $('#editar').modal('show');
    //$('#buttonsave').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" id="editarbtn" onclick="editarPersonas('+id+')">Guardar</button>');
	$.ajax({
		type: "GET",
		url: '../controller/proyectoController.php?getProyecto&id='+id,
		data: '',
		dataType: 'json',
		success: function(data){
			console.log("PRUEBA");
			console.log(data);
			$('#nombre').val(data['nombre']);
		    $('#descripcion').val(data['descripcion']);
		}
	});
	
	
	$('#buttonsave').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" id="editarbtn" onclick="editarProyecto('+id+')">Guardar</button>');

}

function modalProyectos(){
	$('#insertar').modal('show');
	$('#nombreInsertar').val('');
	$('#descripcionInsertar').val('');
}

function crearProyecto(){
    console.log("Creando proyecto...");
    var nombre = $('#nombreInsertar').val();
    var descripcion = $('#descripcionInsertar').val();

    if(!valLetras(nombre)) return alertError('Completa el campo de nombres');
	if(!valLetras(descripcion)) return alertError('Completa el campo de apellidos');

    var data = {
	    'nombre' : nombre,
	    'descripcion' : descripcion,
      }
      $('#insertar').modal('hide');
	  $.ajax({
        type: "POST",
        url: '../controller/proyectoController.php?crearProyecto',
        data: {'data': data},
        dataType: 'json',
        success: function(data){
            console.log("Creando proyecto...");
            if(data['status'] == 'success'){
                location.href ="../views/proyecto.php";
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


function editarProyecto(id){
    console.log(id);

    var nombre = $('#nombre').val();
    var descripcion = $('#descripcion').val();

    var data = {
        'idProyecto': id,
	    'nombre' : nombre,
	    'descripcion' : descripcion,
      }
      
      console.log(data);
	  $('#editar').modal('hide');
	  

	  $.ajax({
			type: "POST",
			url: '../controller/proyectoController.php?editarProyecto',
			data: {'data': data},
			dataType: 'json',
			success: function(data){
               
				if(data['status'] == 'success'){
				   location.href ="../views/proyecto.php";
				}
			}   
		});	

}

function eliminarProyecto(id){

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
		  deleteProyecto(id);
		}
	  })

	//$('#eliminarPersona').modal('show');
	//$('#buttonEliminar').html('<button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>'
    //+'<button class="btn btn-danger" id="btnEliminar'+id+'" type="button" data-dismiss="modal" onclick="deleteProyecto('+id+');">Eliminar</button>');
}
function deleteProyecto(id){
	console.log(id);
	
	
    $.ajax({
		type: "POST",
		url: '../controller/proyectoController.php?deleteProyecto',
		data: {'id': id},
		dataType: 'json',
		success: function(data){
			console.log("aqui");
		    if(data['status'] ==  'success'){
		        location.href ="../views/proyecto.php";
		    }
		}
	});
}

// function deleteProyecto(id){
//     console.log(id);

//     var nombre = $('#nombre').val();
//     var descripcion = $('#descripcion').val();

//     var data = {
//         'idProyecto': id,
// 	    'nombre' : nombre,
// 	    'descripcion' : descripcion,
//       }
      
//       console.log(data);
	  
// 	  $.ajax({
// 			type: "POST",
// 			url: '../controller/proyectoController.php?editarProyecto',
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