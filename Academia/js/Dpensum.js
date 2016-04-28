// function buscarDpensum(){
//   var busc1 = $('#Dpensumbuscar1').val();
//   var busc2 = $('#Dpensumbuscar2').val();
//   var dataString = 'buscar1='+ busc1 + '&buscar2='+ busc2;
//   $.ajax({
//     type: "post",
//     url: "php/buscarDusuario.php",
//     data: dataString,
//     dataType:"json",
//     success: function(result){
//       $("#bodytDpensum").children().remove();
//       if(result.errorSelect==true){
//         mostrartablaDpensum();
//         bootbox.alert({title: result.r1, message: result.r2});
//       }
//       else{
//         $("#bodytDpensum").children().remove(); // limpia la tabla
//         $.each(result, function(i,dpensumtd){ // iteraciones para desplegar cada fila de la tabla usuarios
//         var parametro = JSON.stringify(dpensumtd);
//         var newRow =
//         "<tr>"


//           +"<td>"+dpensumtd.iddetallepensum+"</td>"
//           +"<td>"+dpensumtd.fk_idcurso+"</td>"
//           +"<td>"+dpensumtd.fk_idciclo+"</td>"
//           +"<td>"+dpensumtd.fk_idpensum+"</td>"


//           +"<td>" 
//             +"<button  type='button' id='btnDeliminarDpensum' onClick='alertaeliminarDpensum("+Dpensumtd.idDpensum+");' class='btn btn-danger'>"
//                   +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
//             +"</button>" 
//           +"</td>"
//           +"<td>" 
//             +"<button data-toggle='modal' data-target='#Modal_DPensum' type='button' id='btnupdateDpensum' onClick='editarDpensum("+parametro+");'  class='btn btn-default'>"
//               +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
//                //   
//             +"</button>" 
//           +"</td>"
//         +"</tr>";
//         $(newRow).appendTo("#bodytDpensum");
//         });
//       }
//     }
//   });
  
// }

function  selectDcurso(){
  $("#Dpensum_idcurso").children().remove();
    var newRow =  "<option value=''>Elija un curso</option>";
    $(newRow).appendTo("#Dpensum_idcurso");
  $.ajax({
    type: "post",
    url: "php/modalPensumCurso.php", //pagina a donde se envian los datos
    dataType:"json",
    success: function(result){
        
      $("#Dpensum_idcurso").children().remove();
        var newRow =  "<option value=''>Elija un curso</option>";
          $(newRow).appendTo("#Dpensum_idcurso");
          // alert(idpensum);
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});

        
      }
      else{
        $("#Dpensum_idcurso").children().remove();
        var newRow =  "<option value=''>Elija un curso</option>";
          $(newRow).appendTo("#Dpensum_idcurso");
        
        $.each(result, function(i,curso){ // iteraciones para desplegar cada fila de la tabla usuarios
           newRow =   "<option  value="+curso.idcurso+">"+curso.nombreCurso+"</option>";
          $(newRow).appendTo("#Dpensum_idcurso");
        });
      }
      
      
    }
  });
}


function selectcicloDpensum(){  // lo llamamos con click al input pensum del modal el codigo esta dentro de la etiqueta
 $("#Dpensum_idciclo").children().remove(); // limpiamos el select del ciclo
 var newRow =  "<option value=''>Elija un Ciclo</option>";
 $(newRow).appendTo("#Dpensum_idciclo");
 var idpensum = $("#Dpensum_idciclo").val();
 $.ajax({
   type: "post",
   url: "php/modalPensumCiclo.php", //pagina a donde se envian los datos
   data: "idpensum="+idpensum, // datos an enviar por el metodo post
   dataType:"json",
   success: function(result){
        
     $("#Dpensum_idciclo").children().remove();
       var newRow =  "<option value=''>Elija un Ciclo</option>";
         $(newRow).appendTo("#Dpensum_idciclo");
         // alert(idpensum);
     if(result.errorSelect==true){
       bootbox.alert({title: result.r1, message: result.r2});

        
     }
     else{
       $("#Dpensum_idciclo").children().remove();
       var newRow =  "<option value=''>Elija un Ciclo</option>";
         $(newRow).appendTo("#Dpensum_idciclo");
        
       $.each(result, function(i,ciclo){ // iteraciones para desplegar cada fila de la tabla usuarios
          newRow =   "<option  value="+ciclo.idciclo+">"+ciclo.nombreCiclo+"</option>";
         $(newRow).appendTo("#Dpensum_idciclo");
       });
     }
      
      
   }
 });
  

}

