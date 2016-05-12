<?php 
	require('conexion2.php');
	$query="select U.idusuario, U.alias , U.nombres, U.apellidos, U.edad, U.password, E.tipo, R.privilegio from usuario U inner join estado E on  U.estado_idestado=E.idestado inner join rol R on U.rol_idrol=R.idrol";
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
			$alias=$row['alias'];
			$contrasenia=$row['password'];
			$nombres=$row['nombres'];
			$apellidos=$row['apellidos'];
			$estado=$row['tipo'];
			$nivel=$row['privilegio'];
			$nombrecompleto=$nombres." ".$apellidos;
			$usuario[] = array('idUser'=> $idUsuario,'usuario'=> $alias,'passUser'=> $contrasenia, 'nameUser'=>$nombrecompleto, 'estadoUser'=> $estado, 'levelUser'=> $nivel);
 		}
		$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
		//Creamos el JSON
		echo json_encode($usuario); // de regreso al ajax
	}

 ?>