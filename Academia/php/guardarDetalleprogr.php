<?php 
	require('conexion2.php');
	$selectDIAform   = $_POST['selectDIAform']; // convierte a codigo del teclado espanol
	$selectDocenteform = $_POST['selectDocenteform'];
	$selectCursoform = $_POST['selectCursoform'];
	$horaIniInput = $_POST['horaIniInput'];
	$horaFinInput = $_POST['horaFinInput'];
	$idencabezadoProg   = $_POST['idencabezadoProg']; 
	session_start();
	$idNivelAcceso=$_SESSION['idNivelAcceso'];
	$idusuario=	$_SESSION['idusuario'];
	$info = array(); // creamos el array
	unset($info['r1']); // limpiar el array
	unset($info['r2']);
	$hora1 = strtotime( $horaIniInput);
	$hora2 = strtotime( $horaFinInput);
	if($hora1>=$hora2){
	    // echo '$hora1 es mayor a $hora2';
	    $info['r1'] = "Error de Horario";
		$info['r2'] = "La hora inicial no puede ser mayor o igual a la hora final";
		echo json_encode($info);
	} 
	else{
	    $query1="SELECT * FROM detalleprogramacion WHERE fk_iddia = '$selectDIAform'AND fk_iddocente = '$selectDocenteform'
							 AND (
							 	('$horaIniInput' >= horaIni AND '$horaFinInput' <= horaFin) 
                                   OR (horaIni >= '$horaIniInput' AND horaFin <= '$horaFinInput')
								   OR (
								   		( '$horaIniInput' >= horaIni AND '$horaIniInput'  <   horaFin) AND '$horaFinInput' >=  horaFin
								   	)  
								   OR (
								   	'$horaIniInput' <=  horaIni  AND  ('$horaFinInput' > horaIni AND '$horaFinInput' <=   horaFin)
								 )
							) LIMIT 0 , 1
							 ";
		mysqli_set_charset($conn, "utf8"); //formato de datos utf8									
		$y = mysqli_query($conn,$query1);
		$n=mysqli_num_rows($y);
		//or die("Error  en la conexion de la base de datos");
		if ($n>0) { // si la base de datos no inserto 
			$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
			$info['r1'] = "Error de Registro";
			$info['r2'] = "El Dato Ya Esta Registrado ";
			echo json_encode($info);

		}
		else{ 
			$query="INSERT INTO `detalleprogramacion`(`horaIni`, `horaFin`, `fk_iddia`, `fk_iddocente`, `fk_idcurso`, `fk_idencabezadoProg`)
						VALUES ('$horaIniInput','$horaFinInput','$selectDIAform','$selectDocenteform','$selectCursoform','$idencabezadoProg')";
											
			$i = mysqli_query($conn,$query);
			//or die("Error  en la conexion de la base de datos");
			$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
		  	if ($i == false ) { // si la base de datos no inserto 
				$info['r1'] = "Error de Registro";
				$info['r2'] = "El Dato Ya Esta Registrado";
				echo json_encode($info);
			}
			else{ 
				$info['r1'] = "Transaccion";
				$info['r2'] = "Datos Ingresados Exitosamente";
				echo json_encode($info);
			}
		}
	}	
?>