function selectpensumDprogramacion(){
 $.ajax({
   type: "post",
   url: "php/modalPensumPensum.php", //pagina a donde se envian los datos
   dataType:"json",
   success: function(result){
     if(result.errorSelect==true){
       bootbox.alert({title: result.r1, message: result.r2});
     }
     else{
       $("#pensum_idpensum").children().remove();
       newRow =  "<option value=''>Elija un Pensum</option>";
         $(newRow).appendTo("#pensum_idpensum");
        
       $.each(result, function(i,pensum){ // iteraciones para desplegar cada fila de la tabla usuarios
         newRow =  "<option  value="+pensum.idpensum +">"+pensum.anioPensum+"</option>";
         $(newRow).appendTo("#pensum_idpensum");
       });
     }
      
      
   }
 });
  
}



// function editarprogramacion(parametro){
//   loadmodalformpensum();
//   document.getElementById('btnaddprogramacion').style.display = 'none';
//   document.getElementById('btnupdateprogramacion').style.display = 'inline';
  
//   $("#programacion_idprogramacion").attr('value',parametro.idencabezadoProg);

//     $('#selectaniopensum option:first-child').prop("value",parametro.fk_idpensum);
//   $('#selectaniopensum option:first-child').prop("text",parametro.anioPensum);

//   $('#selectciclopensumform option:first-child').prop("value",parametro.fk_idciclo);
//   $('#selectciclopensumform option:first-child').prop("text",parametro.nombreCiclo);

//   $('#selectseccionpensumform option:first-child').prop("value",parametro.fk_idSecciones);
//   $('#selectseccionpensumform option:first-child').prop("text",parametro.NombreSeccion);

//   Modal_Programacion

//  }


function loadmodalformDpensum(){
 document.getElementById('btnupdateDpensum').style.display = 'none';
 document.getElementById('btnaddDpensum').style.display = 'inline';
  
  $("#pensum_idpensum").children().remove();
    var newRow =  "<option value=''>Elija un Pensum</option>";
    $(newRow).appendTo("#pensum_idpensum");

  $("#Dpensum_idciclo").children().remove(); // limpiamos el select del ciclo
  var newRow =  "<option value=''>Elija un Ciclo</option>";
  $(newRow).appendTo("#Dpensum_idciclo");

  $("#Dpensum_idcurso").children().remove();
    var newRow =  "<option value=''>Elija un curso</option>";
    $(newRow).appendTo("#Dpensum_idcurso");

    selectpensumDprogramacion();
    selectDcurso();
    selectcicloDpensum()
    
}


function limpiarcamposformDpensum(){
  $("#Dpensum_idcurso").attr('value',"");
  $("#Dpensum_idciclo").attr('value',"");
  $("#pensum_idpensum").attr('value',"");

}

function alertaeliminarDpensum(val){
  
  $('#Modal_DPensumELIMINAR').modal('show');  // mostrar el modal
  $("#btnModalELIMINARDpensum").attr('value',val);
}

