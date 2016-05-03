<div class="container">
					<!--modal alerta eliminar Docente -->
        <br>
            <!-- Modal -->
					  <div class="modal fade bs-example-modal-sm"  id="Modal_DocenteEliminar" tabindex="-1" role="dialog" aria-labelledby="Modal_DocenteELIMINARLabel">
                        <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                            <!-- titulo modal con la x para cerrar -->
                            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						    <h4 class="modal-title" id="Modal_DocenteELIMINARLabel">PRECAUCION</h4>
						   </div>
							   <div class="modal-body">
								<div class="conatiner">
                                 <h4>Esta a punto de Eliminar una Fila...</h4>  
                                </div>
                                 <div class="modal-footer">
                                  <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-danger" id="btnModalELIMINARdocente">
                                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                                 </div>
							
							   </div>
                          </div>  
                        </div>
                      </div>
					  
					  <!-- BUTTON trigger modal -->	  
				      <br>
                      <div class="row">
                        <div class="col-md-1 ">
                          <button type="button" id="btnmodaladddocente" class="btn btn-primary btn-lg center" data-toggle="modal" data-target="#Modal_Docente">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            DOCENTE
                          </button>
                        </div>
						</div>	
						
					  <!-- Modal agregar Docente-->
                      <div class="modal fade" id="Modal_Docente" tabindex="-1" role="dialog" aria-labelledby="Modal_DocenteLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo lodal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_DocenteLabel">Ingreso de Docentes</h4>
                            </div>
                            <div class="modal-body">
                              <!-- formulario usuarios -->
                              <form action="" class="form-horizontal" id="form_docente" >
                                <div class="input-group" id="divIdUsuario" style='display:none;' >
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el Docente" aria-describedby="sizing-addon2" id="docente_IdDocente">
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el nombre su carnet" aria-describedby="sizing-addon2" id="docente_carnetdocente">
                                </div>
                                <br>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese su nombre" aria-describedby="sizing-addon2" id="docente_nombredocente">
                                </div>
                                 <br>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese su profesion" aria-describedby="sizing-addon2" id="docente_profesiondocente">
                                </div>
								 <br>
								<div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese su telefono" aria-describedby="sizing-addon2" id="docente_telefonodocente">
                                </div>
								 <br>
								<div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese su correo" aria-describedby="sizing-addon2" id="docente_correodocente">
                                </div>
                                <br>
                                <div class="row">   
                                  <div class="col-md-5">  
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                         <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Restriccion Docente</div>
                                      <div class="panel-body">
                                        <div class="radio">
                                          <label ><input type="radio" name="docente_nacceso" id="docente_nacceso" value="2">Ocupado</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="docente_nacceso" id="docente_nacceso" value="3">Pendiente</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="docente_nacceso" id="docente_nacceso" value="1">Libre</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">  
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                         <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>Estado</div>
                                      <div class="panel-body">
                                        <div class="radio">
                                          <label><input type="radio" name="docente_estado" id="docente_estado" value="1">Activo</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="docente_estado" id="docente_estado" value="2">Suspendido</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnadddocente">
                                    <span class='glyphicon glyphicon-floppy-disk' aria-hidden='false'></span></button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnupdatedocente">
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
                            <table class="table table-hover " id="tabladocente">
                              <thead>
                                <th>carnet</th>
                                <th>nombre</th>
                                <th>profesion</th>            
                                <th>telefono</th>
                                <th>correo</th>
                                <th>Estado</th>
								                <th>Restricciones</th>
                              </thead>
                              <tbody id="bodytdocente">
                                
                              </tbody >
                            </table>
                        </div>
                      </div>
					
					</div>
