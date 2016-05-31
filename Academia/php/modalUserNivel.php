<?php 
require('conexion2.php');
$query="SELECT * FROM  `rol` ";
mysqli_set_charset($conn, "utf8"); //formato de datos utf8
$x = mysqli_query($conn,$query);
$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
$info = array(); // creamos el array
$info['errorSelect']=false; 
if ($x == false) { // si la base de datos no inserto 
		$info['r1'] = "Error";
		$info['r2'] = "Mensaje Error";
		$info['errorSelect']=true;
		echo json_encode($info);
}
else{ 
	// $ciclo=array();
	while($row = mysqli_fetch_array($x)){
		$privilegio=$row['privilegio'];
		$idNivel=$row['idrol'];
		$estado[] = array('id'=> $idNivel, 'privilegio'=> $privilegio);
		
	}
	echo json_encode($estado); // de regreso al ajax
}

?>
