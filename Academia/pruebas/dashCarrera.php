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
    if($_SESSION['valido']==0){
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

      require_once 'carrera.entidad.php';
      require_once 'carrera.model.php';
      // Logica
      $alm = new Carrera();
      $model = new CarreraModel();

      //$_REQUEST Es un array que por defecto contiene el contebido de $_GET, $_POST y $_cookie

      if(isset($_REQUEST['action']))
      {
        switch($_REQUEST['action'])
        {
          case 'actualizar':
            $alm->__SET('idcarrera',              $_REQUEST['idcarrera']);
            $alm->__SET('codigoCarrera',          $_REQUEST['codigoCarrera']);
            $alm->__SET('nombreCarrera',          $_REQUEST['nombreCarrera']);
            $model->Actualizar($alm);

            $_SESSION['tab'] = "carrera";
            header('Location: dashCarrera.php');
            break;

          case 'registrar':
            $alm->__SET('codigoCarrera',          $_REQUEST['codigoCarrera']);
            $alm->__SET('nombreCarrera',          $_REQUEST['nombreCarrera']);
            $model->Registrar($alm);

            $_SESSION['tab']= "carrera";
            header('Location: dashCarrera.php');
            break;

          case 'eliminar':
            $model->Eliminar($_REQUEST['idcarrera']);

            $_SESSION['tab']= "carrera";
            header('Location: dashCarrera.php');
            break;

          case 'editar':
          
            $alm = $model->Obtener($_REQUEST['idcarrera']); 

            break;
        }
      }

?>
<!-- contenedor principal********************  -->
      
      <br>
      <br>
      <br>
      <section class="main conatiner"> 
        <div class="container-fluid">

          <section class="post col-md-9">
            <div>
                    <!-- Tabs  -->
                <ul class="nav nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Horario</a></li>
                  <li role="presentation"><a href="#pensum" aria-controls="pensum" role="tab" data-toggle="tab">Pensum</a></li>
                  <li role="presentation"><a href="#carrera" aria-controls="carrera" role="tab" data-toggle="tab">Carrera</a></li>
                  <li role="presentation"><a href="#curso" aria-controls="curso" role="tab" data-toggle="tab">Curso</a></li>
                  <li role="presentation"><a href="#centroU" aria-controls="centroU" role="tab" data-toggle="tab">Centro Universitario</a></li>
                  <li role="presentation"><a href="#ciclo" aria-controls="ciclo" role="tab" data-toggle="tab">Ciclo</a></li>
                  <li role="presentation"><a href="#docente" aria-controls="docente" role="tab" data-toggle="tab">Docente</a></li>
                  <li role="presentation"><a href="#usuario" aria-controls="usuario" role="tab" data-toggle="tab">Usuario</a></li>
                </ul>
              <!-- Tab content -->
              <div class="tab-content">
                  <!--INICIO HORARIO --> 
                  <div role="tabpanel" class="tab-pane fade" id="home">
                    ...
                  </div>
                  <!-- FIN HORARIO--> 

                  <!-- INICIO PENSUM-->
                  <div role="tabpanel" class="tab-pane fade" id="pensum">                 
                   ....
                  </div>
                <!-- FIN PENSUM -->
                <!-- INICIO CARRERA-->
                <div role="tabpanel" class="tab-pane fade" id="carrera">
                   <!-- tab carrera -->
                    <br>
                     <div class="col-md-6">  
                        <div class="panel panel-default">
                          <div class="panel-heading">
                             <span class="glyphicon glyphicon-eye-close  " aria-hidden="true"></span>  Formulario de datos de Carrera
                          </div>
                            <!-- formulario usuarios -->
                          <div class="panel-body">
                            <form action="?action=<?php echo $alm->idcarrera > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="form-horizontal">
                              <input type="hidden" name="idcarrera" value="<?php echo $alm->__GET('idcarrera'); ?>" />
                              
                              <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                <input type="text" name="codigoCarrera" value="<?php echo $alm->__GET('codigoCarrera'); ?>" class="form-control" placeholder="Ingrese el codigo de la carrera" aria-describedby="sizing-addon2">
                              </div>

                              <br>
                              <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input type="text" name="nombreCarrera" value="<?php echo $alm->__GET('nombreCarrera'); ?>" class="form-control" placeholder="Ingrese el nombre de la carrera" aria-describedby="sizing-addon2">
                              </div>

                              <br>  
                             <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>              
                            </form>
                            <!-- formulario usuarios -->
                          </div>
                        </div>
                      </div>

                       <!-- inicio tab carrera -->              
                    <div  class="table-responsive col-md-10 ">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Codigo de Carrera</th>
                            <th style="text-align:left;">Nombre de Carrera</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                          <td><?php echo $r->__GET('codigoCarrera'); ?></td>
                          <td><?php echo $r->__GET('nombreCarrera'); ?></td>
                          
                            <td>
                              <a href="?action=editar&idcarrera=<?php echo $r->idcarrera; ?>">
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
                                      <a href="?action=eliminar&idcarrera=<?php echo $r->idcarrera; ?>">
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
                    
                    <!-- formulario usuarios -->
                   <!-- fin tab carrera -->       
                </div>
                <div role="tabpanel" class="tab-pane fade" id="curso">...</div>
                <div role="tabpanel" class="tab-pane fade" id="centroU">...</div>
                <div role="tabpanel" class="tab-pane fade" id="ciclo">...</div>
                <div role="tabpanel" class="tab-pane fade" id="docente">...</div>
                <div role="tabpanel" class="tab-pane fade" id="usuario">...</div>
                <!--  --> 
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