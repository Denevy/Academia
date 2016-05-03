<?php 
require('conexion2.php');
$query="SELECT * FROM  `curso`";
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
		$idcurso=$row['idcurso'];
		$codigoCurso=$row['codigoCurso'];
		$nombreCurso=$row['nombreCurso'];
		$lab=$row['lab'];
		$curso[] = array('idcurso'=> $idcurso
							, 'codigoCurso'=> $codigoCurso
							, 'nombreCurso'=> $nombreCurso
							, 'lab'=> $lab
							);
	}
	echo json_encode($curso); // de regreso al ajax
}
?>
