
function modalProyectos(){
	$('#insertar').modal('show');
	$('#nombreInsertar').val('');
	$('#descripcionInsertar').val('');
}

function crearEcoregion(){
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
        url: '../controller/ecoregionesController.php?crearEcoregion',
        data: {'data': data},
        dataType: 'json',
        success: function(data){
            console.log("Creando proyecto...");
            if(data['status'] == 'success'){
                location.href ="../views/ecoregiones.php";
            }
        },fail:function(){$('#insertar').modal('hide');}   
    });	

}

function getEcoregion(id){
    console.log(id);
    $('#editar').modal('show');
    //$('#buttonsave').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" id="editarbtn" onclick="editarPersonas('+id+')">Guardar</button>');
	$.ajax({
		type: "GET",
		url: '../controller/ecoregionesController.php?getEcoregion&id='+id,
		data: '',
		dataType: 'json',
		success: function(data){
			console.log("AQUI");
			console.log(data);
			$('#nombre').val(data['nombre']);
		    $('#descripcion').val(data['descripcion']);
		}
	});
	
	
	$('#buttonsave').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" id="editarbtn" onclick="editarEcoregion('+id+')">Guardar</button>');

}

function editarEcoregion(id){
    console.log(id);

    var nombre = $('#nombre').val();
    var descripcion = $('#descripcion').val();

    var data = {
        'idEcoregion': id,
	    'nombre' : nombre,
	    'descripcion' : descripcion,
      }
      
      console.log(data);
	  $('#editar').modal('hide');
	  

	  $.ajax({
			type: "POST",
			url: '../controller/ecoregionesController.php?editarEcoregion',
			data: {'data': data},
			dataType: 'json',
			success: function(data){
               
				if(data['status'] == 'success'){
				   location.href ="../views/ecoregiones.php";
				}
			}   
		});	

}

function eliminarEcoregion(id){

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
		  deleteEcoregion(id);
		}
	  })

}

function deleteEcoregion(id){
	console.log(id);
	
	
    $.ajax({
		type: "POST",
		url: '../controller/ecoregionesController.php?deleteEcoregion',
		data: {'id': id},
		dataType: 'json',
		success: function(data){
			console.log("aqui");
		    if(data['status'] ==  'success'){
		        location.href ="../views/ecoregiones.php";
		    }
		}
	});
}


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

function alertError(text){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: text
      })
}
