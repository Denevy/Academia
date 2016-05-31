<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = "*";
	$model->from = "rol";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila) 
	{
		$nivel[] = array('id'=>$fila['idrol'], 'privilegio'=>$fila['privilegio']);
	}
	echo json_encode($nivel);
?>