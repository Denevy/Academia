<?php 

require('conexion2.php');
session_start();
$idcentroU= $_SESSION['idcentroU'];
$idNivelAcceso=$_SESSION['idNivelAcceso'];
$idcarrera=$_SESSION['idcarrera'];
if($idNivelAcceso==2){
$query="SELECT `anioPensum`,`idpensum` FROM  `pensum` WHERE fk_idcentroU='$idcentroU' AND fk_idcarrera = '$idcarrera'";
}
if($idNivelAcceso==1){
$query="SELECT `anioPensum`,`idpensum` FROM  `punsum`";
}
if($idNivelAcceso==3){
$query="SELECT `anioPensum`,`idpensum` FROM  `pensum` WHERE fk_idcentroU='$idcentroU'";
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
	$info = array();
	while($row = mysqli_fetch_array($i)){
		$idpensum=$row['idpensum'];
		$anioPensum=$row['anioPensum'];
		$pensum[] = array('idpensum'=> $idpensum, 'anioPensum'=> $anioPensum);
		
	}
	echo json_encode($pensum); // de regreso al ajax
}

?>

