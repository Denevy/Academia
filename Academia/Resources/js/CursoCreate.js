function limpiarcombosCurso(){
  $("#curso_nombre").attr('value',"");
  $("#curso_descripcion").attr('value',"");
  $("#curso_categoria").attr('value',"");

}
function mostrartablaCurso() 
{ 
  $.ajax({
    type: "post",
    url: "../Controller/CursoTable.php",
    dataType:"json",
    success: function(result){
        $("#bodytCurso").children().remove(); // limpia la tabla
        $.each(result, function(i,cursotd){ // iteraciones para desplegar cada fila de la tabla centros
        var parametro = JSON.stringify(cursotd);
        var newRow =
        "<tr>"
          +"<td>"+cursotd.nombre+"</td>"
          +"<td>"+cursotd.descripcion+"</td>"
          +"<td>"+cursotd.tipo+"</td>"
          +"<td>"+cursotd.grado+"</td>"
       +"</tr>";
        $(newRow).appendTo("#bodytCurso");
       //alert(newRow);
        });
    }
  });
  //termina ajax
  return false;  
}
function selectCategoriaCurso()
{
    $("#curso_categoria").children().remove();
    var newRow =  "<option value=''>Elija Categoria</option>";
    $(newRow).appendTo("#curso_categoria");
  $.ajax({
    type: "post",
    url: "../Form/Select/CategoriaInfo.php", //pagina a donde se envian los datos
    dataType:"json",
    success: function(result){        
        $("#curso_categoria").children().remove();
        var newRow =  "<option value=''>Elija Categoria</option>";
          $(newRow).appendTo("#curso_categoria");
        
        $.each(result, function(z,curso){ // iteraciones para desplegar cada fila de la tabla usuarios
           newRow =   "<option  value="+curso.id+">"+curso.tipo+" - "+curso.grado+"</option>";
          $(newRow).appendTo("#curso_categoria");
        });curso_categoria    
    }
  });
}

function loadmodalformCurso(){
 document.getElementById('btnupdateCurso').style.display = 'none';
 document.getElementById('btnaddCurso').style.display = 'inline';
  
  $("#curso_categoria").children().remove(); // limpiamos el select del ciclo
  var newRow =  "<option value=''>Elija Categoria</option>";
  $(newRow).appendTo("#curso_categoria");
    selectCategoriaCurso();    
}
     
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
  $('#btnmodaladdCurso').click(function(){
    limpiarcombosCurso();
  });
  $('#myTab a[href="#curso"]').click(function(){ // en un click mostrar la pestana de Usuarios
  mostrartablaCurso();
  //alert("Ingreso aca a el js");
  });
 $("#btnaddCurso").click(function(){
      document.getElementById("btnaddCurso").disabled=true; // desabilita el boton mientras operamos
      var nombre = $('#curso_nombre').val();
      var descripcion =$('#curso_descripcion').val();
      var categoria = $('#curso_categoria').val();
      var bandera = 1;
      var dataString = 'nombre='+nombre+'&descripcion='+descripcion+'&categoria='+categoria;
      if(bandera == '1'){
      // AJAX Code To Submit Form.
      //alert(dataString);
        $.ajax({
          type: "post",
          url: "../Controller/CursoInsert.php",
          data: dataString,
          dataType:"json",
          success: function(result){
            var form = document.getElementById("form_curso");
            form.reset(); // limpia de los input
            $('#ModalCreateCurso').modal('hide');  // esconder el modal
            limpiarcombosCurso();
            mostrartablaCurso();
            bootbox.alert({title: result.r1,
            message: result.r2});
            document.getElementById("btnaddCurso").disabled=false; // habilitamos el boton
          }
        });
      }   
      return false;
    });
});