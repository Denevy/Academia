<div class="container">
				    <br>
                      <!-- Inicio Modal Eliminar -->
                      <div class="modal fade bs-example-modal-sm"  id="Modal_CursoELIMINAR" tabindex="-1" role="dialog" aria-labelledby="Modal_CursoELIMINARLabel">
                       <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                          <!-- inicio x para cerrar -->
                           <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                           <h4 class="modal-title" id="Modal_CursoELIMINARLabel">PRECAUCION</h4>
                          <!-- fin x para cerrar --> 
						 </div>
                            <div class="modal-body">
                             <div class="container">
                                <h4>Esta a punto de Eliminar una Fila...</h4>  
                             </div>
                             <!---inicio pie de pagina-->
							 <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-danger"  id="btnModalELIMINARcurso">
                                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                             
							 </div>
							 <!--Fin pie de pagina-->
                            </div>
                       </div>  
                       </div>
                       </div>
					   <!--Fin Modal Eliminar-->	
				  				  
					   <br>
                       <!---Inicio ModaL Button curso---->
					    <div class="row">
                         <button type="button" id="btnmodaladdcurso" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal_curso">
                          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                          Curso
                         </button>
                        </div>
					   <!--- Final ModaL Button curso---->	
					  
					   <!--Inicio Modal curso-->					  
					   <div class="modal fade" id="Modal_curso" tabindex="-1" role="dialog" aria-labelledby="Modal_cursoLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                         <div class="modal-header">
                           <!-- inicio titulo modal con la x para cerrar -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                             <h4 class="modal-title" id="Modal_cursoLabel">Ingreso de Curso Universitario</h4>
                           <!-- Final titulo modal con la x para cerrar -->
    				     </div>
                         
						 <div class="modal-body">
                           <!-- inicio formulario centrou -->
                           <form action="" class="form-horizontal" id="form_curso">
							<div class="input-group" id="divIdCurso" style='display:none;' >
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese" aria-describedby="sizing-addon2" id="curso_IdCurso">
                            </div>
							
                            <div class="input-group">
                             <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                             <input type="text" class="form-control" placeholder="Ingrese el codigo del Curso" aria-describedby="sizing-addon2" id="curso_codigocurso">
                            </div>
							
							<br>
                             <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input type="text" class="form-control" placeholder="Ingrese nombre del curso" aria-describedby="sizing-addon2" id="curso_nombrecurso">
                             </div>
							 
							 <br>
                             <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input type="text" class="form-control" placeholder="Ingrese Laboratorio del curso" aria-describedby="sizing-addon2" id="curso_labcurso">
                             </div>
                            
							
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnaddcurso">
                                    <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
                                  <button type="button" class="btn btn-primary" style='display:none;' id="btnupdatecurso">
                                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
							   
                              </div>
                            </form>
							<!-- fin formulario curso-->
					     </div>
						 
						 </div>
				        </div>
				        </div>
					  <!--Fin modal centro--> 
				  
					  <!------INICIO TABLA MOSTRAR CURSOS----->
					  <br>
					  <div class="row">
                        <div class="col-md-9">
                           <table class="table table-hover " id="tablacurso">
                             <thead>
                                <th>Codigo Curso Universitario</th>
                                <th>Nombre Curso Universitario</th>                               
								<th>Nombre Laboratorio Universitario</th>                               

								</thead>
                             <tbody id="bodytcurso">
                                
                             </tbody >
                            </table>
                        </div>
                       </div> 
					  <!-----FIN TABLA MOSTRAR CURSOS----->	  
				 </div>