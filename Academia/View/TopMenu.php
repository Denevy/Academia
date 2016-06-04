
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
       
        <li><a href="../index.php"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cerrar Sesion</a></li>
      </ul>
    </div>
  </div> 
</nav>
<br>
<br>
<br>
