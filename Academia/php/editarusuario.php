<?php 
	require('conexion2.php');
	$id    = $_POST['id'];
	$user   = utf8_decode($_POST['user']); // convierte a codigo del teclado espanol
	$nombre = utf8_decode($_POST['nombre']);
	$contrasenia   = utf8_decode($_POST['contrasenia']); 
	$nacceso    = $_POST['nacceso'];
	$estado    = $_POST['estado']; 
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$query="UPDATE `usuario` SET `NombreCompleto`='$nombre',`contrasenia`='$contrasenia',`fk_idNivelAcceso`='$nacceso',`Usuario`='$user',`fk_idEstados`='$estado' WHERE idusuario='$id'" ;
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
	$i = mysqli_query($conn,$query);
	//or die("Error  en la conexion de la base de datos");
	$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
  	if ($i == false ) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "El Usuario No Fue Actualizado ;".$id." ;".$user.";  ".$nombre.";  ".$contrasenia.";  ".$nacceso."; ".$estado;
		echo json_encode($info);
	}
	else{ 
		$info['r1'] = "Transaccion";
		$info['r2'] = "Datos Ingresados Exitosamente";
		echo json_encode($info);
	}

 ?>