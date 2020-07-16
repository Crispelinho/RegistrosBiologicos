<?php

require_once('../models/proyecto.php');

class Registro {   

    private $idRegistro;
    private $especie;
    private $familia;
    private $nombre_comun;
    private $base_registro;
    private $identificador;
    private $ano;
    private $identificacion;
    private $departamento;
    private $municipio;
    private $localidad;
    private $latitud;
    private $longitud;
    private $autor;
    private $fecha;
    private $captura;
    private $idProyecto;
    private $idEcoregion;
    private $fechaCreacion;
    private $fechaActualizacion;

      /*
   * called by Dog, Cat, Bird, etc.
   */
  public function __construct($data)

  {
    $this->idRegistro=$data["idRegistro"];
    $this->especie=$data["especie"];
    $this->familia=$data["familia"];
    $this->nombre_comun=$data["nombre_comun"];
    $this->base_registro=$data["base_registro"];
    $this->identificador=$data["identificador"];
    $this->ano=$data["ano"];
    $this->identificacion=$data["identificacion"];
    $this->departamento=$data["departamento"];
    $this->municipio=$data["municipio"];
    $this->localidad=$data["localidad"];
    $this->latitud=$data["latitud"];
    $this->longitud=$data["longitud"];
    $this->autor=$data["autor"];
    $this->fecha=$data["fecha"];
    $this->captura=$data["captura"];
    $this->idProyecto=$data["idProyecto"];
    $this->idEcoregion=$data["idEcoregion"];
    $this->fechaCreacion=$data["fechaCreacion"];
    $this->fechaActualizacion=$data["fechaActualizacion"];
  }

  public function getidRegistro	()	{return $this->idRegistro	;	}					
  public function getespecie	()	{return $this->especie	;	}					
  public function getfamilia	()	{return $this->familia	;	}					
  public function getnombre_comun	()	{return $this->nombre_comun	;	}					
  public function getbase_registro	()	{return $this->base_registro	;	}					
  public function getidentificador	()	{return $this->identificador	;	}					
  public function getano	()	{return $this->ano	;	}					
  public function getidentificacion	()	{return $this->identificacion	;	}					
  public function getdepartamento	()	{return $this->departamento	;	}					
  public function getmunicipio	()	{return $this->municipio	;	}					
  public function getlocalidad	()	{return $this->localidad	;	}					
  public function getlatitud	()	{return $this->latitud	;	}					
  public function getlongitud	()	{return $this->longitud	;	}					
  public function getautor	()	{return $this->autor	;	}					
  public function getfecha	()	{return $this->fecha	;	}					
  public function getcaptura	()	{return $this->captura	;	}					
  public function getidProyecto	()	{return $this->idProyecto	;	}					
  public function getidEcoregion	()	{return $this->idEcoregion	;	}					
  public function getfechaCreacion	()	{return $this->fechaCreacion	;	}					
  public function getfechaActualizacion	()	{return $this->fechaActualizacion	;	}					
                                              
  public function setidRegistro	(	$idRegistro	)	{	$this->idRegistro	=	$idRegistro	;	}
  public function setespecie	(	$especie	)	{	$this->especie	=	$especie	;	}
  public function setfamilia	(	$familia	)	{	$this->familia	=	$familia	;	}
  public function setnombre_comun	(	$nombre_comun	)	{	$this->nombre_comun	=	$nombre_comun	;	}
  public function setbase_registro	(	$base_registro	)	{	$this->base_registro	=	$base_registro	;	}
  public function setidentificador	(	$identificador	)	{	$this->identificador	=	$identificador	;	}
  public function setano	(	$ano	)	{	$this->	$ano	=ano	;	}
  public function setidentificacion	(	$identificacion	)	{	$this->identificacion	=	$identificacion	;	}
  public function setdepartamento	(	$departamento	)	{	$this->departamento	=	$departamento	;	}
  public function setmunicipio	(	$municipio	)	{	$this->municipio	=	$municipio	;	}
  public function setlocalidad	(	$localidad	)	{	$this->localidad	=	$localidad	;	}
  public function setlatitud	(	$latitud	)	{	$this->latitud	=	$latitud	;	}
  public function setlongitud	(	$longitud	)	{	$this->longitud	=	$longitud	;	}
  public function setautor	(	$autor	)	{	$this->autor	=	$autor	;	}
  public function setfecha	(	$fecha	)	{	$this->fecha	=	$fecha	;	}
  public function setcaptura	(	$captura	)	{	$this->captura	=	$captura	;	}
  public function setidProyecto	(	$idProyecto	)	{	$this->idProyecto	=$idProyecto	;	}
  public function setidEcoregion	(	$idEcoregion	)	{	$this->idEcoregion	=	$idEcoregion	;	}
  public function setfechaCreacion	(	$fechaCreacion	)	{	$this->fechaCreacion	=	$fechaCreacion	;	}
  
  public function toArrayProyect(){
    $Proyecto = array("idRegistro"=> $this->idRegistro,"especie"=>$this->especie,"familia"=>$this->familia,"nombre_comun"=> $this->nombre_comun,"base_registro"=>$this->base_registro,"identificador"=>$this->identificador,"ano"=> $this->ano,"identificacion"=>$this->identificacion,"departamento"=>$this->departamento,"municipio"=> $this->municipio,"localidad"=>$this->localidad,"latitud"=>$this->latitud,"longitud"=> $this->longitud,"autor"=>$this->autor,"fecha"=>$this->fecha,"captura"=> $this->captura,"idProyecto"=>$this->idProyecto,"idEcoregion"=>$this->idEcoregion,"fechaCreacion"=> $this->fechaCreacion);
    return $Proyecto;
}

public function toJSONRegistro(){
    $Proyecto = json_encode(array("idRegistro"=> $this->idRegistro,"especie"=>$this->especie,"familia"=>$this->familia,"nombre_comun"=> $this->nombre_comun,"base_registro"=>$this->base_registro,"identificador"=>$this->identificador,"ano"=> $this->ano,"identificacion"=>$this->identificacion,"departamento"=>$this->departamento,"municipio"=> $this->municipio,"localidad"=>$this->localidad,"latitud"=>$this->latitud,"longitud"=> $this->longitud,"autor"=>$this->autor,"fecha"=>$this->fecha,"captura"=> $this->captura,"idProyecto"=>$this->idProyecto,"idEcoregion"=>$this->idEcoregion,"fechaCreacion"=> $this->fechaCreacion));
    return $Proyecto;
}

}


?>
