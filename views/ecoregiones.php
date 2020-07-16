<?php 
require_once('../DAO/ecoregionesDAO.php');

$ecoregiones = new EcoregionesDAO();
$ListEcoregiones = $ecoregiones->allEcoregiones();
include('../headers/header.php');
//print_r($ListProyectos);
?>

<html>
    <body>
    &nbsp;&nbsp;
        <div> &nbsp;&nbsp;<button class="btn btn-success btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Resultados" onclick="modalProyectos();"><i class="tim-icons icon-simple-add"></i>Agregar</button></div>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th>ACCIÓN</th>
        </tr>
    </thead>
    <tbody>
     <?php foreach ($ListEcoregiones as $e): ?> 
        <tr>
            <th scope="row"><?php echo $e->getidEcoregion()?></th>
            <td><?php echo $e->getNombre()?></td>
            <td><?php echo $e->getDescripcion()?></td>
            <td>
            <button class="btn btn-info btn-simple btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Editar" onclick="getEcoregion(<?php echo $e->getidEcoregion() ?>);"><i class="tim-icons icon-pencil"></i>
                            EDITAR</button>
                            &nbsp;&nbsp;
                            <button class="btn btn-danger btn-simple btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="btnEliminar<?php echo $e->getidEcoregion();?>" onclick="eliminarEcoregion(<?php echo $e->getidEcoregion() ?>)
                            ;"><i class="tim-icons icon-trash-simple"></i>ELIMINAR</button>
                            &nbsp;&nbsp;
            </td>
        </tr>
      <?php endforeach ?>


     <!---------------------------------------- Modal Insertar Proyecto --------------------------------->
      
     <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar Proyectos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="nombre">Nombres:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="nombre" id="nombreInsertar" REQUIRED name="nombre" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Descripcion:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="descripcionInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>     

              </div>
                 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                <button type="button" class="btn btn-primary" id="editarbtn" onclick="crearEcoregion();">Insertar</button>
            </div>
        </div>

     </div>
</div>
<!--END MODAL INSERTAR-->


<!--END MODAL EDITAR-->

<!---------------------------------------- Modal Editar Administrador --------------------------------->




      <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Pacientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="row">
                    <div class="form-group col-md-6">
                    <label for="nombre">Nombres:</label>
                    <input class="form-control form-control-sm" type="text" placeholder="nombre" id="nombre" REQUIRED name="nombre" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                    </div> 

                    <div class="form-group col-md-6">
                    <label for="apellido">Descripción:</label>
                    <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="descripcion" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                    </div> 
              </div>
      </div>
      <div class="modal-footer" id="buttonsave"></div>                 
  </div>

</div>

<!--END MODAL EDITAR-->

    </tbody>
    </table>

    </body>

    <script src="../assets/js/ecoregiones.js">
    
    </script>

</html>