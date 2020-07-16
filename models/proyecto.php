<?php

class Proyecto {   
    
    private $idProyecto;
    private $nombre;
    private $descripcion;
    
    public function __construct($idProyecto, $nombre, $descripcion)
    {
        $this->idProyecto = $idProyecto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        //echo ("<br> Constructor  <br>");
    }
    
    public function getidProyecto()
    {
        return $this->idProyecto;
    }
    
    public function setidProyecto($idProyecto){
        $this->idProyecto = $idProyecto;
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
    
    public function toJSONProyect(){
        $Proyecto = json_encode(array("idProyecto"=> $this->idProyecto,"nombre"=>$this->nombre,"descripcion"=>$this->descripcion));
        return $Proyecto;
    }
    
    public function toArrayProyect(){
        $Proyecto = array("idProyecto"=> $this->idProyecto,"nombre"=>$this->nombre,"descripcion"=>$this->descripcion);
        return $Proyecto;
    }
    
    public function toString()
    {   
        return "$this->idProyecto nombre: $this->nombre descripcion: $this->descripcion <br>";
    } 
    
}


?>
