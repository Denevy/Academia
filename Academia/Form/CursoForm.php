<div class="container">	

<!-- INICIO PANEL CURSO-->
  <div class="panel panel-default" id="Dcurso">
    <div class="panel-heading">
      <h3 class="panel-title">Detalle de Curso</h3>
    </div>
    <div class="panel-body">
     INICIO DETALLE CURSO
<!-- Button Modal create Curso-->
  <br>
  <div class="row">
    <div class="col-md-1 ">
      <button type="button" id="btnmodaladdCurso" class="btn btn-primary btn-lg center" onClick="loadmodalformCurso();" data-toggle="modal" data-target="#ModalCreateCurso">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        AGREGAR
      </button>
    </div>
  </div>
<!-- Modal agregar Curso-->
  <div class="modal fade" id="ModalCreateCurso" tabindex="-1" role="dialog" aria-labelledby="ModalCursoLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_CursoLabel">Ingreso de Cursos</h4>
        </div>
        <div class="modal-body">
          <!-- formulario curso -->
          <form action="" class="form-horizontal" id="form_curso" >
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Nombre" aria-describedby="sizing-addon2" id="curso_nombre">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Descripcion" aria-describedby="sizing-addon2" id="curso_descripcion">
            </div>
            <div class="form-group">
            <br>
              <select class="form-control" id="curso_categoria" class="{required:true} span3" >
                <option value="false">Elija Categoria</option>
              </select>
            </div> 
          <!-- Buttons-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnaddCurso">
              <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateCurso">
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
          <table class="table table-hover" id="tablacurso">
            <thead>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Categoria</th>
              <th>Nivel academico</th>    
            </thead>
            <tbody id="bodytCurso">              
            </tbody >
          </table>
      </div>
    </div>
    <!--//////////////// INICIO DETALLE USUARIOS /////////////////-->
 

    </div>
  </div>
     <!-- FIN PANEL DETALLE USUARIO-->
</div>
