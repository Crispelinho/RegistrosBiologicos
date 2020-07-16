<?php 
    require_once('../database/conexion.php');
    require_once('../models/proyecto.php');

    class ProyectosDAO{

        public function allProyectos(){
            $db = Db::conectar();
            $Proyectos=[];

            $res = $db->prepare("SELECT * FROM proyecto");
            $res->execute();

            $row = $res->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $key => $aux) {
                $Proyecto = new Proyecto($aux["idProyecto"],$aux["nombre"],$aux["descripcion"]);
                $Proyectos[$key]=$Proyecto;
            }
            //print_r($Proyectos);   
           // ECHO(json_encode($Proyectos));
            return $Proyectos;
        }

        public function getProyecto($idProyecto){
            $db = Db::conectar();
            $res = $db->prepare("SELECT * FROM proyecto  WHERE idProyecto = '$idProyecto'");
            $res->execute();

            $row = $res->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $key => $aux) {
                $Proyecto = new Proyecto($aux["idProyecto"],$aux["nombre"],$aux["descripcion"]);
            }
            // print_r($Proyecto);   
           // ECHO(json_encode($Proyectos));
            // print_r(json_encode($Proyectos));
            return $Proyecto->toJSONProyect();
        }   

        public function updateProyecto($proyecto){
            $db = Db::conectar();

            $res = $db->query("UPDATE proyecto SET nombre = '$proyecto[nombre]' , descripcion = '$proyecto[descripcion]'  WHERE idProyecto = '$proyecto[idProyecto]'");

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
        
        public function createProyecto($proyecto){
            $db = Db::conectar();

            $res = $db->query("INSERT INTO proyecto (nombre, descripcion) VALUES ('$proyecto[nombre]','$proyecto[descripcion]');");

            if ($res) {

                 $array= array('status'=>'success');

            }else{
                
                $array= array('status'=>'failEliminarPersona');
            }
            // var_dump($res);
            return print_r(json_encode($array));
            // return $res;
        }

        public function deleteProyecto($id){
            $db = Db::conectar();

            $res = $db->query("DELETE FROM proyecto WHERE idProyecto = '$id'");

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