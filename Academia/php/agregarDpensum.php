<?php 
	require('conexion2.php');
	$fk_idcurso   = utf8_decode($_POST['fk_idcurso']); // convierte a codigo del teclado espanol
	$fk_idciclo = utf8_decode($_POST['fk_idciclo']);
	$fk_idpensum   = utf8_decode($_POST['fk_idpensum']); 

	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$query="INSERT INTO `detallepensum`(`fk_idcurso`, `fk_idciclo`, `fk_idpensum`)
						VALUES ('$fk_idcurso','$fk_idciclo','$fk_idpensum')";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El detalle pensum Ya Esta Registradooooo";
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}
?>