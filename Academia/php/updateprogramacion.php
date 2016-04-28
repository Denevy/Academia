<?php 
	require('conexion2.php');
	
	$programacion_idprogramacion   = $_POST['programacion_idprogramacion'];
	$selectaniopensum   = $_POST['selectaniopensum']; // convierte a codigo del teclado espanol
	$selectseccionpensumform = $_POST['selectseccionpensumform'];
	$selectciclopensumform   = $_POST['selectciclopensumform']; 
	session_start();
	$idNivelAcceso=$_SESSION['idNivelAcceso'];
	$idusuario=	$_SESSION['idusuario'];

	 
	$info = null;
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);

	$query="UPDATE `programacion` SET  `fk_idpensum`='$selectaniopensum', `fk_idrestriccionprogramacion`='1', `fk_idSecciones`='$selectseccionpensumform', `fk_idciclo`='$selectciclopensumform' WHERE idencabezadoProg= '$programacion_idprogramacion'	";
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