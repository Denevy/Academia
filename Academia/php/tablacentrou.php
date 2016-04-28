<?php 
	require('conexion2.php');
	$query="SELECT * FROM `centrou`";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = " ";
		$info['r2'] = "No Existen Centros Universitarios";
		$info['errorSelect']=true;
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$centrou = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idcentrou=$row['idcentroU'];
			$codigoCentrou=$row['codigoCentroU'];
			$nombreCentrou=$row['nombreCentroU'];
			$centrou[] = array('idcentrou'=> $idcentrou, 'codigocentrou'=> $codigoCentrou, 'nombrecentrou'=> $nombreCentrou);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($centrou); // de regreso al ajax
	}

 ?>