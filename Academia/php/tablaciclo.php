<?php 
	require('conexion2.php');
	$query="SELECT * FROM `ciclo`";
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
		$ciclo = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idciclo=$row['idciclo'];
			$nombreCiclo=$row['nombreCiclo'];
			$ciclo[] = array('idciclo'=> $idciclo, 'nombreciclo'=> $nombreCiclo);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($ciclo); // de regreso al ajax
	}

 ?>