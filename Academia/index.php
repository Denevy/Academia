<?php
require_once 'Controller/Login.php';
require_once 'Crud/Conexion.php';
session_start();
$_SESSION['login'] = false;
$mensaje = null;
if(isset($_POST['verificar']))
{
  $model = new Login;
  $model->usuario = htmlspecialchars($_POST['usuario']);
  //$model->password= sha1(htmlspecialchars($_POST['password']));
  $model->password=sha1(htmlspecialchars($_POST['password']));
  $model->verificar();
  $mensaje = $model->mensaje;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<?php require('Resources/php/bootstrapCSS.php'); ?>
  <link href="Resources/css/carousel.css" rel="stylesheet">
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
      <a class="navbar-brand navbar-left" href="#"><img style="max-width:160px; margin-top: -10px; " src="Resources/img/CRONOS.png" alt="chronos"> </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">INICIO</a></li>
        <li><a href="informacion" class="dropdown-menu">INFORMACION</a></li>
        <li>
          <div class="navbar-collapse">
          <form class="navbar-form navbar-right" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">
            <div class="form-group">
              <input type="user"  class="form-control" placeholder="User" name="usuario" required autofocus>
            </div>
            <div class="form-group">
              <input type="password"  class="form-control" placeholder="Password" name="password" required>
            </div>
            <input type ='hidden' name='verificar'>
            <input type ='submit' class="btn btn-primary" value='ENVIAR'>
            <!--button type="submit" class="btn btn-primary" >Log in</button-->  
          </form>
          </div>
        </li>
      </ul>
    </div>
  </div> 
</nav>
            <?php 
              if($mensaje != null)
              {
                echo $mensaje;
              }
               ?>'
  </div> --> 
  <!-- Carousel -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>  
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="Resources/img/CRONOS.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Aprendizaje</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="Resources/img/laptop_ipad_iphone.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>En cualquier momento</h1>
              <p>En cualquier Lugar</p>
              <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Ver Más</a></p>   -->
            </div>
          </div>
        </div>
      
              <div class="item">
          <img class="third-slide" src="Resources/img/valor_agregado.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Valor Agregado</h1>
              <p>El conocimiento visto como un valor agregado</p>
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
    <img src="Resources/img/FLAT-Diseño-Web-Responsive.png" style="max-width:500px; margin-top: -20px;" alt="..." class="img-circle">
    
  </div>
    <div class="container">
          <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <img src="Resources/img/calendario_icono.jpg" style="max-width:250px; margin-top: -20px;" alt="..." class="img-circle">
          <h2>Desde cualquier dispositivos</h2>
          <p>Pensado para facilitar la distribución de los recursos en los horarios disponibles, con todas las restricciones que sean necesarias al alcance de un clic.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Aprenda de forma Facil</h2>
          <p>En los momentos de ocio, tome un tiempo para aprender y refrescar de temas de su interes.</p>
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
          <p>&copy; Ingeniería de Software 2016</p>
        </div>
    </footer>
    <!-- /container -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
  	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php require_once('Resources/php/jscripts.php'); ?>
     <!--<script src="js/docs.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <!--<script src="js/ie10-viewport-bug-workaround.js"></script>-->
</body>
</html>
