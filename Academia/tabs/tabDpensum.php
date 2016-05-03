 <div class="container">

<!--modal alerta eliminar usuario -->
                      <br>
                      <!-- Modal -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_DPensumELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_DPensumELIMINARLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo modal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_DPensumELIMINARLabel">PRECAUCION</h4>
                            </div>
                            <div class="modal-body">
                              <div class="conatiner">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger"    id="btnModalELIMINARDpensum">
                                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                              </div>
                            </div>
                          </div>  
                        </div>
                      </div>
                      <!-- Modal -->
                      <!--modal alerta eliminar usuario -->
                      <!-- Button trigger modal
                    <br>
                    <div class="row">
                      <div class="col-md-1 ">
                        <button type="button" id="btnmodaladddDpensum" class="btn btn-primary btn-SM center" onClick="loadmodalformDpensum();" data-toggle="modal" data-target="#Modal_Dpensum">
                          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                          D PENSUM
                        </button>
                      </div>
                    </div> 

                    <br>
                 
                  <hr>       -->
                     <!-- modal -->

                      <!-- Button trigger modal -->
                      <br>
                      <div class="row">
                        <div class="col-md-1 ">
                          <button type="button" id="btnmodaladdDpensum" class="btn btn-primary btn-sm center" onClick="loadmodalformDpensum();" data-toggle="modal" data-target="#Modal_DPensum">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            D PENSUM
                          </button>
                        </div>
                        <br>
                     <!-- input de buscar -->
                        <div class="col-md-8 col-xs-12 col-md-offset-2   ">
                          
                            <div class="col-md-4 col-xs-6">
                              <input type="text" class="form-control" placeholder="Nombre" onkeyup="buscarDpensum();" id="Dpensumbuscar1">
                            </div>
                            <div class="col-md-4 col-xs-6">
                              <input type="text" class="form-control" placeholder="Nivel Acceso" onkeyup="buscarDpendum();" id="Dpendumbuscar2">
                            </div>
                          
                        </div>
                      <!-- input de buscar -->
                      </div>
                      <hr>
                      <!-- Modal Modal_Pensum-->
                      <div class="modal fade" id="Modal_DPensum" tabindex="-1" role="dialog" aria-labelledby="Modal_DPensumLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo lodal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_DPensumLabel">Ingreso de D pensum</h4>
                            </div>
                            <div class="modal-body">

                              <!-- formulario Dpensum -->
                              <form action="" class="form-horizontal" id="form_Dpensum" >

                                <div class="input-group" id="divIdDPensum" style='display:none;' >
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el Id" aria-describedby="sizing-addon2" id="Dpensum_IdDpensum">
                                </div>

                                    <select class="form-control" id="Dpensum_idcurso" class="{required:true} span3" >
                                      <option value="false">Elija una Curso</option>
                  
                                    </select>
                      
                                    <br>

                                    <select class="form-control" id="Dpensum_idciclo"  class="{required:true} span3" >
                                        <option value="false">Elija un Ciclo</option>
                                       
                                    </select>

                                    <br>
                                    <select class="form-control"   id="pensum_idpensum" class="{required:true} span3 " >
                                      <option value="false">Elija un Pensum</option>
                                     
                                    </select>

                                   
                                
                                <!-- formulario Dpensum -->
                                 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnaddDpensum">
                                    <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateDpensum">
                                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                                </div>
                              
                              </form>
                              <!-- formulario usuarios -->
                            </div>
                          </div>  
                        </div>
                      </div>
                      <!-- Modal -->
                      <br>
                      <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <table class="table table-hover " id="tablaDpensum">
                              <thead>
                                <th>ID</th>
                                <th>CURSO</th>
                                <th>CICLO</th>
                                <th>PENSUM</th>            
                                <th>Eliminar</th>
                                <th>Editar</th>
                              </thead>
                              <tbody id="bodytDpensum">
                                
                              </tbody >
                            </table>
                        </div>
                      </div>
                  </div>