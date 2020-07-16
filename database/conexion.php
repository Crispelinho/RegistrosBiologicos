<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO('mysql:host=localhost;dbname=REGISTROS_BIOLOGICOSBD','root','',$pdo_options);
			self::$conexion->query("SET NAMES 'utf8'");
			return self::$conexion;

		}		
	} 
?>