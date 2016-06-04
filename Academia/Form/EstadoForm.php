<div class="container">	
<!-- INICIO PANEL DETALLE ESTADO-->
  <div class="panel panel-default" id="Dpensum">
    <div class="panel-heading">
      <h3 class="panel-title">Detalle de Estado</h3>
    </div>
    <div class="panel-body">
     INICIO DETALLE ESTADO
<!-- Button Modal create eSTADO-->
  <br>
  <div class="row">
    <div class="col-md-1 ">
      <button type="button" id="btnmodaladdUser" class="btn btn-primary btn-lg center" onClick="loadmodalformEstado();" data-toggle="modal" data-target="#ModalCreateEstado">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        AGREGAR
      </button>
    </div>
  </div>
<!-- Modal agregar ESTADO-->
  <div class="modal fade" id="ModalCreateEstado" tabindex="-1" role="dialog" aria-labelledby="ModalEstadoLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_EstadoLabel">Ingreso de Estados</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_estado" >
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Estado" aria-describedby="sizing-addon2" id="Estado_Nombre">
            </div>      
          <!-- Buttons-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnaddEstado">
              <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateEstado">
              <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Guardar</button>
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
              <th>Estado</th>
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
