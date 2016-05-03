<div class="container">
				    <br>
                      <!-- Inicio Modal Eliminar -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_CicloELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_CicloELIMINARLabel">
                       <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                          <!-- inicio x para cerrar -->
                           <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                           <h4 class="modal-title" id="Modal_CicloELIMINARLabel">PRECAUCION</h4>
                          <!-- fin x para cerrar --> 
						 </div>
                            <div class="modal-body">
                             <div class="container">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                             </div>
                             <!---inicio pie de pagina-->
							 <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-danger"  id="btnModalELIMINARciclo">
                                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                             
							 </div>
							 <!--Fin pie de pagina-->
                            </div>
                       </div>  
                       </div>
                       </div>
					   <!--Fin Modal Eliminar-->	
				  				  
					   <br>
                       <!---Inicio ModaL Button ciclo---->
					    <div class="row">
                         <button type="button" id="btnmodaladdciclo" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal_ciclo">
                          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                          Ciclo
                         </button>
                        </div>
					   <!--- Final ModaL Button ciclo---->	
					  
					   <!--Inicio Modal curso-->					  
					   <div class="modal fade" id="Modal_ciclo" tabindex="-1" role="dialog" aria-labelledby="Modal_cicloLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                         <div class="modal-header">
                           <!-- inicio titulo modal con la x para cerrar -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                             <h4 class="modal-title" id="Modal_cicloLabel">Ingreso de Ciclo Universitario</h4>
                           <!-- Final titulo modal con la x para cerrar -->
    				     </div>
                         
						 <div class="modal-body">
                           <!-- inicio formulario ciclo -->
                           <form action="" class="form-horizontal" id="form_ciclo">
							<div class="input-group" id="divIdCiclo" style='display:none;' >
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese" aria-describedby="sizing-addon2" id="ciclo_IdCiclo">
                            </div>
							
                            <div class="input-group">
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese el nombre del Ciclo" aria-describedby="sizing-addon2" id="ciclo_nombreciclo">
                            </div>
							                            
							
                             <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnaddciclo">
                                    <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateciclo">
                                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
							   
                              </div>
                            </form>
							<!-- fin formulario ciclo-->
					     </div>
						 
						 </div>
				        </div>
				        </div>
					  <!--Fin modal ciclo--> 
				  
					  <!------INICIO TABLA MOSTRAR Ciclo----->
					  <br>
					  <div class="row">
                        <div class="col-md-9">
                           <table class="table table-hover " id="tablaciclo">
                             <thead>
                    
                                <th>Nombre Ciclo</th>                                                              
								</thead>
                             <tbody id="bodytciclo">
                                
                             </tbody >
                            </table>
                        </div>
                       </div> 
					  <!-----FIN TABLA MOSTRAR Ciclo----->	  
				 </div>
