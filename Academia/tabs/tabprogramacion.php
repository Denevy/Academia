 <!--INICIO progamacion --> 
                  <!--INICIO progamacion --> 

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





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Insert YouTube Video in Bootstrap Modal</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!--script src="https://code.jquery.com/jquery-1.11.2.min.js"></script-->
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
    .modal-content iframe{
        margin: 0 auto;
        display: block;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
});
</script>
</head>
<body>
<div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Ver Video</a>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">YouTube Video Academia</h4>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/YE7VzlLtp-4" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>     
</body>
</html>




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
                    <!-- Modal -->
                    <!--modal alerta eliminar programacion -->
         
                   <!--          FIN progamacion               --> 
                   <!--          FIN progamacion               --> 