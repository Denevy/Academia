<?php 

require('conexion2.php');
session_start();
$idNivelAcceso=$_SESSION['idNivelAcceso'];
$idpensum   = $_POST['idpensum'];

if($idNivelAcceso==1){
	$query="SELECT idciclo, nombreCiclo FROM ciclo  INNER JOIN detallepensum ON idciclo = fk_idciclo WHERE fk_idpensum ='$idpensum' GROUP BY nombreCiclo";
}
if($idNivelAcceso==2){
	$query="SELECT idciclo, nombreCiclo FROM ciclo  INNER JOIN detallepensum ON idciclo = fk_idciclo WHERE fk_idpensum ='$idpensum' GROUP BY nombreCiclo";
}

if($idNivelAcceso==3){
	$query="SELECT idciclo, nombreCiclo FROM ciclo  INNER JOIN detallepensum ON idciclo = fk_idciclo WHERE fk_idpensum ='$idpensum' GROUP BY nombreCiclo";
}
mysqli_set_charset($conn, "utf8"); //formato de datos utf8
$i = mysqli_query($conn,$query);
$close = mysqli_close($conn)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
$info = array(); // creamos el array
$info['errorSelect']=false; 
if ($i == false) { // si la base de datos no inserto 
		$info['r1'] = "Error de Registro";
		$info['r2'] = "Cree Un Pensum";
		$info['errorSelect']=true;
		echo json_encode($info);
}
else{ 
	// $ciclo=array();
	while($row = mysqli_fetch_array($i)){
		// $idpensum=$row['idpensum'];
		$idciclo=$row['idciclo'];
		$nombreCiclo=$row['nombreCiclo'];
		$ciclo[] = array('idciclo'=> $idciclo,'nombreCiclo'=> $nombreCiclo);
		
	}
	echo json_encode($ciclo); // de regreso al ajax
}

?>
