<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$user   =  htmlspecialchars(utf8_decode($_POST['username'])); // convierte a codigo del teclado espanol
	$nombres =  htmlspecialchars(utf8_decode($_POST['nombres']));
	$apellidos =  htmlspecialchars(utf8_decode($_POST['apellidos']));
	$edad  =  htmlspecialchars(utf8_decode($_POST['edad'])); 
	$contra= sha1($_POST['pass']);
	$contrasenia   = ($contra); 
	$estado    = $_POST['estado']; 
	$nivel=  $_POST['nivel'];
	$grado=  $_POST['grado'];

	$model = new Crud;
	$model->insertInto = "`usuario` ";
	$model->insertColumns = "`alias`,`nombres`,`apellidos`,`edad`,`password`,`estado_idestado`,`rol_idrol`,`nivelAcademico_idnivelAcademico`";

	$model->insertValues= "'$user','$nombres','$apellidos','$edad','$contrasenia','$estado','$nivel','$grado'";
	$model->Create();
	$mensaje = $model->mensaje;
		$info = null;
		$info = array(); // creamos el array
		unset($info['r1']);
		unset($info['r2']);
		$info['r1'] = 'Transacción ';
		$info['r2'] = $mensaje;
	echo json_encode($info);
?>