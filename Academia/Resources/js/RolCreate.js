function limpiarcombosRol(){
  $("#Rol_Nombre").attr('value',"");
}
function mostrartablaRol() 
{ 
  $.ajax({
    type: "post",
    url: "../Controller/RolTable.php",
    dataType:"json",
    success: function(result){
        $("#bodytRol").children().remove(); // limpia la tabla
        $.each(result, function(i,roltd){ // iteraciones para desplegar cada fila de la tabla centros
        var parametro = JSON.stringify(roltd);
        var newRow =
        "<tr>"
          +"<td>"+roltd.idrol+"</td>"
          +"<td>"+roltd.privilegio+"</td>"
       +"</tr>";

        $(newRow).appendTo("#bodytRol");
       //alert(newRow);
        });
    }
  });
  //termina ajax
  return false;  
}
function loadmodalformRol(){
 document.getElementById('btnupdateRol').style.display = 'none';
 document.getElementById('btnaddRol').style.display = 'inline';
}
     
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
  $('#btnmodaladdRol').click(function(){
    limpiarcombosRol();
  });
  $('#myTab a[href="#rol"]').click(function(){ // en un click mostrar la pestana de Usuarios
    mostrartablaRol();
  //alert("Ingreso aca a el js");
  });
  $("#btnaddRol").click(function(){
      document.getElementById("btnaddRol").disabled=true; // desabilita el boton mientras operamos
      var rolnombre = $('#Rol_Nombre').val();
      var bandera = 1;
      var dataString = 'rol='+rolnombre;
      if(bandera == '1'){
      // AJAX Code To Submit Form.
      //alert(dataString);
        $.ajax({
          type: "post",
          url: "../Controller/RolInsert.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            document.getElementById("btnaddRol").disabled=true; 
            var form = document.getElementById("form_rol");
            form.reset(); // limpia de los input
            $('#ModalCreateRol').modal('hide');  // esconder el modal
            limpiarcombosRol();
            mostrartablaRol();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddRol").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});