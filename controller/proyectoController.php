<?php

require_once('../DAO/proyectosDAO.php');

$objProyectoDao = new ProyectosDAO();
//--------------------------------------------------------------------PROYECTOS----------------------------------------------------------------
if(isset($_GET['editarProyecto']) ){
    
   if (isset($_POST['data'])) {
     $data = $_POST['data'];
     $resultado = $objProyectoDao->updateProyecto($data);
     return $resultado;

   }
   // else{
   //     $array = array('status'=>'errorDeEnvio');
   //     print_r(json_encode($array));
   // }
}

if(isset($_GET['crearProyecto']) ){
    
    if (isset($_POST['data'])) {
      $data = $_POST['data'];
      $resultado = $objProyectoDao->createProyecto($data);
      return $resultado;
 
    }
    // else{
    //     $array = array('status'=>'errorDeEnvio');
    //     print_r(json_encode($array));
    // }
 }

 if (isset($_GET['getProyecto'])) {
    $id = $_GET['id'];
    $resultado = $objProyectoDao->getProyecto($id);
    // $array = array('status'=>'success');
    // var_dump($resultado);
    return print_r($resultado);
   // return $resultado;
}

if(isset($_GET['deleteProyecto']) ){
    
    //print_r($_POST['data']);

   if (isset($_POST['id'])) {
     $id = $_POST['id'];
     $resultado = $objProyectoDao->deleteProyecto($id);

     return $resultado;

}
}

?>