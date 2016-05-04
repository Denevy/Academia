 function limpiarcamposformalumno(){ 
          $("#usuario_carnetusuario").attr('value',""); 
          $("#usuario_nombreusuario").attr('value',"");
          $("#usuario_profesionusuario").attr('value',"");
          $("#usuario_telefonousuario").attr('value',"");
          $("#usuario_correousuario").attr('value',"");
          $("input[name=usuario_nacceso]").attr('checked',false);
          $("input[name=usuario_estado]").attr('checked',false);
      
      }

    function alertaeliminarusuario(val){
          $('#Modal_UsuarioEliminar').modal('show');  // mostrar el modal
          $("#btnModalELIMINARusuario").attr('value',val);
      
        }
     
    function eliminarusuario(val){
       // $('#Modal_UsuarioEliminar').modal('show');  // mostrar el modal 
    //  $('#Modal_UsuarioEliminar').modal('hide'); // ocultar el modal
      // alert(val);
      $.ajax({
        type: "post",
        url: "php/eliminarusuario.php",
        data: "idusuario="+val,
        dataType:"json",
        success: function(result){
         document.getElementById("btnModalELIMINARusuario").disabled=false;
		 $("#bodytusuario").children().remove();
         $('#Modal_UsuarioELIMINAR').modal('hide');
          mostrartablausuario();
          bootbox.alert({title: result.r1, message: result.r2});
        }
      });
    }

    function editarusuario(usuariotd){
          limpiarcamposformusuario(); 
          document.getElementById('btnaddusuario').style.display = 'none'; // esconde boton agregar usuario
          document.getElementById('btnupdateusuario').style.display = 'inline';  // muestra boton insertar usuario
              
          $("#usuario_IdUsuario").attr('value',usuariotd.idoce);
      $("#usuario_carnetusuario").attr('value',usuariotd.carnetdoce);
      $("#usuario_nombreusuario").attr('value',usuariotd.nombredoce);
      $("#usuario_profesionusuario").attr('value',usuariotd.profesiondoce);
      $("#usuario_telefonousuario").attr('value',usuariotd.telefonodoce);
          $("#usuario_correousuario").attr('value',usuariotd.correodoce);
      $("input[name=usuario_nacceso][value="+usuariotd.restricciondoce+" ]").prop('checked',true);
          $("input[name=usuario_estado][value="+usuariotd.estadodoce+" ]").prop('checked',true);
     
      
       
          // $('#Modal_Usuario').modal('show');  // mostrar el modal
          // alert("nivel acceso=  "+usuariotd.fk_idNivelAcceso);
          // alert("estado=  "+usuariotd.fk_idEstados);  
        }


    
    function mostrartablausuario() 
      { 
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
                $.each(result, function(i,docetd){ // iteraciones para desplegar cada fila de la tabla centros
                var parametro = JSON.stringify(docetd);
                var newRow =
                "<tr>"
                  +"<td>"+docetd.carnetdoce+"</td>"
                  +"<td>"+docetd.nombredoce+"</td>"
                  +"<td>"+docetd.profesiondoce+"</td>"
                  +"<td>"+docetd.telefonodoce+"</td>"
                  +"<td>"+docetd.correodoce+"</td>"
                  +"<td>"+docetd.estadodoce+"</td>"
                  +"<td>"+docetd.restricciondoce+"</td>"
          
                 +"<td>" 
           
                    +"<button  type='button' id='btneliminardoc' onClick='alertaeliminarusuario("+docetd.idoce+");' class='btn btn-danger'>"
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
      
       $('#btnModalELIMINARusuario').click(function(){ // boton del modal 
              var id = $('#btnModalELIMINARusuario').val();
              eliminarusuario(id);
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              //document.getElementById('btnupdateusuario').style.display = 'none'; // boton actializar desaparece dentro del modal 
              //document.getElementById('btnaddusuario').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });
      
      
      $('#btnupdateusuario').click(function(){ // boton del modal 
      document.getElementById("btnupdateusuario").disabled=true;
	  var id= $("#usuario_IdUsuario").val();
      var carnet= $("#usuario_carnetusuario").val();
      var nombre= $("#usuario_nombreusuario").val();
      var profesion= $("#usuario_profesionusuario").val();
      var telefono= $("#usuario_telefonousuario").val();
      var correo= $("#usuario_correousuario").val();
      var acceso= $("input[name=usuario_nacceso]:checked").val();
      var estado= $("input[name=usuario_estado]:checked").val();
      
            // $('#Modal_Usuario').modal('show');  // esconder el modal
             var dataString = 'carnet='+carnet+ '&id='+ id + '&nombre='+ nombre + '&profesion='+ profesion + '&telefono='+ telefono + '&correo='+ correo + '&acceso='+ acceso + '&estado='+ estado;
            $.ajax({
              type: "post",
              url: "php/editarusuario.php", //pagina a donde se envian los datos
              data: dataString, // datos an enviar por el metodo post
              dataType:"json",  
              success: function(result){
                document.getElementById("btnupdateusuario").disabled=false;
				$('#Modal_Usuario').modal('hide');  // esconder el modal
                bootbox.alert({title: result.r1, message: result.r2});
                mostrartablausuario();
				limpiarcamposformusuario();
              }
            });
          });
      
      
       $('#btnmodaladdusuario').click(function(){ // boton del modal 
              limpiarcamposformusuario();
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              document.getElementById('btnupdateusuario').style.display = 'none'; // boton actializar desaparece dentro del modal 
              document.getElementById('btnaddusuario').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });
      
      $('#myTab a[href="#usuario"]').click(function(){ // en un click mostrar la pestana centroU
      mostrartablausuario();
      });
      
      
       $("#btnaddusuario").click(function(){
            document.getElementById("btnaddusuario").disabled=true; // desabilita el boton mientras operamos
            //<?php $_SESSION['tab']= "usuario"; ?> //bandera entro a la pestana usuario
            var carnet = $("#usuario_carnetusuario").val();
            var nombre = $("#usuario_nombreusuario").val();
            var profesion = $("#usuario_profesionusuario").val();
            var telefono = $("#usuario_telefonousuario").val();
            var correo = $("#usuario_correousuario").val();
            var nacceso = $("input[name=usuario_nacceso]:checked").val();
            var estado = $("input[name=usuario_estado]:checked").val();
            var dataString = 'carnet='+ carnet + '&nombre='+ nombre + '&profesion='+ profesion + '&telefono='+ telefono +  '&correo='+ correo + '&nacceso='+ nacceso + '&estado='+ estado ;
            if(carnet==''||nombre==''|| profesion==''|| telefono=='' || correo=='' || nacceso=='' || estado==''){
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
                  mostrartablausuario();
                  bootbox.alert({title: result.r1,
                  message: result.r2});
                  document.getElementById("btnaddusuario").disabled=false; // habilitamos el boton
                }
              });
            }
            return false;
          });
        });