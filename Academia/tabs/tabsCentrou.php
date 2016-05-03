  <div class="container">
				    <br>
                      <!-- Inicio Modal Eliminar -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_CentroELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_CentroELIMINARLabel">
                       <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                          <!-- inicio x para cerrar -->
                           <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                           <h4 class="modal-title" id="Modal_CentroELIMINARLabel">PRECAUCION</h4>
                          <!-- fin x para cerrar --> 
						 </div>
                            <div class="modal-body">
                             <div class="container">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                             </div>
                             <!---inicio pie de pagina-->
							 <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-danger"  id="btnModalELIMINARcentro">
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
                         <button type="button" id="btnmodaladdcentro" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal_centro">
                          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                          Centro Universitario
                         </button>
                        </div>
					   <!--- Final ModaL Button centroU---->	
					  
					   <!--Inicio Modal centro-->					  
					   <div class="modal fade" id="Modal_centro" tabindex="-1" role="dialog" aria-labelledby="Modal_centroLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                         <div class="modal-header">
                           <!-- inicio titulo modal con la x para cerrar -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                             <h4 class="modal-title" id="Modal_centroLabel">Ingreso de Centro Universitario</h4>
                           <!-- Final titulo modal con la x para cerrar -->
    				     </div>
                         
						 <div class="modal-body">
                           <!-- inicio formulario centrou -->
                           <form action="" class="form-horizontal" id="form_centro">
							<div class="input-group" id="divIdCentro" style='display:none;' >
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese" aria-describedby="sizing-addon2" id="centro_IdCentro">
                            </div>
							
                            <div class="input-group">
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese el codigo de centro universatario" aria-describedby="sizing-addon2" id="centro_codigocentro">
                            </div>
							
							<br>
                             <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input type="text" class="form-control" placeholder="Ingrese nombre de centro universitario" aria-describedby="sizing-addon2" id="centro_nombrecentro">
                             </div>
                            
							<br>
                              <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<button type="button" class="btn btn-primary" Style='display:none' id="btnaddcentro">
							        <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>		
							        <button type="button" class="btn btn-primary" style='display:none;' id="btnupdatecentro">
                                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
							   
                              </div>
                            </form>
							<!-- fin formulario centrou -->
					     </div>
						 
						 </div>
				        </div>
				        </div>
					  <!--Fin modal centro--> 
				  
					  <!------INICIO TABLA MOSTRAR CENTROS----->
					  <br>
					  <div class="row">
                        <div class="col-md-9">
                           <table class="table table-hover " id="tablacentrou">
                             <thead>
                                <th>Codigo Centro Universitario</th>
                                <th>Nombre Centro Universitario</th>                               
                              </thead>
                             <tbody id="bodytcentrou">
                                
                             </tbody >
                            </table>
                        </div>
                       </div> 
					  <!-----FIN TABLA MOSTRAR CENTROS----->	  
				 </div>