function eliminarDpensum(val){
  document.getElementById("btnModalELIMINARDpensum").disabled=true;
  $.ajax({
    type: "post",
    url: "php/eliminarDpensum.php",
    data: "iddetallepensum="+val,
    dataType:"json",
    success: function(result){
      document.getElementById("btnModalELIMINARDpensum").disabled=false;
      $("#bodytDpensum").children().remove();
      $('#Modal_DPensumELIMINAR').modal('hide'); // ocultar el modal
      mostrartablaDpensum();
      bootbox.alert({title: result.r1, message: result.r2});
    }
  });
}
function editarDpensum(dpensumtd){
  limpiarcamposformDpensum();
  document.getElementById('btnaddDpensum').style.display = 'none'; // esconde boton agregar usuario
  document.getElementById('btnupdateDpensum').style.display = 'inline';  // muestra boton insertar usuario
  $("#Dpensum_IdDpensum").attr('value',dpensumtd.iddetallepensum);
  $("#Dpensum_idcurso").attr('value',dpensumtd.fk_idcurso);
  $("#Dpensum_idciclo").attr('value',dpensumtd.fk_idciclo);
  $("#pensum_idpensum").attr('value',dpensumtd.fk_idpensum);

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function mostrartablaDpensum() { // funcion para  mostrar la tabla de usuarios
  // AJAx codigo para desplegar la tabla con todos los usarios
  $.ajax({
    type: "post",
    url: "php/tablaDpensum.php",
    dataType:"json",
    success: function(result){
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
        $("#bodytDpensum").children().remove(); // limpia la tabla
        $.each(result, function(i,dpensumtd){ // iteraciones para desplegar cada fila de la tabla usuarios
        var parametro = JSON.stringify(dpensumtd);
        var newRow =
        "<tr>"
          +"<td>"+dpensumtd.iddetallepensum+"</td>"
          +"<td>"+dpensumtd.fk_idcurso+"</td>"
          +"<td>"+dpensumtd.fk_idciclo+"</td>"
          +"<td>"+dpensumtd.fk_idpensum+"</td>"
          +"<td>" 
            +"<button  type='button' id='btneliminarDpensum' onClick='alertaeliminarDpensum("+dpensumtd.iddetallepensum+");' class='btn btn-danger'>"
                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
            +"</button>" 
          +"</td>"
          +"<td>" 
            +"<button data-toggle='modal' data-target='#Modal_DPensum' type='button' id='btnupdateDpensum' onClick='editarDpensum("+parametro+");'  class='btn btn-default'>"
              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
               //   
            +"</button>" 
          +"</td>"
        +"</tr>";
        $(newRow).appendTo("#bodytDpensum");
        });
      }
    }
  });
  //termina ajax
  return false;  
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente

 
  $('#btnModalELIMINARDpensum').click(function(){ // boton del modal 
      var iddetallepensum = $('#btnModalELIMINARDpensum').val();
      eliminarDpensum(iddetallepensum);

  });  
  $('#btnupdateDpensum').click(function(){ // boton del modal 
    document.getElementById("btnupdateDpensum").disabled=true;
    var iddetallepensum= $("#Dpensum_IdDpensum").val();
    var fk_idcurso = $("#Dpensum_idcurso").val();
    var fk_idciclo = $("#Dpensum_idciclo").val();
    var fk_idpensum = $("#pensum_idpensum").val();

     var dataString = 'fk_idcurso='+ fk_idcurso + '&iddetallepensum='+ iddetallepensum + '&fk_idciclo='+ fk_idciclo + '&fk_idpensum='+ fk_idpensum;
    $.ajax({
      type: "post",
      url: "php/editarDpensum.php", //pagina a donde se envian los datos
      data: dataString, // datos an enviar por el metodo post
      dataType:"json",
      success: function(result){
        document.getElementById("btnupdateDpensum").disabled=false;
        $('#Modal_DPensum').modal('hide');  // esconder el modal
        bootbox.alert({title: result.r1, message: result.r2});
        mostrartablaDpensum();
        limpiarcamposformDpensum();
      }
    });
  });
  $('#btnmodaladdDpensum').click(function(e){ // boton del modal 
      
      limpiarcamposformDpensum();

      document.getElementById('btnupdateDpensum').style.display = 'none'; // boton actializar desaparece dentro del modal 
      document.getElementById('btnaddDpensum').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
  });
  $('#myTab a[href="#pensum"]').click(function(){ // en un click mostrar la pestana usuarios
      mostrartablaDpensum();

  });

  $("#btnaddDpensum").click(function(){
    document.getElementById("btnaddDpensum").disabled=true; // desabilita el boton mientras operamos
    var fk_idcurso = $("#Dpensum_idcurso").val();
    var fk_idciclo = $("#Dpensum_idciclo").val();
    var fk_idpensum = $("#pensum_idpensum").val();
    
    var dataString = 'fk_idcurso='+ fk_idcurso + '&fk_idciclo='+ fk_idciclo + '&fk_idpensum='+ fk_idpensum;
    if(fk_idcurso==''||fk_idciclo==''|| fk_idpensum==''){
      bootbox.alert('Por favor llene los campos requeridos FFFFFFFFFFFFFFfffffff');
      document.getElementById("btnaddDpensum").disabled=false;
    }
    else{
    // AJAX Code To Submit Form.
      $.ajax({
        type: "post",
        url: "php/agregarDpensum.php",
        data: dataString,
        dataType:"json",
        success: function(result){
          var form = document.getElementById("form_Dpensum");
          form.reset(); // limpia de los input
          $('#Modal_DPensum').modal('hide');  // esconder el modal
          mostrartablaDpensum();
          bootbox.alert({title: result.r1,
          message: result.r2});
          document.getElementById("btnaddDpensum").disabled=false; // habilitamos el boton
        }
      });
    }
    
    return false;
  });
});