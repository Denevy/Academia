function limpiarcombosEstado(){
  $("#Estado_Nombre").attr('value',"");
}
function mostrartablaEstado() 
{ 
  $.ajax({
    type: "post",
    url: "../Controller/EstadoTable.php",
    dataType:"json",
    success: function(result){
        $("#bodytEstado").children().remove(); // limpia la tabla
        $.each(result, function(i,estadotd){ // iteraciones para desplegar cada fila de la tabla centros
        var parametro = JSON.stringify(estadotd);
        var newRow =
        "<tr>"
          +"<td>"+estadotd.idestado+"</td>"
          +"<td>"+estadotd.tipo+"</td>"
       +"</tr>";

        $(newRow).appendTo("#bodytEstado");
       //alert(newRow);
        });
    }
  });
  //termina ajax
  return false;  
}
function loadmodalformEstado(){
 document.getElementById('btnupdateEstado').style.display = 'none';
 document.getElementById('btnaddEstado').style.display = 'inline';
}
     
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
  $('#btnmodaladdEstado').click(function(){
    limpiarcombosEstado();
  });
  $('#myTab a[href="#estado"]').click(function(){ // en un click mostrar la pestana de Usuarios
    mostrartablaEstado();
  //alert("Ingreso aca a el js");
  });
  $("#btnaddEstado").click(function(){
      document.getElementById("btnaddEstado").disabled=true; // desabilita el boton mientras operamos
      var estadonombre = $('#Estado_Nombre').val();
      var bandera = 1;
      var dataString = 'estado='+estadonombre;
      if(bandera == '1'){
      // AJAX Code To Submit Form.
      //alert(dataString);
        $.ajax({
          type: "post",
          url: "../Controller/EstadoInsert.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            document.getElementById("btnaddEstado").disabled=true; 
            var form = document.getElementById("form_estado");
            form.reset(); // limpia de los input
            $('#ModalCreateEstado').modal('hide');  // esconder el modal
            limpiarcombosEstado();
            mostrartablaEstado();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddEstado").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});