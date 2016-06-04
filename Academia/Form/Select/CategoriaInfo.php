<?php 
	require_once('../../Crud/Conexion.php');
	require_once('../../Crud/Crud.php');

	$model = new Crud;
	$model->select = "ct.idcategoria, ct.tipo, na.grado";
	$model->from = "categoria ct inner join nivelAcademico na on ct.nivelAcademico_idnivelAcademico= na.idnivelAcademico";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila) 
	{
		$categoria[] = array('id'=>$fila['idcategoria'], 'tipo'=>$fila['tipo'], 'grado'=>$fila['grado']);
	}
	echo json_encode($categoria);
?>