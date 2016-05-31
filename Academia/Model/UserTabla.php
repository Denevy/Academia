<div class="container">	

<!-- INICIO PANEL DETALLE USUARIO-->
  <div class="panel panel-default" id="Dpensum">
    <div class="panel-heading">
      <h3 class="panel-title">Detalle de Usuarios</h3>
    </div>
    <div class="panel-body">
     INICIO DETALLE USUARIO 
<!-- Button Modal create User-->
  <br>
  <div class="row">
    <div class="col-md-1 ">
      <button type="button" id="btnmodaladdUser" class="btn btn-primary btn-lg center" onClick="loadmodalformUser();" data-toggle="modal" data-target="#ModalCreateUser">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Usuarios
      </button>
    </div>
  </div>
<!-- Modal agregar Docente-->
  <div class="modal fade" id="ModalCreateUser" tabindex="-1" role="dialog" aria-labelledby="ModalUserLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- titulo lodal con la x para cerrar -->
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
          <h4 class="modal-title" id="Modal_UserLabel">Ingreso de Usuarios</h4>
        </div>
        <div class="modal-body">
          <!-- formulario usuarios -->
          <form action="" class="form-horizontal" id="form_user" >
            <div class="form-group" id="divIdUser" style='display:none;' >
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Ingrese el Nombre" aria-describedby="sizing-addon2" id="docente_IdUser">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon2" id="user_Alias">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Nombre" aria-describedby="sizing-addon2" id="user_Nombres">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Apellidos" aria-describedby="sizing-addon2" id="user_Apellidos">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Edad" aria-describedby="sizing-addon2" id="user_Edad">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-lock" aria-hidden="true"></span>
              <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon2" id="user_Pass">
            </div>
            <div class="form-group">
              <span class="input-group-addon" id="sizing-addon2" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <input type="password" class="form-control" placeholder="Confirmar Contraseña" aria-describedby="sizing-addon2" id="user_PassCheck">
            </div>
            <div class="form-group">
              <select class="form-control" id="User_Estado" class="{required:true} span3" >
                <option value="false">Elija Estado</option>
              </select>
              <br>
              <select class="form-control" id="User_Nivel"  class="{required:true} span3" >
                  <option value="false">Elija un Nivel</option>
              </select>
            </div>            
          <!-- Buttons-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnaddUser">
              <span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span></button>
            <button type="button" class="btn btn-primary" style='display:none;' id="btnupdateUser">
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
          <table class="table table-hover" id="tablausuario">
            <thead>
              <th>id</th>
              <th>Usuario</th>
              <th>Contraseña</th>
              <th>Nombres</th>    
              <th>Estado</th>
              <th>Nivel</th>
            </thead>
            <tbody id="bodytUser">              
            </tbody >
          </table>
      </div>
    </div>
    <!--//////////////// INICIO DETALLE USUARIOS /////////////////-->
 

    </div>
  </div>
     <!-- FIN PANEL DETALLE USUARIO-->
</div>
