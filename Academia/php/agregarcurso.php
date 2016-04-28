<?php 
	require('conexion2.php');
	$codigocurso   = utf8_decode($_POST['codigocurso']); // convierte a codigo del teclado espanol
	$nombrecurso = utf8_decode($_POST['nombrecurso']);
	$labocurso = utf8_decode($_POST['laboracurso']);
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$query="INSERT INTO `curso`(`codigoCurso`, `nombreCurso` , `lab`)
						VALUES ('$codigocurso','$nombrecurso', '$labocurso')";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El Centro Universitario Ya Esta Registrado";
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}
?>