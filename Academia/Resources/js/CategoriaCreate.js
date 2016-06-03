function limpiarcombosCategoria(){
  $("#categoria_Nombre").attr('value',"");
  $("#categoria_Descripcion").attr('value',"");
  $("#categoria_nivel").attr('value',"");

}
function mostrartablaCategoria() 
{ 
  $.ajax({
    type: "post",
    url: "../Controller/CategoriaTable.php",
    dataType:"json",
    success: function(result){
        $("#bodytCategoria").children().remove(); // limpia la tabla
        $.each(result, function(i,categoriatd){ // iteraciones para desplegar cada fila de la tabla centros
        var parametro = JSON.stringify(categoriatd);
        var newRow =
        "<tr>"
          +"<td>"+categoriatd.idcategoria+"</td>"
          +"<td>"+categoriatd.tipo+"</td>"
          +"<td>"+categoriatd.descripcion+"</td>"
          +"<td>"+categoriatd.nivel+"</td>"
       +"</tr>";
        $(newRow).appendTo("#bodytCategoria");
       //alert(newRow);
        });
    }
  });
  //termina ajax
  return false;  
}
function selectNivel()
{
    $("#Categoria_Nivel").children().remove();
    var newRow =  "<option value=''>Elija Nivel</option>";
    $(newRow).appendTo("#Categoria_Nivel");
  $.ajax({
    type: "post",
    url: "../Form/Select/NivelInfo.php", //pagina a donde se envian los datos
    dataType:"json",
    success: function(result){        
        $("#Categoria_Nivel").children().remove();
        var newRow =  "<option value=''>Elija Nivel</option>";
          $(newRow).appendTo("#Categoria_Nivel");
        
        $.each(result, function(z,nivel){ // iteraciones para desplegar cada fila de la tabla usuarios
           newRow =   "<option  value="+nivel.id+">"+nivel.privilegio+"</option>";
          $(newRow).appendTo("#Categoria_Nivel");
        });Categoria_Nivel    
    }
  });
}

function loadmodalformUser(){
 document.getElementById('btnupdateCategoria').style.display = 'none';
 document.getElementById('btnaddCategoria').style.display = 'inline';
  
  $("#Categoria_Nivel").children().remove(); // limpiamos el select del ciclo
  var newRow =  "<option value=''>Elija un Ciclo</option>";
  $(newRow).appendTo("#Categoria_Nivel");
    selectNivel();    
}
     
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
  $('#btnmodaladdCategoria').click(function(){
    limpiarcombosCategoria();
  });
  $('#myTab a[href="#categoria"]').click(function(){ // en un click mostrar la pestana de Usuarios
  mostrartablaCategoria();
  //alert("Ingreso aca a el js");
  });
  $("#btnaddCategoria").click(function(){
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
          url: "../Controller/UserInsert.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            var form = document.getElementById("form_user");
            form.reset(); // limpia de los input
            $('#ModalCreateUser').modal('hide');  // esconder el modal
            limpiarcombosCategoria();
            mostrartablaCategoria();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddUser").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});