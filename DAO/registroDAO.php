<?php 
require_once('../database/conexion.php');
require_once('../models/registro.php');
require_once('../DAO/proyectosDAO.php');
require_once('../DAO/ecoregionesDAO.php');
class RegistrosDAO{

    public function allRegistro(){
        $db = Db::conectar();
        $Registros=[];

        $res = $db->prepare("SELECT * FROM Registro");
        $res->execute();

        $row = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $key => $aux) {
            $Registro = new Registro($aux);
            $Registros[$key]=$Registro;
        }
        //print_r($Registros);   
       // ECHO(json_encode($Registros));
        return $Registros;
    }

    public function getProyecto($id){
        $ProyectosDAO = new ProyectosDAO();
        $Proyecto = json_decode($ProyectosDAO->getProyecto($id));
        return $Proyecto->{'nombre'};
    }

    public function getEcoregion($id){
        $EcoregionesDAO = new EcoregionesDAO();
        $Ecoregion = json_decode($EcoregionesDAO->getEcoregion($id));
        return $Ecoregion->{'nombre'};
    }



    public function getRegistro($idRegistro){
        $db = Db::conectar();
        $Registros = [];
        $res = $db->prepare("SELECT * FROM Registro  WHERE idRegistro = '$idRegistro'");
        $res->execute();

        $row = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($row as $key => $aux) {
            $Registro = new Registro($aux);
            // array_push($Registros, $Registro);
        }

        // print_r($Registro);   
       // ECHO(json_encode($Registros));
        // print_r(json_encode($Registros));
        return $Registro->toJSONRegistro();
    }   

    public function updateRegistro($Registro){
        $db = Db::conectar();
        $date = date('Y-m-d H:i:s');
        $res = $db->query("UPDATE registro
        SET
        especie = '$Registro[especie]',
        familia = '$Registro[familia]',
        nombre_comun = '$Registro[nombre_comun]',
        base_registro = '$Registro[base_registro]',
        identificador = '$Registro[identificador]',
        ano = '$Registro[ano]',
        identificacion = '$Registro[identificacion]',
        departamento = '$Registro[departamento]',
        municipio = '$Registro[municipio]',
        localidad = '$Registro[localidad]',
        latitud = '$Registro[latitud]',
        longitud = '$Registro[longitud]',
        autor = '$Registro[autor]',
        fecha = '$Registro[fecha]',
        captura = '$Registro[captura]',
        idProyecto = '$Registro[idProyecto]',
        idEcoregion = '$Registro[idEcoregion]',
        fechaCreacion = '$date',
        fechaActualizacion = '$date'
        WHERE idRegistro = '$Registro[idRegistro]';
        ");
            
        if ($res) {

             $array= array('status'=>'success');

        }else{
            
            $array= array('status'=>'failEliminarPersona');
        }
        // var_dump($res);
        return print_r(json_encode($array));
        // return $res;

        // return $res;

    }
    
    public function createRegistro($Registro){
        $db = Db::conectar();
        $date = date('Y-m-d H:i:s');
        $res = $db->query("INSERT INTO registro 
        (especie,
        familia,
        nombre_comun,
        base_registro,
        identificador,
        ano,
        identificacion,
        departamento,
        municipio,
        localidad,
        latitud,
        longitud,
        autor,
        fecha,
        captura,
        idProyecto,
        idEcoregion,
        fechaCreacion,
        fechaActualizacion)
        VALUES
        ('$Registro[especie]',
        '$Registro[familia]',
        '$Registro[nombre_comun]',
        '$Registro[base_registro]',
        '$Registro[identificador]',
        '$Registro[ano]',
        '$Registro[identificacion]',
        '$Registro[departamento]',
        '$Registro[municipio]',
        '$Registro[localidad]',
        '$Registro[latitud]',
        '$Registro[longitud]',
        '$Registro[autor]',
        '$Registro[fecha]',
        '$Registro[captura]',
        '$Registro[idProyecto]',
        '$Registro[idEcoregion]',
        '$date',
        '$date');
    ");

        if ($res) {

             $array= array('status'=>'success');

        }else{
            
            $array= array('status'=>'failEliminarPersona');
        }
        // var_dump($res);
        return print_r(json_encode($array));
        // return $res;
    }

    public function deleteRegistro($id){
        $db = Db::conectar();

        $res = $db->query("DELETE FROM Registro WHERE idRegistro = '$id'");

        if ($res) {

             $array= array('status'=>'success');

        }else{
            
            $array= array('status'=>'failEliminarPersona');
        }
        // var_dump($res);
        return print_r(json_encode($array));
        // return $res;
    }


}


?>