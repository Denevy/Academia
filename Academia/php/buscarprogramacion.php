<?php 
	require('conexion2.php');
	$inputprogramacionbuscar   = utf8_decode($_POST['inputprogramacionbuscar']); // convierte a codigo del teclado espanol
	session_start();
	$idcentroU= $_SESSION['idcentroU'];
	$idNivelAcceso=$_SESSION['idNivelAcceso'];
	$idcarrera=$_SESSION['idcarrera'];
	if($idNivelAcceso==2){ //coord de carrera
	$query="call PROGRA ('$idcentroU','$idcarrera')";
	}
	if($idNivelAcceso==1){ // administrador
	$query="call PROGRA ('$idcentroU','$idcarrera')";
	}
	if($idNivelAcceso==3){ // coord centro u
	$query="call PROGRA ('$idcentroU','$idcarrera')";
	}
	// $query="SELECT * FROM `programacion` WHERE ':' + fecha + ':' + fk_idusuario + ':' + idencabezadoProg + ':' LIKE  '%$inputprogramacionbuscar%'  ";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	$close = mysqli_close($conn)or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = "Error ";
		$info['r2'] = "Error";
		$info['errorSelect']=true;
		$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$programacion = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idencabezadoProg=$row['idencabezadoProg'];
			$fecha=$row['fecha'];
			$fk_idusuario=$row['fk_idusuario'];
			$fk_idpensum=$row['fk_idpensum'];
			$fk_idrestriccionprogramacion=$row['fk_idrestriccionprogramacion'];
			$fk_idSecciones=$row['fk_idSecciones'];
			$fk_idciclo=$row['fk_idciclo'];

			$nombreCiclo=$row['nombreCiclo'];
			$NombreSeccion=$row['NombreSeccion'];
			$anioPensum=$row['anioPensum'];

			$programacion[] = array(
									'idencabezadoProg'=> $idencabezadoProg
									, 'fecha'=> $fecha
									, 'fk_idusuario'=> $fk_idusuario
									, 'fk_idpensum'=> $fk_idpensum
									, 'fk_idrestriccionprogramacion'=> $fk_idrestriccionprogramacion
									, 'fk_idSecciones'=> $fk_idSecciones
									, 'fk_idciclo'=> $fk_idciclo 
									, 'nombreCiclo'=> $nombreCiclo
									, 'NombreSeccion'=> $NombreSeccion
									, 'anioPensum'=> $anioPensum 
									);
 		}
		//Creamos el JSON
		echo json_encode($programacion); // de regreso al ajax
	}

 ?>