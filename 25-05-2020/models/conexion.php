<?php

	class Conexion{

		public static function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=practica", "root", "");
			return $link;
		}
	}
?>