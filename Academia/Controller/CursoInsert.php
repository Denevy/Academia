<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$nombre = htmlspecialchars(utf8_decode($_POST['nombre'])); // convierte a codigo del teclado espanol
	$descripcion = htmlspecialchars(utf8_decode($_POST['descripcion'])); 
	$categoria = htmlspecialchars(utf8_decode($_POST['categoria'])); 
	$model = new Crud;
	$model->insertInto = "`curso`";
	$model->insertColumns = "`nombre`,`descripcion`,`categoria_idcategoria`";

	$model->insertValues= "'$nombre','$descripcion','$categoria'";
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