<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$estado   =  htmlspecialchars(utf8_decode($_POST['estado'])); // convierte a codigo del teclado espanol
	$model = new Crud;
	$model->insertInto = "`estado` ";
	$model->insertColumns = "`tipo`";

	$model->insertValues= "'$estado'";
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