<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$user   =  htmlspecialchars(utf8_decode($_POST['username'])); // convierte a codigo del teclado espanol
	$nombres =  htmlspecialchars(utf8_decode($_POST['nombres']));
	$apellidos =  htmlspecialchars(utf8_decode($_POST['apellidos']));
	$edad  =  htmlspecialchars(utf8_decode($_POST['edad'])); 
	$contra= utf8_decode($_POST['pass']);
	$contrasenia   = ($contra); 
	$estado    = $_POST['estado']; 
	$nivel=  $_POST['nivel'];

	$model = new Crud;
	$model->insertInto = "`usuario` ";
	$model->insertColumns = "`alias`,`nombres`,`apellidos`,`edad`,`password`,`estado_idestado`,`rol_idrol`";

	$model->insertValues= "'$user','$nombres','$apellidos','$edad','$contrasenia','$estado','$nivel'";
	$model->Create();
		$info = array(); // creamos el array
	//unset($info['r1']); // limpiar el array
	unset($info['r2']);
	echo json_encode($info);
?>