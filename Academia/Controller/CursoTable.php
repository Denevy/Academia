<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = 'c.nombre, c.descripcion, ct.tipo, na.grado';
	$model->from = 'curso c inner join categoria ct on c.categoria_idcategoria = ct.idcategoria inner join nivelAcademico na on ct.nivelAcademico_idnivelAcademico= na.idnivelAcademico';
	$model->Read();
	$filas = $model->rows;
	//var_dump($filas);
	//if (empty($filas)) 
	{
		foreach ($filas as $fila)
		{
			$curso[] = array('nombre'=>$fila['nombre'], 'descripcion'=>$fila['descripcion'], 'tipo'=>$fila['tipo'], 'grado'=>$fila['grado']);
		}
	}
	
	echo json_encode($curso);
?>