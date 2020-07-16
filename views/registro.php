<?php 
require_once('../DAO/RegistroDAO.php');

$Registros = new RegistrosDAO();
$ListRegistros = $Registros->allRegistro();
include('../headers/header.php');
//print_r($ListRegistros);
?>

<html>
    <body>
    &nbsp;&nbsp;
        <div> &nbsp;&nbsp;<button class="btn btn-success btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Resultados" onclick="modalRegistros();"><i class="tim-icons icon-simple-add"></i>Agregar</button>
        &nbsp;&nbsp;<a href="../controller/registroController.php?csv"><button class="btn btn-primary btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Resultados"><i class="fas fa-file-download"></i> Descargar CSV </button></a>
        </div>
        
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Especie</th>
            <th scope="col">Familia</th>
            <th scope="col">Nombre_comun</th>
            <th scope="col">Base_registro</th>
            <th scope="col">Identificador</th>
            <th scope="col">Año</th>
            <th scope="col">Identificacion</th>
            <th scope="col">Departamento</th>
            <th scope="col">Municipio</th>
            <th scope="col">Localidad</th>
            <th scope="col">Latitud</th>
            <th scope="col">Longitud</th>
            <th scope="col">Autor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Captura</th>
            <th scope="col">Proyecto</th>
            <th scope="col">Ecoregion</th>
            <th scope="col">Feche de Creacion</th>
            <th scope="col">Feche de Actualizacion</th>

            <th>ACCIÓN</th>
        </tr>
    </thead>
    <tbody>
     <?php foreach ($ListRegistros as $p): ?> 
        <tr>
            <th scope="row"><?php echo $p->getidRegistro()?></th>
            <td><?php echo $p->getespecie()?></td>
            <td><?php echo $p->getfamilia()?></td>
            <td><?php echo $p->getnombre_comun()?></td>
            <td><?php echo $p->getbase_registro()?></td>
            <td><?php echo $p->getidentificador()?></td>
            <td><?php echo $p->getano()?></td>
            <td><?php echo $p->getidentificacion()?></td>
            <td><?php echo $p->getdepartamento()?></td>
            <td><?php echo $p->getmunicipio()?></td>
            <td><?php echo $p->getlocalidad()?></td>
            <td><?php echo $p->getlatitud()?></td>
            <td><?php echo $p->getlongitud()?></td>
            <td><?php echo $p->getautor()?></td>
            <td><?php echo $p->getfecha()?></td>
            <td><?php echo $p->getcaptura()?></td>
            <td><?php echo $Registros->getProyecto($p->getidProyecto())?></td> 
            <td><?php echo $Registros->getEcoregion($p->getidEcoregion())?></td>
            <td><?php echo $p->getfechaCreacion()?></td>
            <td><?php echo $p->getfechaActualizacion()?></td>

            <td>
            <button class="btn btn-info btn-simple btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Editar" onclick="getRegistro(<?php echo $p->getidRegistro() ?>);"><i class="tim-icons icon-pencil"></i>
                            EDITAR</button>
                            &nbsp;&nbsp;
                            <button class="btn btn-danger btn-simple btn-icon btn-round" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="btnEliminar<?php echo $p->getidRegistro();?>" onclick="eliminarRegistro(<?php echo $p->getidRegistro() ?>)
                            ;"><i class="tim-icons icon-trash-simple"></i>ELIMINAR</button>
                            &nbsp;&nbsp;
            </td>
        </tr>
      <?php endforeach ?>


     <!---------------------------------------- Modal Insertar Registro --------------------------------->
      
     <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar Registros</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="nombre">Especie:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="nombre" id="especieInsertar" REQUIRED name="nombre" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Familia:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="familiaInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="nombre">Nombre_comun:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="nombre" id="nombreComunInsertar" REQUIRED name="nombre" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Base_registro:<span style="color: red;">*</span></label>
                  <select class="form-control form-control-sm" id="selectBaseRegistro" name="BaseRegistro">
                        <option value="0">Seleccione</option>
                        <option value="1">Observacion Humana</option>
                        <option value="2">Especimen</option>
                    </select>                  </div>       

                <div class="form-group col-md-6">
                  <label for="descripcion">Identificador:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="identificadorInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Ano:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="anoInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Identificacion:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="identificacionInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Departamento:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="departamentoInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Municipio:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="municipioInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>

                <div class="form-group col-md-6">
                  <label for="descripcion">Localidad:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="localidadInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>

                <div class="form-group col-md-6">
                  <label for="descripcion">Latitud:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="latitudInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>                

                <div class="form-group col-md-6">
                  <label for="descripcion">Longitud:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="longitudInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>    

                <div class="form-group col-md-6">
                  <label for="descripcion">Autor:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="autorInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>  

                <div class="form-group col-md-6">
                  <label for="descripcion">Fecha:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="fechaInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>  

                <div class="form-group col-md-6">
                  <label for="descripcion">Captura:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="capturaInsertar" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>  

                <div class="form-group col-md-6">
                  <label for="descripcion">Proyecto:<span style="color: red;">*</span></label>
                    <select class="form-control form-control-sm" id="selectProyecto" name="proyecto">
                        <option value="0">Seleccione</option>
                    </select>                
                </div>     

                <div class="form-group col-md-6">
                  <label for="descripcion">Ecoregion:<span style="color: red;">*</span></label>
                  <select class="form-control form-control-sm" id="selectEcoregion" name="proyecto">
                        <option value="0">Seleccione</option>
                  </select>                  
                </div>                      

              </div>
                 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                <button type="button" class="btn btn-primary" id="editarbtn" onclick="crearRegistro();">Insertar</button>
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
                  <label for="nombre">Especie:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="nombre" id="especie" REQUIRED name="nombre" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Familia:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="familia" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="nombre">Nombre_comun:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="nombre" id="nombreComun" REQUIRED name="nombre" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Base_registro:<span style="color: red;">*</span></label>
                  <select class="form-control form-control-sm" id="selectBaseRegistroE" name="BaseRegistro">
                        <option value="0">Seleccione</option>
                        <option value="1">Observacion Humana</option>
                        <option value="2">Especimen</option>
                    </select>                  </div>       

                <div class="form-group col-md-6">
                  <label for="descripcion">Identificador:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="identificador" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Ano:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="ano" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Identificacion:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="identificacion" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Departamento:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="departamento" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div> 

                <div class="form-group col-md-6">
                  <label for="descripcion">Municipio:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="municipio" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>

                <div class="form-group col-md-6">
                  <label for="descripcion">Localidad:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="localidad" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>

                <div class="form-group col-md-6">
                  <label for="descripcion">Latitud:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="latitud" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>                

                <div class="form-group col-md-6">
                  <label for="descripcion">Longitud:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="longitud" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>    

                <div class="form-group col-md-6">
                  <label for="descripcion">Autor:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="autor" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>  

                <div class="form-group col-md-6">
                  <label for="descripcion">Fecha:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="fecha" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>  

                <div class="form-group col-md-6">
                  <label for="descripcion">Captura:<span style="color: red;">*</span></label>
                  <input class="form-control form-control-sm" type="text" placeholder="descripcion" id="captura" REQUIRED name="descripcion" onkeypress="return (((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32) || event.charCode == 241) || event.charCode == 209">
                </div>  

                <div class="form-group col-md-6">
                  <label for="descripcion">Proyecto:<span style="color: red;">*</span></label>
                    <select class="form-control form-control-sm" id="selectProyectoE" name="proyecto">
                        <option value="0">Seleccione</option>
                    </select>                
                </div>     

                <div class="form-group col-md-6">
                  <label for="descripcion">Ecoregion:<span style="color: red;">*</span></label>
                  <select class="form-control form-control-sm" id="selectEcoregionE" name="proyecto">
                        <option value="0">Seleccione</option>
                  </select>                  
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
    <script src="../assets/js/registro.js">
    </script>

    <script >
        getProyectos();
        getEcoregiones();
    </script>



</html>