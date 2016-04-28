<?php
session_start();
  if(!isset($_SESSION['valido'])){
    $_SESSION['valido'] = 0;
  if(!isset($_SESSION['nombre']))
    $_SESSION['nombre'] = ""; 
}
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <?php require('htmlTemplates/bootstrapCSS.php'); ?>
    <link href="css/sticky-footer.css" rel="stylesheet">
    <?php require('htmlTemplates/jscripts.php'); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
  </head>
  <body>
<?php
    if($_SESSION['valido']==1){
      require("htmlTemplates/TopMenu.php");
        if(!isset($_SESSION['tab'])){
          $_SESSION['tab']= "home";

          
        }


?>

<?php if($_SESSION['tab']=="carrera"){ ?>
      <script type="text/javascript">
        $(document).ready(function(){ 
            $('#myTab a[href="#carrera"]').tab('show');
        });
      </script>
<?php
}  ?>


<?php

      require_once 'alumno.entidad.php';
      require_once 'alumno.model.php';
      // Logica
      $alm = new Alumno();
      $model = new AlumnoModel();
      if(isset($_REQUEST['action']))
      {
        switch($_REQUEST['action'])
        {
          case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
            $model->Actualizar($alm);
            $_SESSION['tab'] = "carrera";
            header('Location: dashboard.php');
            break;

          case 'registrar':
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

            $model->Registrar($alm);
            $_SESSION['tab']= "carrera";
            header('Location: dashboard.php');
            break;

          case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            $_SESSION['tab']= "carrera";
            header('Location: dashboard.php');
            break;

          case 'editar':
           

            $alm = $model->Obtener($_REQUEST['id']);
                       
                         
            break;
        }
      }

?>

      
      <br>
      <br>
      <br>
      <section class="main conatiner"> 
        <div class="container-fluid">
          <section class="post col-md-9">
        
            <div>
            <!-- Tabs  -->
              <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation"><a href="#pensum" aria-controls="pensum" role="tab" data-toggle="tab">Pensum</a></li>
                <li role="presentation"><a href="#carrera" aria-controls="carrera" role="tab" data-toggle="tab">Carrera</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
              </ul>
              <!-- Tab content -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <div class="container-fluid">
                    <a href="">hola</a>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="pensum">
                  
                  <!-- contenido pensum-->
                  <!-- Button trigger modal -->
                  <br>
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalusuario">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    Usuario
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Ingreso de Usuarios</h4>
                        </div>
                        <div class="modal-body">
                          <!-- formulario usuarios -->
                          <form action="" class="form-horizontal">
                            <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                              <input type="text" class="form-control" placeholder="Ingrese el Usuario" aria-describedby="sizing-addon2">
                            </div>
                            <br>
                            <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                              <input type="text" class="form-control" placeholder="Ingrese la Contrsena" aria-describedby="sizing-addon2">
                            </div>
                             <br>
                            <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                              <input type="text" class="form-control" placeholder="Ingrese el Nombre Completo" aria-describedby="sizing-addon2">
                            </div>
                            <br>
                            <div class="row">   
                              <div class="col-md-5">  
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                     <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Nivel de Acceso</div>
                                  <div class="panel-body">
                                    <div class="radio">
                                      <label ><input type="radio" name="optradio" value="2">Coord. de Carrera</label>
                                    </div>
                                    <div class="radio">
                                      <label><input type="radio" name="optradio" value="3">Coord. General</label>
                                    </div>
                                    <div class="radio">
                                      <label><input type="radio" name="optradio" value="1">Administrador</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">  
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                     <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>Nivel de Acceso</div>
                                  <div class="panel-body">
                                    <div class="radio">
                                      <label><input type="radio" name="optradio" value="1">Activo</label>
                                    </div>
                                    <div class="radio">
                                      <label><input type="radio" name="optradio" value="2">Suspendido</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                             
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          
                          </form>
                          <!-- formulario usuarios -->
                        </div>
                      </div>  
                    </div>
                  </div>
                    <!-- Modal -->
                    <!-- contenido pensum-->                  
                </div>
                <div role="tabpanel" class="tab-pane fade" id="carrera">
                   <!-- tab carrera -->
                    <br>
                     <div class="col-md-6">  
                        <div class="panel panel-default">
                          <div class="panel-heading">
                             <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>Nivel de Acceso
                          </div>
                          <div class="panel-body">
                            <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="form-horizontal">
                              <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                              <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                <input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" class="form-control" placeholder="Ingrese el Nombre" aria-describedby="sizing-addon2">
                              </div>
                              <br>
                              <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" class="form-control" placeholder="Ingrese el Apellido" aria-describedby="sizing-addon2">
                              </div>
                               <br>
                              <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                <select class="form-control" name="Sexo">
                                  <option value="1" <?php echo $alm->__GET('Sexo') == 1 ?> 'selected' : ''; ?>>Masculino</option>
                                  <option value="2" <?php echo $alm->__GET('Sexo') == 2 ?> 'selected' : ''; ?>>Femenino</option>
                                </select>
                              </div>
                              <br>
                              <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input  type="text" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>" class="form-control" placeholder="Ingresela Fecha" aria-describedby="sizing-addon2">
                              </div>
                             <br>  
                             <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                              
                            
                            </form>
                            <!-- formulario usuarios -->
                          </div>
                        </div>
                      </div>
                    
                    
                            <!-- formulario usuarios -->
                            
                     
                   
                    <div  class="table-responsive col-md-10 ">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                          <td><?php echo $r->__GET('Nombre'); ?></td>
                          <td><?php echo $r->__GET('Apellido'); ?></td>
                          <td><?php echo $r->__GET('Sexo') == 1 ? 'H' : 'F'; ?></td>
                          <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                          <td>
                              <a href="?action=editar&id=<?php echo $r->id; ?>">
                                <button type="button" class="btn btn-default">
                                  <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                              </a>
                            </td>
                          <td>
                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletecarrera">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                              <!-- modal          -->
                              <div id="deletecarrera" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                    </div>
                                    <div class="modal-body">
                                      <h5>Desea continuar ?</h5> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <a href="?action=eliminar&id=<?php echo $r->id; ?>">
                                        <button type="button" class="btn btn-danger"   >
                                          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Eliminar
                                        </button>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- modal -->
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                    </div>
                    
      
                   <!-- tab carrera -->       
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
              </div>
            </div>
          </section> 
          <!-- barra de contenido izquierdo--> 
          <aside class="col-md-3">
            <br>
            <br>
            <h4><b>Articulos Recientes</b></h4>
            <a href="#" class="list-group-item active">
              <h4 class="list-group-item-heading">Titulo</h4>
              <p class="list-group-item-text">contenido </p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Titulo</h4>
              <p class="list-group-item-text">contenido </p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Titulo</h4>
              <p class="list-group-item-text">contenido </p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Titulo</h4>
              <p class="list-group-item-text">contenido </p>
            </a>
          </aside>
        </div>

      </section> 
      
      <footer class="footer">
        <div class="container-fluid">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; Company 2015</p>
        </div>
      </footer>
  
      
        
<?php  
    }
    else{
?>
    <div class="container">
      <div class="row">
          <div class="alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>    
            Usuario no autorizado    <a href="index.php"><button type="button" class="btn btn-danger">Volver</button></a></div>
      </div>  
    </div>
<?php
    }
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    
    
    
  </body>
</html>