<?php 
	require('conexion2.php');
	$query="SELECT * FROM `usuario`";
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
			$idUsuario=$row['idusuario'];
			$idcontrasenia=$row['contrasenia'];
			$idnombre=$row['NombreCompleto'];
			$idestado=$row['fk_idEstados'];
			$idnivel=$row['fk_idNivelAcceso'];
			$idcarrera=$row['fk_idcarrera'];
			$idcentro=$row['fk_idcentroU'];
				
			$usuario[] = array('idUser'=> $idUsuario, 'passUser'=> $idcontrasenia, 'nameUser'=> $idnombre, 'estadoUser'=> $idestado, 'levelUser'=> $idnivel,'carreraUser'=> $idcorrera,'centroUser'=> $idcentro);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($usuario); // de regreso al ajax
	}

 ?>