<?php 
	require('conexion2.php');
	$query="SELECT idusuario, NombreCompleto, contrasenia, fk_idNivelAcceso, Usuario, fk_idEstados, privilegio, NombreEstado, fk_idcarrera,nombreCarrera, fk_idcentroU,nombreCentroU
    FROM usuario U
    inner JOIN carrera CA ON U.fk_idcarrera = CA.idcarrera
    inner JOIN centrou CU ON U.fk_idcentroU = CU.idcentroU
    inner JOIN estados E ON U.fk_idEstados = E.idEstados
    inner JOIN nivelacceso NA ON U.fk_idNivelAcceso = NA.idNivelAcceso";
	mysqli_set_charset($conn, "utf8"); //formato de datos utf8
	$info = array(); // creamos el array
	$info['errorSelect']=false; // si hay error en $i
	$i = mysqli_query($conn,$query);
	if ($i == false ) { // si la base de datos no selecciono nada
		$info['r1'] = " ";
		$info['r2'] = "No Existen Usuarios";
		$info['errorSelect']=true;
		$close = mysqli_close($conn)or die("Error en la desconexion de la base de datos");//desconectamos la base de datos
		echo json_encode($info);
	}
	else{// si todo va bien obtenemos los datos de la tabla
		$Usuarios = array(); //creamos un array
		while($row = mysqli_fetch_array($i)){
			$idusuario=$row['idusuario'];
			$NombreCompleto=$row['NombreCompleto'];
			$contrasenia=$row['contrasenia'];
			$fk_idNivelAcceso=$row['fk_idNivelAcceso'];
			$Usuario=$row['Usuario'];
			$fk_idEstados=$row['fk_idEstados'];

			$privilegio=$row['privilegio'];
			$NombreEstado=$row['NombreEstado'];

			$fk_idcarrera=$row['fk_idcarrera'];
			$nombreCarrera=$row['nombreCarrera'];
			$fk_idcentroU=$row['fk_idcentroU'];
			$nombreCentroU=$row['nombreCentroU'];

			$Usuarios[] = array('idusuario'=> $idusuario, 'NombreCompleto'=> $NombreCompleto, 'contrasenia'=> $contrasenia, 'fk_idNivelAcceso'=> $fk_idNivelAcceso,
                        'Usuario'=> $Usuario, 'privilegio'=> $privilegio, 'NombreEstado'=> $NombreEstado , 'fk_idEstados'=> $fk_idEstados    
                        , 'fk_idcarrera'=> $fk_idcarrera, 'nombreCarrera'=> $nombreCarrera, 'fk_idcentroU'=> $fk_idcentroU, 'nombreCentroU'=> $nombreCentroU	);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($Usuarios); // de regreso al ajax
	}

 ?>