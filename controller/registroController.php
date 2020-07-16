<?php

require_once('../DAO/registroDAO.php');
require_once('../DAO/proyectosDAO.php');
require_once('../DAO/ecoregionesDAO.php');

$objRegistroDao = new RegistrosDAO();
$objProyectoDao = new ProyectosDAO();
$objEcoregionDao = new EcoregionesDAO();
//--------------------------------------------------------------------RegistroS----------------------------------------------------------------
if(isset($_GET['editarRegistro']) ){
    
   if (isset($_POST['data'])) {
     $data = $_POST['data'];
     $resultado = $objRegistroDao->updateRegistro($data);
     return $resultado;

   }
   // else{
   //     $array = array('status'=>'errorDeEnvio');
   //     print_r(json_encode($array));
   // }
}

if(isset($_GET['crearRegistro']) ){
    
    if (isset($_POST['data'])) {
      $data = $_POST['data'];
      $resultado = $objRegistroDao->createRegistro($data);
      return $resultado;
 
    }
    // else{
    //     $array = array('status'=>'errorDeEnvio');
    //     print_r(json_encode($array));
    // }
 }

 if (isset($_GET['getRegistro'])) {
    $id = $_GET['id'];
    $resultado = $objRegistroDao->getRegistro($id);
    // $array = array('status'=>'success');
    // var_dump($resultado);
    return print_r($resultado);
   // return $resultado;
}

if(isset($_GET['deleteRegistro']) ){
    
    //print_r($_POST['data']);

   if (isset($_POST['id'])) {
     $id = $_POST['id'];
     $resultado = $objRegistroDao->deleteRegistro($id);

     return $resultado;

    }
}

if(isset($_GET['getProyectos']) ){

     $resultado = $objProyectoDao->allProyectos();
     $array = [];
     foreach ($resultado as $value) {
        array_push($array, $value->toArrayProyect());
     }
     
     return print_r(json_encode($array));

}

if(isset($_GET['getEcoregiones']) ){

    $resultado = $objEcoregionDao->allEcoregiones();
    $array = [];
    foreach ($resultado as $value) {
       array_push($array, $value->toArrayEcoregion());
    }
    
    return print_r(json_encode($array));
}

if(isset($_GET['csv']) ){
    $resultado = $objRegistroDao->allRegistro();
    $delimiter = ";";
    $filename = "registros_" . date('Y-m-d') . ".csv";
    $f = fopen('php://memory', 'w');
    $fields = array('idRegistro', 'Especie', 'Familia', 'Nombre Comun', 'Base Registro', 'Identificador', 'ano', 'Identificacion', 'Departamento');
    fputcsv($f, $fields, $delimiter);
    foreach ($resultado as $q)
  
     {
      $r=$q->toArrayProyect();
  
      $lineData = array($r['idRegistro'], $r['especie'], $r['familia'], $r['nombre_comun'], $r['base_registro'], $r['identificador'], $r['ano'], $r['identificacion'], $r['departamento']);
      fputcsv($f, array_map('utf8_decode',array_values($lineData)), $delimiter);
    }
  
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
  
    fpassthru($f);
  }

?>