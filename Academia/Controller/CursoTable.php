<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = 'c.idcurso, c.nombre, c.descripcion, ct.tipo';
	$model->from = 'curso c inner join categoria ct on c.categoria_idcategoria = ct.idcategoria';
	$model->Read();
	$filas = $model->rows;
	//var_dump($filas);
	//if (empty($filas)) 
	{
		foreach ($filas as $fila)
		{
			$curso[] = array('idcurso'=>$fila['idcurso'], 'nombre'=>$fila['nombre'], 'descripcion'=>$fila['descripcion'], 'tipo'=>$fila['tipo']);
		}
	}
	
	echo json_encode($curso);
?>