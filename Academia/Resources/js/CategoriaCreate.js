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
function selectNivelCategoria()
{
    $("#categoria_Nivel").children().remove();
    var newRow =  "<option value=''>Elija Nivel</option>";
    $(newRow).appendTo("#categoria_Nivel");
  $.ajax({
    type: "post",
    url: "../Form/Select/NivelacademicoInfo.php", //pagina a donde se envian los datos
    dataType:"json",
    success: function(result){        
        $("#categoria_Nivel").children().remove();
        var newRow =  "<option value=''>Elija Nivel</option>";
          $(newRow).appendTo("#categoria_Nivel");
        
        $.each(result, function(z,grado){ // iteraciones para desplegar cada fila de la tabla usuarios
           newRow =   "<option  value="+grado.id+">"+grado.grado+"</option>";
          $(newRow).appendTo("#categoria_Nivel");
        });categoria_Nivel    
    }
  });
}

function loadmodalformCategoria(){
 document.getElementById('btnupdateCategoria').style.display = 'none';
 document.getElementById('btnaddCategoria').style.display = 'inline';
  
  $("#categoria_Nivel").children().remove(); // limpiamos el select del ciclo
  var newRow =  "<option value=''>Elija Nivel</option>";
  $(newRow).appendTo("#categoria_Nivel");
    selectNivelCategoria();    
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
      document.getElementById("btnaddCategoria").disabled=true; // desabilita el boton mientras operamos
      var tipo = $('#categoria_tipo').val();
      var descripcion =$('#categoria_descripcion').val();
      var nivel = $('#categoria_Nivel').val();
      var bandera = 1;
      var dataString = 'tipo='+tipo+'&descripcion='+descripcion+'&nivel='+nivel;
      if(bandera == '1'){
      // AJAX Code To Submit Form.
      //alert(dataString);
        $.ajax({
          type: "post",
          url: "../Controller/CategoriaInsert.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            var form = document.getElementById("form_categoria");
            form.reset(); // limpia de los input
            $('#ModalCreateCategoria').modal('hide');  // esconder el modal
            limpiarcombosCategoria();
            mostrartablaCategoria();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddCategoria").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});