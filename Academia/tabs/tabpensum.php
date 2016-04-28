                                  <!-- INICIO PENSUM-->
                  <!--//////////////// INICIO PENSUM /////////////////-->
<BR>
                  <!-- INICIO PANEL ENCABEZADO-->
                    <div class="panel panel-default">
                    <div class="panel-heading">Encabezado Pensum</div>
                    <div class="panel-body">
                    <div class="container">

<!--modal alerta eliminar usuario -->

                      <!-- Modal -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_PensumELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_PensumELIMINARLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo modal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_PensumELIMINARLabel">PRECAUCION</h4>
                            </div>
                            <div class="modal-body">
                              <div class="conatiner">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger"    id="btnModalELIMINARpensum">
                                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                              </div>
                            </div>
                          </div>  
                        </div>
                      </div>
                      <!-- Modal -->
                      <!--modal alerta eliminar usuario -->
                     <!-- modal -->

                      <!-- Button trigger modal -->
         
                      <div class="row">
                        <div class="col-md-1 ">
                          <button type="button" id="btnmodaladdpensum" class="btn btn-primary btn-sm center" data-toggle="modal" data-target="#Modal_Pensum">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            PENSUM
                          </button>
                        </div>

                     <!-- input de buscar 
                        <div class="col-md-8 col-xs-12 col-md-offset-2   ">
                          
                            <div class="col-md-4 col-xs-6">
                              <input type="text" class="form-control" placeholder="Nombre" onkeyup="buscarpensum();" id="pensumbuscar1">
                            </div>
                            <div class="col-md-4 col-xs-6">
                              <input type="text" class="form-control" placeholder="Nivel Acceso" onkeyup="buscarpendum();" id="pendumbuscar2">
                            </div>
                          
                        </div>
                    input de buscar -->
                      </div>
                      <hr>
                      <!-- Modal Modal_Pensum-->
                      <div class="modal fade" id="Modal_Pensum" tabindex="-1" role="dialog" aria-labelledby="Modal_PensumLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo lodal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_PensumLabel">Ingreso de Usuarios</h4>
                            </div>
                            <div class="modal-body">
                              <!-- formulario pensum -->
                              <form action="" class="form-horizontal" id="form_pensum" >
                                <div class="input-group" id="divIdPensum" style='display:none;' >
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el Id" aria-describedby="sizing-addon2" id="pensum_Idpensum">
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el anio del pensum" aria-describedby="sizing-addon2" id="pensum_aniopensum">
                                </div>
                                  <!-- formulario usuarios 
                                <br>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el id centro" aria-describedby="sizing-addon2" id="pensum_fkCentro">
                                </div>
                                 <br>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el id carrera" aria-describedby="sizing-addon2" id="pensum_fkCarrera">
                                </div>
                                     formulario usuarios -->
                                 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnaddpensum">
                                    <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnupdatepensum">
                                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                                </div>
                              
                              </form>
                              <!-- formulario usuarios -->
                            </div>
                          </div>  
                        </div>
                      </div>
                      <!-- Modal -->
      
                      <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <table class="table table-hover " id="tablapensum">
                              <thead>
                             
                                <th>AÑO PENSUM</th>     
                                <th>Eliminar</th>
                                <th>Editar</th>
                              </thead>
                              <tbody id="bodytpensum">
                                
                              </tbody >
                            </table>
                        </div>
                      </div>
                  </div>
                    </div>
                  </div>
                     <!-- FIN PANEL ENCABEZADO PENSUM-->

                     <!-- INICIO PANEL DETALLE PENSUM-->
                  <div class="panel panel-default" id="Dpensum">
                    <div class="panel-heading">
                      <h3 class="panel-title">Detalle Pensum</h3>
                    </div>
                    <div class="panel-body">
                     INICIO DETALLE PENSUM 
                  <!--//////////////// INICIO DETALLE PENSUM /////////////////-->
                  <?php require("tabs/tabDpensum.php");?>
                 

                    </div>
                  </div>
                     <!-- FIN PANEL DETALLE PENSUM-->


              <!--//////////////  FIN PENSUM //////////// -->