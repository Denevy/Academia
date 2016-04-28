<?php 
	require('conexion2.php');
	session_start();

	$idusuario = $_SESSION['idcentroU'];
	
	$query = "SELECT * FROM `pensum` WHERE fk_idcentroU = $idusuario";
	
	//$query="SELECT * FROM `pensum`";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = " ";
		$info['r2'] = "No Existen Pensum";
		$info['errorSelect']=true;
		$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$Pensum = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idpensum=$row['idpensum'];
			$anioPensum=$row['anioPensum'];
			$fk_idcentroU=$row['fk_idcentroU'];
			$fk_idcarrera=$row['fk_idcarrera'];


			$Pensum[] = array('idpensum'=> $idpensum, 'anioPensum'=> $anioPensum, 'fk_idcentroU'=> $fk_idcentroU, 'fk_idcarrera'=> $fk_idcarrera,
                       );
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($Pensum); // de regreso al ajax
	}

 ?>