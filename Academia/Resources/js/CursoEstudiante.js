function mostrartablaCurso() 
{ 
  $.ajax({
    type: "post",
    url: "../Controller/CursoEstudianteTable.php",
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
       +"</tr>";
        $(newRow).appendTo("#bodytCurso");
       //alert(newRow);
        });
    }
  });
  //termina ajax
  return false;  
}
$(document).ready(function(){     
  $('#myTab a[href="#CursoEstudiante"]').click(function(){ // en un click mostrar la pestana de Usuarios
  mostrartablaCurso();
  });
});