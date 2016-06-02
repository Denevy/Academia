function limpiarcombosGrado(){
  $("#Grado_Nombre").attr('value',"");
}
function mostrartablaGrado() 
{ 
  $.ajax({
    type: "post",
    url: "../Controller/GradoTable.php",
    dataType:"json",
    success: function(result){
        $("#bodytGrado").children().remove(); // limpia la tabla
        $.each(result, function(i,gradotd){ // iteraciones para desplegar cada fila de la tabla centros
        var parametro = JSON.stringify(gradotd);
        var newRow =
        "<tr>"
          +"<td>"+gradotd.idgrado+"</td>"
          +"<td>"+gradotd.grado+"</td>"
       +"</tr>";

        $(newRow).appendTo("#bodytGrado");
       //alert(newRow);
        });
    }
  });
  //termina ajax
  return false;  
}
function loadmodalformGrado(){
 document.getElementById('btnupdateGrado').style.display = 'none';
 document.getElementById('btnaddGrado').style.display = 'inline';
}
     
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
  $('#btnmodaladdGrado').click(function(){
    limpiarcombosGrado();
  });
  $('#myTab a[href="#grado"]').click(function(){ // en un click mostrar la pestana de Usuarios
    mostrartablaGrado();
  //alert("Ingreso aca a el js");
  });
  $("#btnaddGrado").click(function(){
      document.getElementById("btnaddGrado").disabled=true; // desabilita el boton mientras operamos
      var gradonombre = $('#Grado_Nombre').val();
      var bandera = 1;
      var dataString = 'grado='+gradonombre;
      if(bandera == '1'){
      // AJAX Code To Submit Form.
      //alert(dataString);
        $.ajax({
          type: "post",
          url: "../Controller/GradoInsert.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            document.getElementById("btnaddGrado").disabled=true; 
            var form = document.getElementById("form_grado");
            form.reset(); // limpia de los input
            $('#ModalCreateGrado').modal('hide');  // esconder el modal
            limpiarcombosGrado();
            mostrartablaGrado();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddGrado").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});