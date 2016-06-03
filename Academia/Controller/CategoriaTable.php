<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = "*";
	$model->from = "categoria";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$categoria[] = array('idcategoria'=>$fila['idcategoria'], 'tipo'=>$fila['tipo'], 'descripcion'=>$fila['descripcion']);
	}
	echo json_encode($categoria);
?>