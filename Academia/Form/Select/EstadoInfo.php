<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = "*";
	$model->from = "estado";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila) 
	{
		$estado[] = array('id'=>$fila['idestado'], 'estado'=>$fila['tipo']);
	}
	echo json_encode($estado);
?>