<?php 
    require_once('../database/conexion.php');
    require_once('../models/ecoregion.php');

    class EcoregionesDAO{

        public function allEcoregiones(){
            $db = Db::conectar();
            $ecoregiones=[];

            $eco = $db->prepare("SELECT * FROM ecoregion");
            $eco->execute();

            $row = $eco->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $key => $aux) {
                $ecoregion = new Ecoregion($aux["idEcoregion"],$aux["nombre"],$aux["descripcion"]);
                $ecoregiones[$key]=$ecoregion;
            }
            //print_r($Proyectos);   
           // ECHO(json_encode($Proyectos));
            return $ecoregiones;
        }

         public function createEcoregion($ecoregion){
            $db = Db::conectar();

            $eco = $db->query("INSERT INTO ecoregion (nombre, descripcion) VALUES ('$ecoregion[nombre]','$ecoregion[descripcion]');");

            if ($eco) {

                 $array= array('status'=>'success');

            }else{
                
                $array= array('status'=>'fail');
            }
            // var_dump($eco);
            return print_r(json_encode($array));
            // return $eco;
        }

        public function getEcoregion($idEcoregion){
            $db = Db::conectar();
            $eco = $db->prepare("SELECT * FROM ecoregion  WHERE idEcoregion = '$idEcoregion'");
            $eco->execute();

            $row = $eco->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $key => $aux) {
                $ecoregion = new Ecoregion($aux["idEcoregion"],$aux["nombre"],$aux["descripcion"]);
            }

            return $ecoregion->toJSONEcoregion();
        }   

        public function updateEcoregion($ecoregion){
            $db = Db::conectar();

            $eco = $db->query("UPDATE ecoregion SET nombre = '$ecoregion[nombre]' , descripcion = '$ecoregion[descripcion]'  WHERE idEcoregion = '$ecoregion[idEcoregion]'");

            if ($eco) {

                 $array= array('status'=>'success');

            }else{
                
                $array= array('status'=>'fail');
            }
    
            return print_r(json_encode($array));
        
        }
              

        public function deleteEcoregion($id){
            $db = Db::conectar();

            $eco = $db->query("DELETE FROM ecoregion WHERE idEcoregion = '$id'");

            if ($eco) {

                 $array= array('status'=>'success');

            }else{
                
                $array= array('status'=>'fail');
            }
            // var_dump($eco);
            return print_r(json_encode($array));
            // return $eco;
        }



    }
    ?>