<?php
 session_start();
  $_SESSION['valido'] = 0;
  if(!isset($_SESSION['nombre'])){
    $_SESSION['nombre'] = ""; 
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <?php require('php/bootstrapCSS.php'); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>consola</title>
  </head>
  <body>
<?php  
    if(isset($_POST['nombre'])){
      $nombre=$_POST['nombre'];
      if(isset($_POST['contrasenia'])){
        $contrasenia=$_POST['contrasenia'];
        $query= "SELECT U.idusuario, U.NombreCompleto, E.NombreEstado ,E.idEstados, NA.privilegio, NA.idNivelAcceso, CU.nombreCentroU, CU.idcentroU ,CU.codigoCentroU, C.nombreCarrera,C.codigoCarrera, C.idcarrera
                FROM usuario U 
                inner JOIN estados E ON U.fk_idEstados = E.idEstados
                inner JOIN nivelacceso NA ON U.fk_idNivelAcceso = NA.idNivelAcceso
                inner JOIN carrera C ON U.fk_idcarrera = C.idcarrera
                inner JOIN centrou CU ON U.fk_idcentroU = CU.idcentroU
                WHERE U.Usuario = '$nombre' AND U.contrasenia='$contrasenia'";
        require('php/conexion2.php');
        mysqli_set_charset($conn, "utf8"); //formato de datos utf8
        $i = mysqli_query($conn,$query);
        $n=mysqli_num_rows($i);
        $close = mysqli_close($conn)or die("Ha sucedido un error inesperado en la desconexion de la base de datos");  
        $row=mysqli_fetch_array($i);
        
        if($n==1) {
          $_SESSION['idEstados'] =$row['idEstados'];
          if($_SESSION['idEstados'] ==1){
            
            
            $_SESSION['valido'] =1;
            $_SESSION['NombreCompleto'] =$row['NombreCompleto'];
            $_SESSION['idusuario'] =$row['idusuario'];
            $_SESSION['nombreCarrera']= $row['nombreCarrera'];
            $_SESSION['nombreCentroU']= $row['nombreCentroU'];
            $_SESSION['privilegio']= $row['privilegio'];
            $_SESSION['idNivelAcceso']= $row['idNivelAcceso'];
            $_SESSION['idcentroU']= $row['idcentroU'];
            $_SESSION['idcarrera']= $row['idcarrera'];
            $_SESSION['codigoCarrera']= $row['codigoCarrera'];
            $_SESSION['codigoCentroU']= $row['codigoCentroU'];

            header("Location: dashboard.php");
          }
        }
      }  
    }
    if($_SESSION['valido']==0){
?>
      <div class="container">
        <div class="row">
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span> 
         <?php       if($_SESSION['idEstados']==2){ ?>
                [   El Usuario esta Desabilitado  ] 
        <?php       } 
              else{ ?>
                [   El Usuario o Contrasena son incorrectos  ]    
        <?php        } ?>
              <a href="index.php"><button type="button" class="btn btn-danger">Volver</button></a>
            </div>
        </div>  
      </div>
<?php
    }
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <?php require('php/jscripts.php'); ?>
  </body>
</html>