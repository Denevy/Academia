function buscarpensum(){
  var busc1 = $('#pensumbuscar1').val();
  var busc2 = $('#pensumbuscar2').val();
  var dataString = 'buscar1='+ busc1 + '&buscar2='+ busc2;
  $.ajax({
    type: "post",
    url: "php/buscarusuario.php",
    data: dataString,
    dataType:"json",
    success: function(result){
      $("#bodytpensum").children().remove();
      if(result.errorSelect==true){
        mostrartablapensum();
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
        $("#bodytpensum").children().remove(); // limpia la tabla
        $.each(result, function(i,pensumtd){ // iteraciones para desplegar cada fila de la tabla usuarios
        var parametro = JSON.stringify(pensumtd);
        var newRow =
        "<tr>"
          +"<td>"+usuariotd.NombreCompleto+"</td>"
          +"<td>"+usuariotd.contrasenia+"</td>"
          +"<td>"+usuariotd.fk_idNivelAcceso+"</td>"
          +"<td>"+usuariotd.Usuario+"</td>"
          +"<td>"+usuariotd.fk_idEstados+"</td>"
          +"<td>" 
            +"<button  type='button' id='btneliminarpensum' onClick='alertaeliminarpensum("+pensumtd.idpensum+");' class='btn btn-danger'>"
                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
            +"</button>" 
          +"</td>"
          +"<td>" 
            +"<button data-toggle='modal' data-target='#Modal_Pensum' type='button' id='btnupdatepensum' onClick='editarpensum("+parametro+");'  class='btn btn-default'>"
              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
               //   
            +"</button>" 
          +"</td>"
        +"</tr>";
        $(newRow).appendTo("#bodytpensum");
        });
      }
    }
  });
  
}
function limpiarcamposformpensum(){
  $("#pensum_aniopensum").attr('value',"");
  // $("#pensum_fkCentro").attr('value',"");
  // $("#pensum_fkCarrera").attr('value',"");

}

function alertaeliminarpensum(val){
  
  $('#Modal_PensumELIMINAR').modal('show');  // mostrar el modal
  $("#btnModalELIMINARpensum").attr('value',val);
}

