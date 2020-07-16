<?php

class Ecoregion {   
    
    /**
    * An indentifier
    * @var string
    */
    private $idEcoregion;
    private $nombre;
    private $descripcion;
    

  /*
   * called by Dog, Cat, Bird, etc.
   */
  public function __construct($idEcoregion, $nombre, $descripcion)
  {
    $this->idEcoregion = $idEcoregion;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
  }

  public function getidEcoregion(){
    return $this->idEcoregion;
  }

  public function setidEcoregion(){

}

  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre(){

}

  public function getDescripcion(){
    return $this->descripcion;
}

public function setDescripcion(){

}

public function toJSONEcoregion(){
  $Proyecto = json_encode(array("idEcoregion"=> $this->idEcoregion,"nombre"=>$this->nombre,"descripcion"=>$this->descripcion));
  return $Proyecto;
}  

public function toArrayEcoregion(){
  $Proyecto = array("idEcoregion"=> $this->idEcoregion,"nombre"=>$this->nombre,"descripcion"=>$this->descripcion);
  return $Proyecto;
}
  
  public function __toString()
  {
    return "$this->idEcoregion nombre: $this->nombre descripcion: $this->descripcion";
  }

}

?>