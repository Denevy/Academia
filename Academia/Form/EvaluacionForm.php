<div class="container">	
<!-- INICIO PANEL DETALLE ESTADO-->
  <div class="panel panel-default" id="Dpensum">
    <div class="panel-heading">
      <h3 class="panel-title">Evaluaciones</h3>
    </div>
    <div class="panel-body">
     INICIO EVALUACIONES
<!-- Button Modal create eSTADO-->
  <br>
  <div class="row">
    <div class="col-md-1 ">
      <button type="button" id="btnmodaladdUser" class="btn btn-primary btn-lg center" onClick="loadmodalformEstado();" data-toggle="modal" data-target="#ModalEvaluacion">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        AGREGAR EVALUACION
      </button><br><br>
      <button type="button" id="btnmodaladdUser" class="btn btn-primary btn-lg center" onClick="loadmodalformEstado();" data-toggle="modal" data-target="#ModalPregunta">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        INGRESAR PREGUNTA A EVALUCION
      </button><br><br>
      <button type="button" id="btnmodaladdUser" class="btn btn-primary btn-lg center" onClick="loadmodalformEstado();" data-toggle="modal" data-target="#ModalOpcion">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        AGREGAR OPCION A PREGUNTA
      </button><br>
    </div>
  </div>
<!-- Modal agregar EVALUACION-->
  <div class="modal fade" id="ModalEvaluacion" tabindex="-1" role="dialog" aria-labelledby="ModalEvaluacionlabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_Evaluacionlabel">Ingreso Evaluacion</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_evaluacion" >
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="ID Evaluacion" aria-describedby="sizing-addon2" id="id_evaluacion">
              <input type="text" class="form-control" placeholder="Curso" aria-describedby="sizing-addon2" id="evaluacion_curso">
              <input type="text" class="form-control" placeholder="Estado Evalucion" aria-describedby="sizing-addon2" id="estado_evaluacion">
              <input type="text" class="form-control" placeholder="ID Curso" aria-describedby="sizing-addon2" id="evaluacioncurso_id">
            </div>      
          <!-- Buttons-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="ingEvalucion"><span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
          </div>
          <!--Buttons -->
          </form>
          <!-- formulario estado -->
        </div>
      </div>  
    </div>
  </div>
  <!-- Modal --> 
<!-- Modal agregar PREGUNTA A EVALUCION-->
  <div class="modal fade" id="ModalPregunta" tabindex="-1" role="dialog" aria-labelledby="ModalPreguntalabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_PreguntaLabel">Ingreso Preguntas a evalucion</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_pregunta" >
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="ID Evaluacion" aria-describedby="sizing-addon2" id="id_Evaluacion">
              <input type="text" class="form-control" placeholder="Introsca el identificador de su pregunta" aria-describedby="sizing-addon2" id="idPregunta">
               <input type="text" class="form-control" placeholder="Introdusca su Pregunta" aria-describedby="sizing-addon2" id="preguntaEvalucion">
            </div>      
          <!-- Buttons-->
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="ingPregunta"><span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
          </div>
          <!--Buttons -->
          </form>
          <!-- formulario estado -->
        </div>
      </div>  
    </div>
  </div>
  <!-- Modal -->  

  <!-- Modal agregar OPCION A EVALUACION-->
  <div class="modal fade" id="ModalOpcion" tabindex="-1" role="dialog" aria-labelledby="ModalOpcionlabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_Opcionlabel">Ingreso de Opcion a Pregunta</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_opcion" >
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="ID Pregunta" aria-describedby="sizing-addon2" id="id_Pregunta">
              <input type="text" class="form-control" placeholder="ID Opcion" aria-describedby="sizing-addon2" id="Opcion_id">
              <input type="text" class="form-control" placeholder="Nombre Opcion" aria-describedby="sizing-addon2" id="opcion_pregunta">
            </div>      
          <!-- Buttons-->
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="ingOpcion"><span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
          </div>
          <!--Buttons -->
          </form>
          <!-- formulario estado -->
        </div>
      </div>  
    </div>
  </div>
  <!-- Modal -->  

          
	<br>
    <div class="row table-responsive">
      <div class="col-md-9 col-xs-12">
          <table class="table table-hover" id="tablausuario">
            <thead>
              <!--<th>id</th>
              <th>Estado</th>-->
            </thead>
            <tbody id="bodytEstado">              
            </tbody >
          </table>
      </div>
    </div>
    <!--//////////////// INICIO DETALLE ESTADO /////////////////-->
 

    </div>
  </div>
     <!-- FIN PANEL DETALLE ESTADO-->
</div>
