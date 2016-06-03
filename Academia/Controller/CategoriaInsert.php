<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$categoria = htmlspecialchars(utf8_decode($_POST['categoria'])); // convierte a codigo del teclado espanol
	$descripcion = htmlspecialchars(utf8_decode($_POST['descripcion'])); 
	$nivel = htmlspecialchars(utf8_decode($_POST['nivel'])); 
	$model = new Crud;
	$model->insertInto = "`categoria`";
	$model->insertColumns = "`tipo`,`descripcion`,`nivelAcademico_idnivelAcademico `";

	$model->insertValues= "'$categoria','$descripcion','$nivel'";
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