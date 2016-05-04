<?php
session_start();

  if(!isset($_SESSION['valido'])){
    $_SESSION['valido'] = 0;
    if(!isset($_SESSION['NombreCompleto']))
      $_SESSION['NombreCompleto']= "";
    if(!isset($_SESSION['idusuario']))
     $_SESSION['idusuario'] =0;
    if(!isset($_SESSION['nombreCarrera']))
      $_SESSION['nombreCarrera']= "";
    if(!isset($_SESSION['nombreCentroU']))
      $_SESSION['nombreCentroU']= "";
    if(!isset($_SESSION['privilegio']))
      $_SESSION['privilegio']= "";
    if(!isset($_SESSION['idNivelAcceso']))
      $_SESSION['idNivelAcceso']=0;
    if(!isset($_SESSION['idcentroU']))
      $_SESSION['idcentroU']= 0;
    if(!isset($_SESSION['idcarrera']))
      $_SESSION['idcarrera']= 0;
    if(!isset($_SESSION['codigoCarrera']))
     $_SESSION['codigoCarrera']= 0;
    if(!isset($_SESSION['codigoCentroU']))
     $_SESSION['codigoCentroU']= 0;
    if(!isset($_SESSION['idEstados']))
      $_SESSION['idEstados'] =0;
}


?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <?php require('php/bootstrapCSS.php'); ?>
    <link href="css/sticky-footer.css" rel="stylesheet">
    <?php require('php/jscripts.php'); ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
      <!--<script type="text/javascript" src="js/usuario.js"> </script>-->
      <script type="text/javascript" src="js/programacion.js"> </script>
      <script type="text/javascript" src="js/pensum.js"> </script>
      <script type="text/javascript" src="js/curso.js"></script>
      <script type="text/javascript" src="js/carrerauniversitaria.js"></script>
      <script type="text/javascript" src="js/centrouniversitario.js"></script>
      <script type="text/javascript" src="js/createUsuario.js"></script>
      <script type="text/javascript" src="js/docente.js"></script>
     <!-- <script type="text/javascript" src="js/alumno.js"></script>-->
      <script type="text/javascript" src="js/ciclo.js"></script>
      <script type="text/javascript" src="js/Dpensum.js"> </script>  
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
      require("php/TopMenu.php");
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
                  <li role="presentation" ><a   href="#programacion" aria-controls="programacion" role="tab" data-toggle="tab">Programacion</a></li>
                  <li role="presentation"><a href="#pensum" aria-controls="pensum" role="tab" data-toggle="tab" id="tabpensum">Pensum </a></li>
                  <li role="presentation"><a href="#carrera" aria-controls="carrera" role="tab" data-toggle="tab">Carrera</a></li>
                  <li role="presentation"><a href="#curso" aria-controls="curso" role="tab" data-toggle="tab"> Curso </a></li>
                  <li role="presentation"><a href="#centroU" aria-controls="centroU" role="tab" data-toggle="tab">CentroU</a></li>
                  <li role="presentation"><a href="#ciclo" aria-controls="ciclo" role="tab" data-toggle="tab"> Ciclo </a></li>
                  <li role="presentation"><a href="#docente" aria-controls="docente" role="tab" data-toggle="tab">Docente</a></li-->
                  <!--li role="presentation"><a href="#alumno" aria-controls="alumno" role="tab" data-toggle="tab">Alumno</a></li-->
                  
                <?php if($_SESSION['idNivelAcceso']==1){ ?>
                 <li role="presentation"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">Usuario</a></li>   <?php } ?>
                </ul>
              <!-- Tab content -->
                <div class="tab-content">
                  <!--INICIO progamacion --> 
                  <div role="tabpanel" class="tab-pane fade" id="programacion">

                    <div id="carga">
                      <img src="img/ajax-loader.gif" />
                    </div>

                <!-- Button trigger modal -->
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-1 ">
                            <button type="button" id="btnmodaladdprogramacion" class="btn btn-primary btn-lg center" onClick="loadmodalformpensum();" data-toggle="modal" data-target="#Modal_Programacion">
                              <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                              Programacion
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
                  <div role="tabpanel" class="tab-pane fade" id="pensum"> <?php require("tabs/tabpensum.php");?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="carrera"><?php require("tabs/tabsCarrera.php");?></div>
                  <div role="tabpanel" class="tab-pane fade" id="curso"><?php require("tabs/tabsCurso.php"); ?></div>
                  <div role="tabpanel" class="tab-pane fade" id="centroU"><?php require("tabs/tabsCentrou.php"); ?></div>
                  <div role="tabpanel" class="tab-pane fade" id="ciclo"><?php require("tabs/tabsCiclo.php"); ?> </div>
                  <div role="tabpanel" class="tab-pane fade" id="docente"><?php require("tabs/tabsDocente.php"); ?></div>
                  <!--div role="tabpanel" class="tab-pane fade" id="alumno"><?php require("tabs/tabsAlumno.php"); ?></div-->
                  <div role="tabpanel" class="tab-pane fade" id="user"><?php require("tabs/tabsUser.php");?> </div>


                  
            </div>
          </section> 

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
        <script type="text/javascript">
          

      </script>
      
      <!-- AJAX -->
  </body>
</html>







