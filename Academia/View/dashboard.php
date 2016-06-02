<?php
session_start();

if($_SESSION['login'] == true)
{

}

/*

  if(!isset($_SESSION['valido'])){
    $_SESSION['valido'] = 0;
    if(!isset($_SESSION['nombres']))
      $_SESSION['nombres']= "";
    if(!isset($_SESSION['idusuario']))
     $_SESSION['idusuario'] =0;
    if(!isset($_SESSION['privilegio']))
      $_SESSION['privilegio']= "";
    if(!isset($_SESSION['idrol']))
      $_SESSION['idrol']=0;
    if(!isset($_SESSION['idestado']))
      $_SESSION['idestado'] =0;
}*/
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
      <script type="text/javascript" src="../Resources/js/RolCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/GradoCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/createUsuario.js"> </script>
      <script type="text/javascript" src="../Resources/js/EstadoCreate.js"> </script>
      <script type="text/javascript" src="../Resources/js/programacion.js"> </script>
      <!-- AJAX -->
      <script>
        window.onload = detectarCarga;
        function detectarCarga(){
           document.getElementById("carga").style.display="none";
        }
    </script>  
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
  </head>
  <body>


<?php
    if($_SESSION['valido']==1){ // si inicio sesion correctamente
      require("TopMenu.php");
        if(!isset($_SESSION['tab'])){
          $_SESSION['tab']= "programacion";  // elegir la pestana de horario
        }
?>
<?php 
  if($_SESSION['tab']=="programacion"){ 
?>
        <script type="text/javascript">
        
        $(document).ready(function(){ 
          mostrartablaprogramacion();
          $('#myTab a[href="#programacion"]').tab('show'); // para elegir otra pestana
        });
          
       </script>
<?php
 }  
?>
<!-- AJAX -->
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
                  <li role="presentation" ><a   href="#programacion" aria-controls="programacion" role="tab" data-toggle="tab">Categorias</a></li>     
                <?php if($_SESSION['idrol']==1){ ?>  
                <li role="presentation"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">Usuarios</a></li>
                <li role="presentation"><a href="#estado" aria-controls="estado" role="tab" data-toggle="tab">Estados</a></li>
                <li role="presentation"><a href="#rol" aria-controls="rol" role="tab" data-toggle="tab">Rol</a></li>
                <li role="presentation"><a href="#grado" aria-controls="grado" role="tab" data-toggle="tab">Nivel Academico</a></li>
                <?php } ?>
                </ul>
              <!-- Tab content -->
                <div class="tab-content">
                  <!--INICIO progamacion --> 
                  <div role="tabpanel" class="tab-pane fade" id="programacion">
                    <div id="carga">
                      <img src="../Resources/img/ajax-loader.gif" />
                    </div>
                <!-- Button trigger modal -->
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-1 ">
                            <button type="button" id="btnmodaladdprogramacion" class="btn btn-primary btn-lg center" onClick="loadmodalformpensum();" data-toggle="modal" data-target="#Modal_Programacion">
                              <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                              Categoría
                            </button>
                          </div>
                          <br>                           
                          <div class="col-md-4 col-xs-7 col-md-offset-7 ">
                            <input type="text" class="form-control" placeholder="Nombre" onkeyup="buscarprogramacion();" id="inputprogramacionbuscar">
                          </div>                           
                        </div> 
                        <br>                         
                        <br>                          
                      </div> 
                      <hr>
                      <div class="row">
                        <div class="col-md-12" id="contenedorprogramacion">             
                              
                        </div>
                      </div>  
                    </div>
                      <!-- Modal horario -->
                    <div class="modal fade" id="Modal_detalleprogramacion" tabindex="-1" role="dialog" aria-labelledby="Modal_detalleprogramacionLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- titulo modal con la x para cerrar -->
                            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                            <h4 class="modal-title" id="Modal_detalleprogramacionLabel">Crear Nueva Programacion</h4>
                          </div>
                          <div class="modal-body">
                            <!-- formulario  -->
                            <form action="" class="form-horizontal" id="form_Modal_detalleprogramacion" >
                              <div class="input-group" id="divprogramacion" style='display:none;' >
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                <input type="text" class="form-control" placeholder="idprogramacion" aria-describedby="sizing-addon2" id="programacion_idHorarios">
                              </div>
                              <br>
                              
                              <div class='col-md-5 col-md-offset-4'>
                                <div class="form-group">
                                    <div class='input-group date' id='horaIni'>
                                        <input type='text' class="form-control" id='horaIniInput' />
                                        <span class="input-group-addon">Inicio
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                              </div>
                              <div class='col-md-5 col-md-push-4'>
                                  <div class="form-group">
                                      <div class='input-group date' id='horaFin'>
                                          <input type='text' class="form-control"id='horaFinInput' />
                                          <span class="input-group-addon">Final
                                              <span class="glyphicon glyphicon-time"></span>
                                          </span>
                                      </div>
                                  </div>
                                </div>
                              <script type="text/javascript">
                                  $(function () {
                                      $('#horaIni').datetimepicker({
                                          format: 'HH:mm'
                                      });
                                      $('#horaFin').datetimepicker({
                                          format: 'HH:mm'
                                      });
                                  });
                              </script>    
                              <br>
                              
                              <select class="form-control"   id="selectDIAform"  class="{required:true} span3 " >
                                  <option value="false">Elija un DIA</option>
                                </select>
                              <br>
                                <select class="form-control" id="selectDocenteform" class="{required:true} span3" >
                                  <option value="false">Elija un Docente</option>
                                </select>
                                
                              <br>
                                <select class="form-control" id="selectCursoform"  class="{required:true} span3" >
                                    <option value="false">Elija un Curso</option>
                                  </select>
                              <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" style='display:none;' id="btnaddModal_detalleprogramacion">
                                  <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateModal_detalleprogramacion">
                                  <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                              </div>
                            
                            </form>
                            <!-- formulario  -->
                          </div>
                        </div>  
                      </div>
                    </div>
                  <!-- Modal horario -->  
                  <!--modal alerta eliminar DETALLE programacion -->
                    <br>
                    <!-- Modal -->
                    <div class="modal fade bs-example-modal-sm"  id="Modal_DetalleProgramacionELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_DetalleProgramacionELIMINARLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- titulo modal con la x para cerrar -->
                            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                            <h4 class="modal-title" id="Modal_DetalleProgramacionELIMINARLabel">PRECAUCION</h4>
                          </div>
                          <div class="modal-body">
                            <div class="conatiner">
                              <h4>Esta a punto de Eliminar una Fila...</h4>  
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-danger"    id="btnModalELIMINARDetalleprogramacion">
                                <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                                <!--botn escondido para guardar el encabezado -->
                              <button type="button" class="btn btn-danger"    id="btnModalELIMINARDetalleprogramacion2" style='display:none;'> 
                              <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <!-- Modal -->
                    <!--modal alerta eliminar DETALLE programacion -->
                    <!-- Modal Programacion -->
                    <div class="modal fade" id="Modal_Programacion" tabindex="-1" role="dialog" aria-labelledby="Modal_ProgramacionLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- titulo modal con la x para cerrar -->
                            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                            <h4 class="modal-title" id="Modal_ProgramacionLabel">Crear Nueva Programacion</h4>
                          </div>
                          <div class="modal-body">
                            <!-- formulario  -->
                            <form action="" class="form-horizontal" id="form_programacion" >
                              <div class="input-group" id="divprogramacion" style='display:none;' >
                                <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                <input type="text" class="form-control" placeholder="idprogramacion" aria-describedby="sizing-addon2" id="programacion_idprogramacion">
                              </div>
                              <br>
                              <select class="form-control"   id="selectaniopensum" onchange='selectciclopensum();' class="{required:true} span3 " >
                                  <option value="false">Elija un Pensum</option>
                                </select>
                              <br>
                                <select class="form-control" id="selectseccionpensumform" class="{required:true} span3" >
                                  <option value="false">Elija una Seccion</option>
                                </select>
                                
                              <br>
                                <select class="form-control" id="selectciclopensumform"  class="{required:true} span3" >
                                    <option value="false">Elija un Ciclo</option>
                                  </select>
                              <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" style='display:none;' id="btnaddprogramacion">
                                  <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateprogramacion">
                                  <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                              </div>
                            
                            </form>
                            <!-- formulario  -->
                          </div>
                        </div>  
                      </div>
                    </div>
                  <!-- Modal Programacion -->


                     <!--modal alerta eliminar programacion -->
                    <br>
                    <!-- Modal -->
                    <div class="modal fade bs-example-modal-sm"  id="Modal_ProgramacionELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_ProgramacionELIMINARLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- titulo modal con la x para cerrar -->
                            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                            <h4 class="modal-title" id="Modal_ProgramacionELIMINARLabel">PRECAUCION</h4>
                          </div>
                          <div class="modal-body">
                            <div class="conatiner">
                              <h4>Esta a punto de Eliminar una Fila...</h4>  
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-danger"    id="btnModalELIMINARprogramacion">
                                <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <!-- Modal -->
                    <!--modal alerta eliminar programacion -->
                 </div>
                   <!--          FIN progamacion               --> 

                  <!-- INICIO PENSUM-->
                  <div role="tabpanel" class="tab-pane fade" id="user"><?php require_once("../Model/UserTabla.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="estado"><?php require_once("../Form/EstadoForm.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="rol"><?php require_once("../Form/RolForm.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="grado"><?php require_once("../Form/GradoForm.php");?> </div>
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




