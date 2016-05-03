
<?php
  session_start();
  $_SESSION['valido'] = 0;
  $_SESSION['tab']= "programacion";

  $_SESSION['NombreCompleto'] ="";
  $_SESSION['idusuario'] =0;
  $_SESSION['nombreCarrera']= "";
  $_SESSION['nombreCentroU']= "";
  $_SESSION['privilegio']= "";
   
  $_SESSION['idNivelAcceso']=0;
  $_SESSION['idcentroU']= 0;
  $_SESSION['idcarrera']= 0;
  $_SESSION['codigoCarrera']= 0;
  $_SESSION['codigoCentroU']= 0;
  $_SESSION['idEstados'] =0;

            
  if(!isset($_SESSION['nombre']))
    $_SESSION['nombre'] = "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<?php require('php/bootstrapCSS.php'); ?>
  <link href="css/carousel.css" rel="stylesheet">
</head>
<body>
	<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-th"></span>
      </button>
      <a class="navbar-brand navbar-left" href="#"><img style="max-width:160px; margin-top: -10px; " src="img/CRONOS.png" alt="chronos"> </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">INICIO</a></li>
        <li><a href="#about">INFORMACION</a></li>
        <li>
          <div class="navbar-collapse">
           <?php require('php/conexion.php'); ?> 
          <form class="navbar-form navbar-right" action="BackIndex.php" method="POST">
            <div class="form-group">
              <input type="user"  class="form-control" placeholder="User" name="nombre" required autofocus>
            </div>
            <div class="form-group">
              <input type="password"  class="form-control" placeholder="Password" name="contrasenia" required>
            </div>
            <button type="submit" class="btn btn-primary" >Log in</button>  
          </form>
          </div>
        </li>
      </ul>
    </div>
  </div> 
</nav>
	<!-- <div class="jumbotron">
      <div class="container">
        <h2>INTRODUCCION</h2>
        <p>Proyecto CHRONOS manejo de horarios de la Univerisad Mariano Galvez</p>
      </div>
  </div> --> 
  <!-- Carousel -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        
      </ol>  
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/CRONOS.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Aprendizaje</h1>
              <p>Ayudándole a facilitar los procesos de elaboracion de Calendarios de Clases como un apoyo a: <code>http://www.umg.edu.gt</code> </p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/laptop_ipad_iphone.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Desde cualquier dispositivo</h1>
              <p>Utilice su dispositivo desde cualquier lugar y en cualquier momento</p>
              <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Ver Más</a></p>   -->
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->  
  
  <div class="container">
    <!-- parrafo -->
    <img src="img/FLAT-Diseño-Web-Responsive.jpg" style="max-width:500px; margin-top: -20px;" alt="..." class="img-circle">
    
  </div>
    <div class="container">
          <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <img src="img/calendario_icono.PNG" style="max-width:250px; margin-top: -20px;" alt="..." class="img-circle">
          <h2>Versátil</h2>
          <p>Pensado para facilitar la distribución de los recursos en los horarios disponibles, con todas las restricciones que sean necesarias al alcance de un clic.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Efectivo</h2>
          <p>Calendarice cada uno de los recursos con que cuenta para trabajar durante el periodo de clases, brindando la eficiencia y eficacia que busca, otorgue permisos a usuarios para ver editar y exportar el resultado.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Intuitivo</h2>
          <p>Iconos, botones y demás, le guiaran por si solos durante su paseo por la página</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      <hr>
    </div> 
    <footer>
      <div class="container">
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; Ingeniería de Proyectos 2016</p>
        </div>
    </footer>
    <!-- /container -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
  	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php require('php/jscripts.php'); ?>
     <!--<script src="js/docs.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <!--<script src="js/ie10-viewport-bug-workaround.js"></script>-->
</body>
</html>