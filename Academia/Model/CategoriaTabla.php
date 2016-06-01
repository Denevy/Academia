<div class="container">	

<!-- INICIO PANEL DETALLE USUARIO-->
  <div class="panel panel-default" id="Dpensum">
    <div class="panel-heading">
      <h3 class="panel-title">Detalle de Categorias</h3>
    </div>
    <div class="panel-body">
     INICIO DETALLE CATEGORIAS 
<!-- Button Modal create Categorias-->
  <br>
  <div class="row">
    <div class="col-md-1 ">
      <button type="button" id="btnmodaladdCategorias" class="btn btn-primary btn-lg center" onClick="loadmodalformCategorias();" data-toggle="modal" data-target="#ModalCreateCategorias">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Categorias
      </button>
    </div>
  </div>
<!-- Modal agregar Docente-->
  <div class="modal fade" id="ModalCreateCategorias" tabindex="-1" role="dialog" aria-labelledby="ModalCategoriasLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_CategoriasLabel">Ingreso de Categorias</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_user" >
            <div class="form-group" id="divIdCategoria" style='display:none;' >
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Ingrese el tipo" aria-describedby="sizing-addon2" id="categoria_Id">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Nombre" aria-describedby="sizing-addon2" id="categoria_Nombre">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <textarea class="form-control" rows="3" placeholder="Descripción" aria-describedby="sizing-addon2" id="categoria_Descripcion"></textarea>
            </div>            
          <!-- Buttons-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnaddCategoria">
              <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateCategoria">
              <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Guardar</button>
          </div>
          <!--Buttons -->
          </form>
          <!-- formulario usuarios -->
        </div>
      </div>  
    </div>
  </div>
  <!-- Modal -->  
          
	<br>
    <div class="row table-responsive">
      <div class="col-md-9 col-xs-12">
          <table class="table table-hover" id="tablaCategoria">
            <thead>
              <th>id</th>
              <th>Nombre</th>
              <th>Descripción</th>
            </thead>
            <tbody id="bodytCategoria">              
            </tbody >
          </table>
      </div>
    </div>
    <!--//////////////// INICIO DETALLE Categoria /////////////////-->
 

    </div>
  </div>
     <!-- FIN PANEL DETALLE Categoria-->
</div>
