<?php 
	require('conexion2.php');
	$InputBuscarDetalleProg   = utf8_decode($_POST['InputBuscarDetalleProg']); // convierte a codigo del teclado espanol
	$idencabezadoProg   = $_POST['idencabezadoProg'];
	$query="call DETPROGRA('$idencabezadoProg')";
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
		$detalleprogramacion = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idhorarios=$row['idhorarios'];
			$horaIni=$row['horaIni'];
			$horaFin=$row['horaFin'];
			$fk_iddia=$row['fk_iddia'];
			$fk_iddocente=$row['fk_iddocente'];
			$fk_idcurso=$row['fk_idcurso'];
			$fk_idencabezadoProg=$row['fk_idencabezadoProg'];

			$nombreDia=$row['nombreDia'];
			$nombre=$row['nombre'];
			$carnet=$row['carnet'];
			$nombreCurso=$row['nombreCurso'];
			$codigoCurso=$row['codigoCurso'];
			$lab=$row['lab'];


			$detalleprogramacion[] = array(
									'idhorarios'=> $idhorarios
									, 'horaIni'=> $horaIni
									, 'horaFin'=> $horaFin
									, 'fk_iddia'=> $fk_iddia
									, 'fk_iddocente'=> $fk_iddocente
									, 'fk_idcurso'=> $fk_idcurso
									, 'fk_idencabezadoProg'=> $fk_idencabezadoProg

									, 'nombreDia'=> $nombreDia 
									, 'nombre'=> $nombre 
									, 'carnet'=> $carnet 
									, 'nombreCurso'=> $nombreCurso 
									, 'codigoCurso'=> $codigoCurso 
									, 'lab'=> $lab 
									);
 		}
		
		//Creamos el JSON
		echo json_encode($detalleprogramacion); // de regreso al ajax
	}

 ?>