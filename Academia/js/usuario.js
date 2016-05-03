function buscarusuario(){
  var busc1 = $('#usuariobuscar1').val();
  var busc2 = $('#usuariobuscar2').val();
  var dataString = 'buscar1='+ busc1 + '&buscar2='+ busc2;
  $.ajax({
    type: "post",
    url: "php/buscarusuario.php",
    data: dataString,
    dataType:"json",
    success: function(result){
      $("#bodytusuario").children().remove();
      if(result.errorSelect==true){
        mostrartablausuarios();
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
        $("#bodytusuario").children().remove(); // limpia la tabla
        $.each(result, function(i,usuariotd){ // iteraciones para desplegar cada fila de la tabla usuarios
        var parametro = JSON.stringify(usuariotd);
        var newRow =
        "<tr>"
          +"<td>"+usuariotd.NombreCompleto+"</td>"
          +"<td>"+usuariotd.contrasenia+"</td>"
          +"<td>"+usuariotd.privilegio+"</td>"
          +"<td>"+usuariotd.Usuario+"</td>"
          +"<td>"+usuariotd.NombreEstado+"</td>"
          +"<td>"+usuariotd.nombreCarrera+"</td>"
          +"<td>"+usuariotd.nombreCentroU+"</td>"
          +"<td>" 
            +"<button  type='button' id='btneliminarusuario' onClick='alertaeliminarusuario("+usuariotd.idusuario+");' class='btn btn-danger'>"
                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
            +"</button>" 
          +"</td>"
          +"<td>" 
            +"<button data-toggle='modal' data-target='#Modal_Usuario' type='button' id='btnupdateusuario' onClick='editarusuario("+parametro+");'  class='btn btn-default'>"
              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
               //   
            +"</button>" 
          +"</td>"
        +"</tr>";
        $(newRow).appendTo("#bodytusuario");
        });
      }
    }
  });
  
}
function limpiarcamposformusuario(){
  $("#usuario_usuario").attr('value',"");
  $("#usuario_contrasenia").attr('value',"");
  $("#usuario_nombre").attr('value',"");
  $("input[name=usuario_nacceso]").prop('checked',false);
  $("input[name=usuario_estado]").prop('checked',false);
}
function alertaeliminarusuario(val){
  
  $('#Modal_UsuarioELIMINAR').modal('show');  // mostrar el modal
  $("#btnModalELIMINARusuario").attr('value',val);
}
function eliminarusuario(val){
  document.getElementById("btnModalELIMINARusuario").disabled=true;
  $.ajax({
    type: "post",
    url: "php/eliminarusuario.php",
    data: "idusuario="+val,
    dataType:"json",
    success: function(result){
      document.getElementreentById("btnModalELIMINARusuario").disabled=false;
      $("#bodytusuario").children().remove();
      $('#Modal_UsuarioELIMINAR').modal('hide'); // ocultar el modal
      mostrartablausuarios();
      bootbox.alert({title: result.r1, message: result.r2});
    }
  });
}
function editarusuario(usuariotd){
  limpiarcamposformusuario();
  document.getElementById('btnaddusuario').style.display = 'none'; // esconde boton agregar usuario
  document.getElementById('btnupdateusuario').style.display = 'inline';  // muestra boton insertar usuario
  $("#usuario_IdUsuario").attr('value',usuariotd.idusuario);
  $("#usuario_usuario").attr('value',usuariotd.Usuario);
  $("#usuario_nombre").attr('value',usuariotd.NombreCompleto);
  $("#usuario_contrasenia").attr('value',usuariotd.contrasenia);
  $("input[name=usuario_nacceso][value="+usuariotd.fk_idNivelAcceso+" ]").prop('checked',true);
  $("input[name=usuario_estado][value="+usuariotd.fk_idEstados+" ]").prop('checked',true);
  // $('#Modal_Usuario').modal('show');  // mostrar el modal
  // alert("nivel acceso=  "+usuariotd.fk_idNivelAcceso);
  // alert("estado=  "+usuariotd.fk_idEstados);
  
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function mostrartablausuarios() { // funcion para  mostrar la tabla de usuarios
  // AJAx codigo para desplegar la tabla con todos los usarios
  $.ajax({
    type: "post",
    url: "php/tablausuario.php",
    dataType:"json",
    success: function(result){
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
        $("#bodytusuario").children().remove(); // limpia la tabla
        $.each(result, function(i,usuariotd){ // iteraciones para desplegar cada fila de la tabla usuarios
        var parametro = JSON.stringify(usuariotd);
        var newRow =
        "<tr>"
          +"<td>"+usuariotd.NombreCompleto+"</td>"
          +"<td>"+usuariotd.contrasenia+"</td>"
          +"<td>"+usuariotd.privilegio+"</td>"
          +"<td>"+usuariotd.Usuario+"</td>"
          +"<td>"+usuariotd.NombreEstado+"</td>"
          +"<td>"+usuariotd.nombreCarrera+"</td>"
          +"<td>"+usuariotd.nombreCentroU+"</td>"
          +"<td>" 
            +"<button  type='button' id='btneliminarusuario' onClick='alertaeliminarusuario("+usuariotd.idusuario+");' class='btn btn-danger'>"
                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
            +"</button>" 
          +"</td>"
          +"<td>" 
            +"<button data-toggle='modal' data-target='#Modal_Usuario' type='button' id='btnupdateusuario' onClick='editarusuario("+parametro+");'  class='btn btn-default'>"
              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
               //   
            +"</button>" 
          +"</td>"
        +"</tr>";
        $(newRow).appendTo("#bodytusuario");
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
  //   alert(idusuario);
  // });

 
  $('#btnModalELIMINARusuario').click(function(){ // boton del modal 
      var id = $('#btnModalELIMINARusuario').val();
      eliminarusuario(id);
      // var form = document.getElementById("form_usuario");
      // form.reset(); // limpia de los input
      //$("#btnaddusuario").style.display = 'inline';
      // document.getElementById('btnupdateusuario').style.display = 'none'; // boton actializar desaparece dentro del modal 
      // document.getElementById('btnaddusuario').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
  });  
  $('#btnupdateusuario').click(function(){ // boton del modal 
    document.getElementById("btnupdateusuario").disabled=true;
    var id= $("#usuario_IdUsuario").val();
    var user = $("#usuario_usuario").val();
    var nombre = $("#usuario_nombre").val();
    var contrasenia = $("#usuario_contrasenia").val();
    var nacceso = $("input[name=usuario_nacceso]:checked").val();
    var estado = $("input[name=usuario_estado]:checked").val();
    // $('#Modal_Usuario').modal('show');  // esconder el modal
     var dataString = 'user='+ user + '&id='+ id + '&nombre='+ nombre + '&contrasenia='+ contrasenia + '&estado='+ estado + '&nacceso='+ nacceso ;
     limpiarcamposformusuario();
    $.ajax({
      type: "post",
      async:false,
       cache:false,
      url: "php/editarusuario.php", //pagina a donde se envian los datos
      data: dataString, // datos an enviar por el metodo post
      dataType:"json",
      success: function(result){
        document.getElementById("btnupdateusuario").disabled=false;
        $('#Modal_Usuario').modal('hide');  // esconder el modal
        bootbox.alert({title: result.r1, message: result.r2});
        mostrartablausuarios();
        
      }
    });
  });
  $('#btnmodaladdusuario').click(function(e){ // boton del modal 
      
      limpiarcamposformusuario();
     
      // var form = document.getElementById("form_usuario");
      // form.reset(); // limpia de los input
      //$("#btnaddusuario").style.display = 'inline';
      document.getElementById('btnupdateusuario').style.display = 'none'; // boton actializar desaparece dentro del modal 
      document.getElementById('btnaddusuario').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
  });
  $('#myTab a[href="#usuario"]').click(function(){ // en un click mostrar la pestana usuarios
      mostrartablausuarios();

  });
  // $("#btneliminarusuario").click(function(e){ // en un click mostrar la tabla usuarios
  //     e.preventDefault();
  //     bootbox.alert('Por favor llene los campos requeridos');
  // });
  $("#btnaddusuario").click(function(){
    document.getElementById("btnaddusuario").disabled=true; // desabilita el boton mientras operamos
    var user = $("#usuario_usuario").val();
    var nombre = $("#usuario_nombre").val();
    var contrasenia = $("#usuario_contrasenia").val();
    var nacceso = $("input[name=usuario_nacceso]:checked").val();
    var estado = $("input[name=usuario_estado]:checked").val();
    var dataString = 'user='+ user + '&nombre='+ nombre + '&contrasenia='+ contrasenia + '&estado='+ estado + '&nacceso='+ nacceso ;
    if(user==''||nombre==''|| contrasenia==''||estado==null||nacceso==null){
      bootbox.alert('Por favor llene los campos requeridos');
      document.getElementById("btnaddusuario").disabled=false;
    }
    else{
    // AJAX Code To Submit Form.
      $.ajax({
        type: "post",
        url: "php/agregarusuario.php",
        data: dataString,
        dataType:"json",
        success: function(result){
          var form = document.getElementById("form_usuario");
          form.reset(); // limpia de los input
          $('#Modal_Usuario').modal('hide');  // esconder el modal
          mostrartablausuarios();
          bootbox.alert({title: result.r1,
          message: result.r2});
          document.getElementById("btnaddusuario").disabled=false; // habilitamos el boton
        }
      });
    }
    
    return false;
  });
});