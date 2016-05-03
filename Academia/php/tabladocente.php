<?php 
	require('conexion2.php');
	$query="SELECT * FROM `docente`";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = " ";
		$info['r2'] = "No Existen Usuarios";
		$info['errorSelect']=true;
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$docente = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$iddoce=$row['iddocente'];
			$idcarnet=$row['carnet'];
			$idnombre=$row['nombre'];
			$idprofesion=$row['profesion'];
			$idtelefono=$row['telefono'];
			$idcorreo=$row['correo'];
			$idestados=$row['fk_idEstados'];
			$idrestricciones=$row['fk_idrestriccionprogramacion'];
				
			$docente[] = array('idoce'=> $iddoce, 'carnetdoce'=> $idcarnet, 'nombredoce'=> $idnombre, 'profesiondoce'=> $idprofesion, 'telefonodoce'=> $idtelefono,'correodoce'=> $idcorreo,'estadodoce'=> $idestados, 'restricciondoce'=> $idrestricciones);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($docente); // de regreso al ajax
	}

 ?>