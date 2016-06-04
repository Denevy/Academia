<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = "*";
	$model->from = "nivelAcademico";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila) 
	{
		$consulta[] = array('grado'=>$fila['grado']);
	}
	echo json_encode($consulta);
?>