<?php 
	require('conexion2.php');
	$query="SELECT * FROM `curso`";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = " ";
		$info['r2'] = "No Existen cursos";
		$info['errorSelect']=true;
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$curso = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idcurso=$row['idcurso'];
			$codigoCurso=$row['codigoCurso'];
			$nombreCurso=$row['nombreCurso'];
			$labCurso=$row['lab'];
			$curso[] = array('idcurso'=> $idcurso, 'codigocurso'=> $codigoCurso, 'nombrecurso'=> $nombreCurso, 'labcurso1'=> $labCurso);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($curso); // de regreso al ajax
	}

 ?>