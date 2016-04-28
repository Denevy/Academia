<?php 
	require('conexion2.php');
	// $idpensum    = $_POST['idpensum'];
	// $anioPensum   = utf8_decode($_POST['anioPensum']); // convierte a codigo del teclado espanol
	// $fk_idcentroU= utf8_decode($_POST['fk_idcentroU']);
	// $fk_idcarrera    = utf8_decode($_POST['fk_idcarrera']); 

    $idpensum    = $_POST['idpensum'];
	$anioPensum   = utf8_decode($_POST['anioPensum']); // convierte a codigo del teclado espanol
	session_start();
    $fk_idcentroU = $_SESSION['idcentroU'];
    $fk_idcarrera = $_SESSION['idcarrera'];
	
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);

	$query="UPDATE `pensum` SET `anioPensum`='$anioPensum',`fk_idcentroU`='$fk_idcentroU',`fk_idcarrera`='$fk_idcarrera' WHERE idpensum='$idpensum'" ;
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El Usuario No Fue Actualizado ;".$idpensum." ;".$anioPensum.";  ".$fk_idcentroU.";  ".$fk_idcarrera;
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}

 ?>
