<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$privilegio = htmlspecialchars(utf8_decode($_POST['rol'])); // convierte a codigo del teclado espanol
	$model = new Crud;
	$model->insertInto = "`rol`";
	$model->insertColumns = "`privilegio`";

	$model->insertValues= "'$privilegio'";
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