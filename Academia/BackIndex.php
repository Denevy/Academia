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
        $contrasenia=($_POST['contrasenia']);
        $query= "SELECT U.idusuario, U.password, U.alias, U.nombres, U.apellidos, E.tipo ,E.idestado, R.privilegio, R.idrol
                FROM usuario U 
                inner JOIN estado E ON U.estado_idestado = E.idestado
                inner JOIN rol R ON U.rol_idrol = R.idrol
                WHERE U.alias = '$nombre' AND U.password ='$contrasenia'";
        require('php/conexion2.php');
        mysqli_set_charset($conn, "utf8"); //formato de datos utf8
        $i = mysqli_query($conn,$query);
        $n=mysqli_num_rows($i);
        $close = mysqli_close($conn)or die("Ha sucedido un error inesperado en la desconexion de la base de datos");  
        $row=mysqli_fetch_array($i);
        if($n==1) {
          $_SESSION['idestado'] =$row['idestado'];
          if($_SESSION['idestado'] ==1){           
            $_SESSION['valido'] =1;
            $_SESSION['nombres'] =$row['nombres'];
            $_SESSION['apellidos'] =$row['apellidos'];
            $_SESSION['idusuario'] =$row['idusuario'];
            $_SESSION['privilegio']= $row['privilegio'];
            $_SESSION['idrol']= $row['idrol'];
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
         <?php       if($_SESSION['idestado']==2){ ?>
                [   El Usuario esta Desabilitado  ] 
        <?php       } 
              else{ ?>
                [   El Usuario o Contrasena son incorrectos  ]   
        <?php  echo $contrasenia; echo $pass;     } ?>
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