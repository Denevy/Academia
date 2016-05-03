<?php 
	require('conexion2.php');
	//$query="SELECT * FROM `detallepensum`";
session_start();

$idcarrera=$_SESSION['idcarrera'];



$query = "select codigoCurso, nombreCurso, nombreCiclo, anioPensum \n"
     . "FROM detallepensum DP \n"
     . "inner JOIN curso CUR ON DP.fk_idcurso = CUR.idcurso \n"
     . "inner JOIN ciclo CI ON DP.fk_idciclo = CI.idciclo \n"
     . "inner JOIN pensum P ON DP.fk_idpensum = P.idpensum\n"
     . "WHERE P.fk_idcarrera = $idcarrera";
    

	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = " ";
		$info['r2'] = "No Existen D Pensum";
		$info['errorSelect']=true;
		$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$DPensum = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$iddetallepensum=$row['codigoCurso'];
			$fk_idcurso=$row['nombreCurso'];
			$fk_idciclo=$row['nombreCiclo'];
			$fk_idpensum=$row['anioPensum'];


			$DPensum[] = array('iddetallepensum'=> $iddetallepensum, 'fk_idcurso'=> $fk_idcurso, 'fk_idciclo'=> $fk_idciclo, 'fk_idpensum'=> $fk_idpensum);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($DPensum); // de regreso al ajax
	}

 ?>