function eliminarpensum(val){
  document.getElementById("btnModalELIMINARpensum").disabled=true;
  $.ajax({
    type: "post",
    url: "php/eliminarpensum.php",
    data: "idpensum="+val,
    dataType:"json",
    success: function(result){
      document.getElementById("btnModalELIMINARpensum").disabled=false;
      $("#bodytpensum").children().remove();
      $('#Modal_PensumELIMINAR').modal('hide'); // ocultar el modal
      mostrartablapensum();
      bootbox.alert({title: result.r1, message: result.r2});
    }
  });
}
function editarpensum(pensumtd){
  limpiarcamposformpensum();
  document.getElementById('btnaddpensum').style.display = 'none'; // esconde boton agregar usuario
  document.getElementById('btnupdatepensum').style.display = 'inline';  // muestra boton insertar usuario
  $("#pensum_Idpensum").attr('value',pensumtd.idpensum);
  $("#pensum_aniopensum").attr('value',pensumtd.anioPensum);
  // $("#pensum_fkCentro").attr('value',pensumtd.fk_idcentroU);
  // $("#pensum_fkCarrera").attr('value',pensumtd.fk_idcarrera);

  // $('#Modal_Usuario').modal('show');  // mostrar el modal
  // alert("nivel acceso=  "+usuariotd.fk_idNivelAcceso);
  // alert("estado=  "+usuariotd.fk_idEstados);
  
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function mostrartablapensum() { // funcion para  mostrar la tabla de usuarios
  // AJAx codigo para desplegar la tabla con todos los usarios
  $.ajax({
    type: "post",
    url: "php/tablapensum.php",
    dataType:"json",
    success: function(result){
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
        $("#bodytpensum").children().remove(); // limpia la tabla
        $.each(result, function(i,pensumtd){ // iteraciones para desplegar cada fila de la tabla usuarios
        var parametro = JSON.stringify(pensumtd);
        var newRow =
        "<tr>"
          // +"<td>"+pensumtd.idpensum+"</td>"
          +"<td>"+pensumtd.anioPensum+"</td>"
          // +"<td>"+pensumtd.fk_idcentroU+"</td>"
          // +"<td>"+pensumtd.fk_idcarrera+"</td>"
          +"<td>" 
            +"<button  type='button' id='btneliminarpensum' onClick='alertaeliminarpensum("+pensumtd.idpensum+");' class='btn btn-danger'>"
                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
            +"</button>" 
          +"</td>"
          +"<td>" 
            +"<button data-toggle='modal' data-target='#Modal_Pensum' type='button' id='btnupdatepensum' onClick='editarpensum("+parametro+");'  class='btn btn-default'>"
              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
               //   
            +"</button>" 
          +"</td>"
        +"</tr>";
        $(newRow).appendTo("#bodytpensum");
        });
      }
    }
  });
  //termina ajax
  return false;  
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
  // $('body').on('click','#aidusuario', function (e){
  //   e.preventDefault();
  //   idusuario= $(this).attr('href');
  // alert(idpensum);
  // });

 
  $('#btnModalELIMINARpensum').click(function(){ // boton del modal 
      var idpensum = $('#btnModalELIMINARpensum').val();
      eliminarpensum(idpensum);

  });  
  $('#btnupdatepensum').click(function(){ // boton del modal 
    document.getElementById("btnupdatepensum").disabled=true;
    var idpensum= $("#pensum_Idpensum").val();
    var anioPensum = $("#pensum_aniopensum").val();
    // var fk_idcentroU = $("#pensum_fkCentro").val();
    // var fk_idcarrera = $("#pensum_fkCarrera").val();


     var dataString = 'anioPensum='+ anioPensum + '&idpensum='+ idpensum;
    $.ajax({
      type: "post",
      url: "php/editarpensum.php", //pagina a donde se envian los datos
      data: dataString, // datos an enviar por el metodo post
      dataType:"json",
      success: function(result){
        document.getElementById("btnupdatepensum").disabled=false;
        $('#Modal_Pensum').modal('hide');  // esconder el modal
        bootbox.alert({title: result.r1, message: result.r2});
        limpiarcamposformpensum();
        mostrartablapensum();
        limpiarcamposformpensum();
      }
    });
  });
  $('#btnmodaladdpensum').click(function(e){ // boton del modal 
      
      limpiarcamposformpensum();

      document.getElementById('btnupdatepensum').style.display = 'none'; // boton actializar desaparece dentro del modal 
      document.getElementById('btnaddpensum').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
  });
  $('#myTab a[href="#pensum"]').click(function(){ // en un click mostrar la pestana usuarios
      mostrartablapensum();

  });

  $("#btnaddpensum").click(function(){
    document.getElementById("btnaddpensum").disabled=true; // desabilita el boton mientras operamos
    var anioPensum = $("#pensum_aniopensum").val();
    // var fk_idcentroU = $("#pensum_fkCentro").val();
    // var fk_idcarrera = $("#pensum_fkCarrera").val();
    
    var dataString = 'anioPensum='+ anioPensum;
    if(anioPensum==''){
      bootbox.alert('Por favor llene los campos requeridos FFFFFFFFFFFFFFfffffff');
      document.getElementById("btnaddpensum").disabled=false;
    }
    else{
    // AJAX Code To Submit Form.
      $.ajax({
        type: "post",
        url: "php/agregarpensum.php",
        data: dataString,
        dataType:"json",
        success: function(result){
          var form = document.getElementById("form_pensum");
          form.reset(); // limpia de los input
          $('#Modal_Pensum').modal('hide');  // esconder el modal
          mostrartablapensum();
          bootbox.alert({title: result.r1,
          message: result.r2});
          document.getElementById("btnaddpensum").disabled=false; // habilitamos el boton
        }
      });
    }
    
    return false;
  });
});