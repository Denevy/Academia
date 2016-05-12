function limpiarcombosUser(){
  $("#user_Name").attr('value',"");
  $("#user_Nombres").attr('value',"");
  $("#user_Apellidos").attr('value',"");
  $("#user_Edad").attr('value',"");
  $("#user_Pass").attr('value',"");
  $("#user_PassCheck").attr('value',"");
  $("#User_Estado").attr('value',"");
  $("#User_Nivel").attr('value',"");
}
function mostrartablaUser() 
{ 
  $.ajax({
    type: "post",
    url: "php/tablaUsuario.php",
    dataType:"json",
    success: function(result){
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
        $("#bodytUser").children().remove(); // limpia la tabla
        $.each(result, function(i,usuariotd){ // iteraciones para desplegar cada fila de la tabla centros
        var parametro = JSON.stringify(usuariotd);
        var newRow =
        "<tr>"
          +"<td>"+usuariotd.idUser+"</td>"
          +"<td>"+usuariotd.usuario+"</td>"
          +"<td>"+usuariotd.passUser+"</td>"
          +"<td>"+usuariotd.nameUser+"</td>"
          +"<td>"+usuariotd.estadoUser+"</td>"
          +"<td>"+usuariotd.levelUser+"</td>"
       +"</tr>";

        $(newRow).appendTo("#bodytUser");
       //alert(newRow);
        });
      }
    }
  });
  //termina ajax
  return false;  
}
function selectEstado()
{
  $("#User_Estado").children().remove();
    var newRow =  "<option value=''>Elija Estado</option>";
    $(newRow).appendTo("#User_Estado");
  $.ajax({
    type: "post",
    url: "php/modalUserEstado.php", //pagina a donde se envian los datos
    dataType:"json",
    success: function(result){
        
      $("#User_Estado").children().remove();
        var newRow =  "<option value=''>Elija un Estado</option>";
          $(newRow).appendTo("#User_Estado");
          // alert(idpensum);
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});

        
      }
      else{
        $("#User_Estado").children().remove();
        var newRow =  "<option value=''>Elija un Estado</option>";
          $(newRow).appendTo("#User_Estado");
        
        $.each(result, function(i,estado){ // iteraciones para desplegar cada fila de la tabla usuarios
           newRow =   "<option  value="+estado.id+">"+estado.estado+"</option>";
          $(newRow).appendTo("#User_Estado");
        });
      }
      
      
    }
  });
}
function selectNivel()
{
    $("#User_Nivel").children().remove();
    var newRow =  "<option value=''>Elija Nivel de Acceso</option>";
    $(newRow).appendTo("#User_Nivel");
  $.ajax({
    type: "post",
    url: "php/modalUserNivel.php", //pagina a donde se envian los datos
    dataType:"json",
    success: function(result){        
      $("#User_Nivel").children().remove();
        var newRow =  "<option value=''>Elija Nivel de Acceso</option>";
          $(newRow).appendTo("#User_Nivel");
          // alert(idpensum);
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2}); 
      }
      else{
        $("#User_Nivel").children().remove();
        var newRow =  "<option value=''>Elija Nivel de Acceso</option>";
          $(newRow).appendTo("#User_Nivel");
        
        $.each(result, function(i,nivel){ // iteraciones para desplegar cada fila de la tabla usuarios
           newRow =   "<option  value="+nivel.id+">"+nivel.privilegio+"</option>";
          $(newRow).appendTo("#User_Nivel");
        });User_Nivel
      }     
    }
  });
}

function loadmodalformUser(){
 document.getElementById('btnupdateUser').style.display = 'none';
 document.getElementById('btnaddUser').style.display = 'inline';
  
  $("#User_Estado").children().remove();
    var newRow =  "<option value=''>Elija un Pensum</option>";
    $(newRow).appendTo("#User_Estado");

  $("#User_Nivel").children().remove(); // limpiamos el select del ciclo
  var newRow =  "<option value=''>Elija un Ciclo</option>";
  $(newRow).appendTo("#User_Nivel");
    selectEstado();
    selectNivel();    
}
     
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
  $('#btnmodaladdUser').click(function(){
    limpiarcombosUser();
  });
  $('#myTab a[href="#user"]').click(function(){ // en un click mostrar la pestana de Usuarios
  mostrartablaUser();
  //alert("Ingreso aca a el js");
  });
  $("#btnaddUser").click(function(){
      document.getElementById("btnaddUser").disabled=true; // desabilita el boton mientras operamos
      var username = $('#user_Alias').val();
      var nombres =$('#user_Nombres').val();
      var apellidos = $('#user_Apellidos').val();
      var edad = $('#user_Edad').val();
      var pass = $('#user_Pass').val();
      var passcheck = $('#user_PassCheck').val();
      var Estado = $("#User_Estado").val();
      var Nivel = $("#User_Nivel").val();
      var bandera = 1;
      var dataString = 'username='+username+'&nombres='+ nombres+'&apellidos='+apellidos+'&edad='+edad+'&pass='+pass+' &estado='+ Estado + '&nivel='+ Nivel;
      if(pass != passcheck){
        bootbox.alert('Verifique Contraseña');
        document.getElementById("btnaddUser").disabled=false;
        bandera = 0;
      }
      if(username==''|| nombres=='' || pass=='' || Estado==''|| Nivel==''|| apellidos==''|| edad==''){
        bootbox.alert('Por favor llene los campos requeridos');
        document.getElementById("btnaddUser").disabled=false;
        bandera = 0;
      }
      if(bandera == '1'){
      // AJAX Code To Submit Form.
      //alert(dataString);
        $.ajax({
          type: "post",
          url: "php/agregarusuario.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            var form = document.getElementById("form_user");
            form.reset(); // limpia de los input
            $('#ModalCreateUser').modal('hide');  // esconder el modal
            limpiarcombosUser();
            mostrartablaUser();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddUser").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});