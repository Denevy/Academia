<?php 
	require('conexion2.php');
	$iddocente   = $_POST['iddocente'];
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$query="DELETE FROM docente WHERE iddocente='$iddocente'";
										
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El Usuario no fue Eliminado";
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Dato= ".$iddocente." Eliminado Exitosamente ";
		echo json_encode($info);
	}

	

 ?>