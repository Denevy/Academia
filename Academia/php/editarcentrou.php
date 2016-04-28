<?php 
	require('conexion2.php');
	$id    = $_POST['id'];
	$codigo   = utf8_decode($_POST['codigo']); // convierte a codigo del teclado espanol
	$nombre = utf8_decode($_POST['nombre']); 
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$query="UPDATE `centrou` SET `codigoCentroU`='$codigo',`nombreCentroU`='$nombre' WHERE idcentroU='$id'" ;
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El Usuario No Fue Actualizado ;".$id." ; ".$codigo.";  ".$nombre;
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}

 ?>