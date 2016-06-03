<div class="container">	

<!-- INICIO PANEL DETALLE USUARIO-->
  <div class="panel panel-default" id="Dcategoria">
    <div class="panel-heading">
      <h3 class="panel-title">Detalle de Categoria</h3>
    </div>
    <div class="panel-body">
     INICIO DETALLE CATEGORIA
<!-- Button Modal create User-->
  <br>
  <div class="row">
    <div class="col-md-1 ">
      <button type="button" id="btnmodaladdCategoria" class="btn btn-primary btn-lg center" onClick="loadmodalformCategoria();" data-toggle="modal" data-target="#ModalCreateCategoria">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        AGREGAR
      </button>
    </div>
  </div>
<!-- Modal agregar Docente-->
  <div class="modal fade" id="ModalCreateCategoria" tabindex="-1" role="dialog" aria-labelledby="ModalCategoriaLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_CategoriaLabel">Ingreso de Categoria</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_categoria" >
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Tipo" aria-describedby="sizing-addon2" id="categoria_tipo">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Descripcion" aria-describedby="sizing-addon2" id="categoria_descripcion">
            </div>
            <div class="form-group">
            <br>
              <select class="form-control" id="categoria_nivel" class="{required:true} span3" >
                <option value="false">Elija Nivel Academico</option>
              </select>              
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
          <table class="table table-hover" id="tablacategoria">
            <thead>
              <th>id</th>
              <th>Tipo</th>
              <th>Descripción</th>
              <th>Nivel Academico</th>    
            </thead>
            <tbody id="bodytCategoria">              
            </tbody >
          </table>
      </div>
    </div>
    <!--//////////////// INICIO DETALLE USUARIOS /////////////////-->
 

    </div>
  </div>
     <!-- FIN PANEL DETALLE USUARIO-->
</div>
