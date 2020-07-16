<?php

require_once('../DAO/ecoregionesDAO.php');

$objEcoregionDao = new EcoregionesDAO();
//--------------------------------------------------------------------PROYECTOS----------------------------------------------------------------


if(isset($_GET['crearEcoregion']) ){
    
    if (isset($_POST['data'])) {
      $data = $_POST['data'];
      $resultado = $objEcoregionDao->createEcoregion($data);
      return $resultado;
 
    }
 }

 if (isset($_GET['getEcoregion'])) {
    $id = $_GET['id'];
    $resultado = $objEcoregionDao->getEcoregion($id);

    return print_r($resultado);

}

if(isset($_GET['editarEcoregion']) ){
    
   if (isset($_POST['data'])) {
     $data = $_POST['data'];
     $resultado = $objEcoregionDao->updateEcoregion($data);
     return $resultado;

   }
}
if(isset($_GET['deleteEcoregion']) ){

   if (isset($_POST['id'])) {
     $id = $_POST['id'];
     $resultado = $objEcoregionDao->deleteEcoregion($id);

     return $resultado;

}
}

?>