<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <?php require_once('../Resources/php/bootstrapCSS.php'); ?>
    <link href="../Resources/css/sticky-footer.css" rel="stylesheet">
    <?php require_once('../Resources/php/jscripts.php'); ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <?php if($_SESSION['idrol']== 1){?>
      <script type="text/javascript" src="../Resources/js/CursoCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/CategoriaCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/RolCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/GradoCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/createUsuario.js"> </script>
      <script type="text/javascript" src="../Resources/js/EstadoCreate.js"> </script>
    <?php }?>
    <?php if($_SESSION['idrol']!= 1){?>
      <script type="text/javascript" src="../Resources/js/CursoEstudiante.js"> </script>
    <?php }?>
    <meta name="author" content="">
    <title>Dashboard</title>
  </head>
  <body>


<?php
if($_SESSION['login'] == true)
{
    if($_SESSION['valido']==1){ // si inicio sesion correctamente
      require("TopMenu.php");
        if(!isset($_SESSION['tab'])){
        }
?>
<!-- AJAX -->
<!-- contenedor principal********************  -->
      <section class="main conatiner"> 
        <div class="container-fluid">
          <section class="post col-md-9">
            <div>
                    <!-- Tabs  -->
                <ul class="nav nav-tabs" role="tablist" id="myTab">   
                <?php if($_SESSION['idrol']==1){ ?>  
                <li role="presentation"><a href="#estado" aria-controls="estado" role="tab" data-toggle="tab">Estados</a></li>
                <li role="presentation"><a href="#rol" aria-controls="rol" role="tab" data-toggle="tab">Rol</a></li>
                <li role="presentation"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">Usuarios</a></li>
                <li role="presentation"><a href="#grado" aria-controls="grado" role="tab" data-toggle="tab">Nivel Academico</a></li>
                <li role="presentation"><a href="#categoria" aria-controls="categoria" role="tab" data-toggle="tab">Categoria</a></li>
                <li role="presentation"><a href="#curso" aria-controls="curso" role="tab" data-toggle="tab">Cursos</a></li>
                <?php } ?>
                <?php if($_SESSION['idrol']!= 1){?>
                  <li role="presentation"><a href="#CursoEstudiante" aria-controls="CursoEstudiante" role="tab" data-toggle="tab">Cursos</a></li>
                <?php }?>

                </ul>
              <!-- Tab content -->
                <div class="tab-content">
                  <!--INICIO progamacion --> 
                  <div role="tabpanel" class="tab-pane fade" id="programacion">
                    <div id="carga">
                      <img src="../Resources/img/ajax-loader.gif" />
                    </div>
                 </div>
                   <!--          FIN progamacion               --> 

                  <!-- INICIO PENSUM-->
                <?php if($_SESSION['idrol']== 1){?>
                  <div role="tabpanel" class="tab-pane fade" id="user"><?php require_once("../Model/UserTabla.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="estado"><?php require_once("../Form/EstadoForm.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="rol"><?php require_once("../Form/RolForm.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="grado"><?php require_once("../Form/GradoForm.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="categoria"><?php require_once("../Form/CategoriaForm.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="curso"><?php require_once("../Form/CursoForm.php");?> </div>
                <?php }?>
                <?php if($_SESSION['idrol']!= 1){?>
                  <div role="tabpanel" class="tab-pane fade" id="CursoEstudiante"><?php require_once("../Form/CursoEstudianteForm.php");?> </div>
                <?php }?>
            </div>
          </section> 
        </div>
      </section>       
      <footer class="footer">
        <div class="container-fluid">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; Ingenieria Proyectos 2016</p>
        </div>
      </footer>      
<?php  
    }
  }
    else{

      
      session_unset();
      session_destroy();
?>
    <div class="container">
      <div class="row">
          <div class="alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>    
            Usuario no autorizado    <a href="../index.php"><button type="button" class="btn btn-danger">Volver</button></a></div>
      </div>  
    </div>
<?php
    }

?>
  </body>
</html>




