<?php 
	require_once('../Crud/Conexion.php');
	require_once('../Crud/Crud.php');

	$preguntaId   =  htmlspecialchars(utf8_decode($_POST['idPregunta'])); // convierte a codigo del teclado espanol
	$pregunta   =  htmlspecialchars(utf8_decode($_POST['pregunta']));
	$evaluacion   =  htmlspecialchars(utf8_decode($_POST['idEvaluacion']));
	$model = new Crud;
	$model->insertInto = "`Preguntas` ";
	$model->insertColumns = "`idPregunta`,`pregunta`,`evaluacion_idEvaluacion`";

	$model->insertValues= "'$preguntaId','$pregunta','$evaluacion'";
	$model->Create();
	$mensaje = $model->mensaje;
		$info = null;
		$info = array(); // creamos el array
		unset($info['r1']);
		unset($info['r2']);
		$info['r1'] = 'Transacción ';
		$info['r2'] = $mensaje;
	echo json_encode($info);
?>