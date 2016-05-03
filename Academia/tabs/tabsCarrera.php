 <div class="container">
				    <br>
                      <!-- Inicio Modal Eliminar -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_CarreraELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_CarreraELIMINARLabel">
                       <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                          <!-- inicio x para cerrar -->
                           <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                           <h4 class="modal-title" id="Modal_CarreraELIMINARLabel">PRECAUCION</h4>
                          <!-- fin x para cerrar --> 
						 </div>
                            <div class="modal-body">
                             <div class="conatiner">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                             </div>
                             <!---inicio pie de pagina-->
							 <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-danger"  id="btnModalELIMINARcarrera">
                                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                             </div>
							 <!--Fin pie de pagina-->
                            </div>
                       </div>  
                       </div>
                       </div>
					   <!--Fin Modal Eliminar-->	
				  				  
					   <br>
                       <!---Inicio ModaL Button centroU---->
					    <div class="row">
                         <button type="button" id="btnmodaladdcarrera" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal_carrera">
                          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                          Carrera
                         </button>
                        </div>
					   <!--- Final ModaL Button centroU---->	
					  
					   <!--Inicio Modal carrera-->					  
					   <div class="modal fade" id="Modal_carrera" tabindex="-1" role="dialog" aria-labelledby="Modal_carreraLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                         <div class="modal-header">
                           <!-- inicio titulo modal con la x para cerrar -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                             <h4 class="modal-title" id="Modal_carreraLabel">Ingreso de Carrera</h4>
                           <!-- Final titulo modal con la x para cerrar -->
    				     </div>
                         
						 <div class="modal-body">
                           <!-- inicio formulario centrou -->
                           <form action="" class="form-horizontal" id="form_carrera">
							<div class="input-group" id="divIdCarrera" style='display:none;' >
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese" aria-describedby="sizing-addon2" id="carrera_IdCarrera">
                            </div>
							
                            <div class="input-group">
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese el codigo de centro universatario" aria-describedby="sizing-addon2" id="carrera_codigocarrera">
                            </div>
							
							<br>
                             <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input type="text" class="form-control" placeholder="Ingrese nombre de centro universitario" aria-describedby="sizing-addon2" id="carrera_nombrecarrera">
                             </div>
                            
							<br>
                              <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                               <button type="button" class="btn btn-primary"  style='display:none;' id="btnaddcarrera">
							   <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
							   <button type="button" class="btn btn-primary" style='display:none;' id="btnupdatecarrera">
                               <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                              </div>
                            </form>
							<!-- fin formulario centrou -->
					     </div>
						 
						 </div>
				        </div>
				        </div>
					  <!--Fin modal carrera--> 
				  
					  <!------INICIO TABLA MOSTRAR CENTROS----->
					  <br>
					  <div class="row">
                        <div class="col-md-9">
                           <table class="table table-hover " id="tablacarrera">
                             <thead>
                                <th>Codigo Carrera</th>
                                <th>Nombre Carrera</th>                               
                              </thead>
                             <tbody id="bodytcarrera">
                                
                             </tbody >
                            </table>
							</div>
						   </div> 
					  <!-----FIN TABLA MOSTRAR CENTROS----->	  
				 </div>