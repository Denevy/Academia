<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$model = new Crud;
	$model->select = "U.idusuario, U.alias , U.nombres, U.apellidos, U.edad, U.password, E.tipo, R.privilegio , G.grado";
	$model->from = "usuario U inner join estado E on  U.estado_idestado=E.idestado inner join rol R on U.rol_idrol=R.idrol inner join nivelAcademico G on U.nivelAcademico_idnivelAcademico=G.idnivelAcademico ";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila) 
	{
		$usuario[] = array('usuario'=>$fila['alias'], 'passUser'=>$fila['password'], 'nameUser'=>$fila['nombres']." ".$fila['apellidos'], 'estadoUser'=>$fila['tipo'], 'levelUser'=>$fila['privilegio'],'gradoUser'=>$fila['grado']);
	}
	echo json_encode($usuario);
?>