<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = 'c.idcategoria , c.tipo, c.descripcion, n.grado';
	$model->from = 'categoria c inner join nivelAcademico n on c.nivelAcademico_idnivelAcademico = n.idnivelAcademico';
	$model->Read();
	$filas = $model->rows;
	//var_dump($filas);
	//if (empty($filas)) 
	{
		foreach ($filas as $fila)
		{
			$categoria[] = array('idcategoria'=>$fila['idcategoria'], 'tipo'=>$fila['tipo'], 'descripcion'=>$fila['descripcion'], 'nivel'=>$fila['grado']);
		}
	}
	
	echo json_encode($categoria);
?>