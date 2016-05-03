<?php 
	require('conexion2.php');
	// $anioPensum   = utf8_decode($_POST['anioPensum']); // convierte a codigo del teclado espanol
	// $fk_idcentroU = utf8_decode($_POST['fk_idcentroU']);
	// $fk_idcarrera   = utf8_decode($_POST['fk_idcarrera']); 
	$anioPensum   = utf8_decode($_POST['anioPensum']); // convierte a codigo del teclado espanol
	session_start();
    $fk_idcentroU = $_SESSION['idcentroU'];
    $fk_idcarrera = $_SESSION['idcarrera'];
	

	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$query="INSERT INTO `pensum`(`anioPensum`, `fk_idcentroU`, `fk_idcarrera`)
						VALUES ('$anioPensum','$fk_idcentroU','$fk_idcarrera')";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El pensum Ya Esta Registradooooo";
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}
?>