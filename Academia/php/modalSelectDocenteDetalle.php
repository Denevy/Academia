<?php 
require('conexion2.php');
$query="SELECT * FROM  `docente` WHERE fk_idEstados='1' ";
mysqli_set_charset($conn, "utf8"); //formato de datos utf8
$i = mysqli_query($conn,$query);
$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
$info = array(); // creamos el array
$info['errorSelect']=false; 
if ($i == false) { // si la base de datos no inserto 
		$info['r1'] = "Error";
		$info['r2'] = "Mensaje Error";
		$info['errorSelect']=true;
		echo json_encode($info);
}
else{ 
	while($row = mysqli_fetch_array($i)){
		$iddocente=$row['iddocente'];
		$carnet=$row['carnet'];
		$nombre=$row['nombre'];
		$profesion=$row['profesion'];
		$telefono=$row['telefono'];
		$correo=$row['correo'];
		$fk_idEstados=$row['fk_idEstados'];
		$fk_idrestriccionprogramacion=$row['fk_idrestriccionprogramacion'];
		$docente[] = array('iddocente'=> $iddocente
							, 'carnet'=> $carnet
							, 'nombre'=> $nombre
							, 'profesion'=> $profesion
							, 'telefono'=> $telefono
							, 'correo'=> $correo
							, 'fk_idEstados'=> $fk_idEstados
							, 'fk_idrestriccionprogramacion'=> $fk_idrestriccionprogramacion	
							);
	}
	echo json_encode($docente); // de regreso al ajax
}
?>
