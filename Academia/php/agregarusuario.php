<?php 
	require('conexion2.php');
	$user   =  htmlspecialchars(utf8_decode($_POST['username'])); // convierte a codigo del teclado espanol
	$nombres =  htmlspecialchars(utf8_decode($_POST['nombres']));
	$apellidos =  htmlspecialchars(utf8_decode($_POST['apellidos']));
	$edad  =  htmlspecialchars(utf8_decode($_POST['edad'])); 
	$contra= utf8_decode($_POST['pass']);
	$contrasenia   = ($contra); 
	$estado    = $_POST['estado']; 
	$nivel=  $_POST['nivel'];
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	//echo $apellidos.$edad;
	$query="INSERT INTO `usuario`(`alias`,`nombres`,`apellidos`,`edad`,`password`,`estado_idestado`,`rol_idrol`)
						VALUES ('$user','$nombres','$apellidos','$edad','$contrasenia','$estado','$nivel')";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El Usuario Ya Esta Registrado";
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}
?>