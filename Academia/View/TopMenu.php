
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-th"></span>
      </button>
      <a class="navbar-brand navbar-left" href="#"><img style="max-width:200px; margin-top: -20px; " src="../Resources/img/CRONOS.png" alt="chronos"> </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">

 

        <li><a href="#about" > <b> <?php echo $_SESSION['nombres']." ".$_SESSION['apellidos'];?></b></a></li>
        <li><a href="#about" >[<b> <?php echo$_SESSION['privilegio'];?></b>]</a></li>

        <?php   if($_SESSION['idrol']!=1){  ?>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <b> <?php echo $_SESSION['codigoCentroU'];if($_SESSION['idNivelAcceso']==2){ echo $_SESSION['codigoCarrera'];}?></b> <span class="caret"></span>
           </a>
          <ul class="dropdown-menu">
             <li><a href="#about" >Centro Universitario > [<b><?php echo $_SESSION['nombreCentroU']?></b>]</a></li>
           <?php   if($_SESSION['idNivelAcceso']==2){ ?>
             <li><a href="#about" >Carrera > [<b><?php echo $_SESSION['nombreCarrera']?></b>]</a></li>
           
          </ul>
        </li> 
        <?php    }
            }  ?>
            
       
        <li><a href="../index.php"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cerrar Sesion</a></li>
      </ul>
    </div>
  </div> 
</nav>
<br>
<br>
<br>
