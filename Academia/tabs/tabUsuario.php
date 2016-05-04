 <div class="container">

                       <!--modal alerta eliminar usuario -->
                      <br>
                      <!-- Modal -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_UsuarioELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_UsuarioELIMINARLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo modal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_UsuarioELIMINARLabel">PRECAUCION</h4>
                            </div>
                            <div class="modal-body">
                              <div class="conatiner">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger"    id="btnModalELIMINARusuario">
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
                      <br>
                      <div class="row">
                        <div class="col-md-1 ">
                          <button type="button" id="btnmodaladdusuario" class="btn btn-primary btn-lg center" data-toggle="modal" data-target="#Modal_Usuario">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            Usuario
                          </button>
                        </div>
                        <br>
                     <!-- input de buscar -->
                        <div class="col-md-8 col-xs-12 col-md-offset-2   ">
                          
                            <div class="col-md-4 col-xs-6">
                              <input type="text" class="form-control" placeholder="Nombre" onkeyup="buscarusuario();" id="usuariobuscar1">
                            </div>
                            <div class="col-md-4 col-xs-6">
                              <input type="text" class="form-control" placeholder="Nivel Acceso" onkeyup="buscarusuario();" id="usuariobuscar2">
                            </div>
                          
                        </div>
                      <!-- input de buscar -->
                      </div>
                      <hr>
                      <!-- Modal -->
                      <div class="modal fade" id="Modal_Usuario" tabindex="-1" role="dialog" aria-labelledby="Modal_UsuarioLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- titulo lodal con la x para cerrar -->
                              <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <h4 class="modal-title" id="Modal_UsuarioLabel">Ingreso de Usuarios</h4>
                            </div>
                            <div class="modal-body">
                              <!-- formulario usuarios -->
                              <form action="" class="form-horizontal" id="form_usuario" >
                                <div class="input-group" id="divIdUsuario" style='display:none;' >
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el Usuario" aria-describedby="sizing-addon2" id="usuario_IdUsuario">
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el Usuario" aria-describedby="sizing-addon2" id="usuario_usuario">
                                </div>
                                <br>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese la Contrsena" aria-describedby="sizing-addon2" id="usuario_contrasenia">
                                </div>
                                 <br>
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                  <input type="text" class="form-control" placeholder="Ingrese el Nombre Completo" aria-describedby="sizing-addon2" id="usuario_nombre">
                                </div>
                                <br>
                                <div class="row">   
                                  <div class="col-md-5">  
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                         <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Nivel de Acceso</div>
                                      <div class="panel-body">
                                        <div class="radio">
                                          <label ><input type="radio" name="usuario_nacceso" id="usuario_nacceso" value="2">Coord. de Carrera</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="usuario_nacceso" id="usuario_nacceso" value="3">Coord. General</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="usuario_nacceso" id="usuario_nacceso" value="1">Administrador</label>
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
                                          <label><input type="radio" name="usuario_estado" id="usuario_estado" value="1">Activo</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="usuario_estado" id="usuario_estado" value="2">Suspendido</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnaddusuario">
                                    <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateusuario">
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
                            <table class="table table-hover " id="tablausuario">
                              <thead>
                                <th>Nombre</th>
                                <th>Password</th>
                                <th>Nivel Acceso</th>
                                <th>Usuario</th>            
                                <th>Estados</th>
                                <th>Carrera</th>
                                <th>Centro U</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                              </thead>
                              <tbody id="bodytusuario">
                                
                              </tbody >
                            </table>
                        </div>
                      </div>
                  </div>