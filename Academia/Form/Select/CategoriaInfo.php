<?php 
	require_once('../../Crud/Conexion.php');
	require_once('../../Crud/Crud.php');

	$model = new Crud;
	$model->select = "idcategoria,tipo";
	$model->from = "categoria";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila) 
	{
		$categoria[] = array('id'=>$fila['idcategoria'], 'tipo'=>$fila['tipo']);
	}
	echo json_encode($categoria);
?>