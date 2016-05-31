<?php 

	class Conexion{
		public function conectar()
		{
			$usuario = 'siem';
			$password = 'Academia1234/';
			$host = 'localhost';
			$db = 'siem';

			return $conexion = new PDO("mysql:host=$host;dbname=$db",$usuario, $password);
		}		
	}
?> 