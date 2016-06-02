<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$grado = htmlspecialchars(utf8_decode($_POST['grado'])); // convierte a codigo del teclado espanol
	$model = new Crud;
	$model->insertInto = "`nivelAcademico`";
	$model->insertColumns = "`grado`";

	$model->insertValues= "'$grado'";
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