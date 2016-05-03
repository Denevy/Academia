function limpiarcamposformcarrera(){
		  $("#carrera_codigocarrera").attr('value',"");
          $("#carrera_nombrecarrera").attr('value',"");
          }

		function alertaeliminarcarrera(val1){
          $('#Modal_CarreraELIMINAR').modal('show');  // mostrar el modal
          $("#btnModalELIMINARcarrera").attr('value',val1);
        }
	      	
		function eliminarcarrera(valca){
          $.ajax({
            type: "post",
            url: "php/eliminarcarrera.php",
            data: "idcarr="+valca,
            dataType:"json",
            success: function(result){
              document.getElementById("btnModalELIMINARcarrera").disabled=false;
			  $("#bodytcarrera").children().remove();
              $('#Modal_CarreraELIMINAR').modal('hide'); // ocultar el modal
              mostrartablacarrera();
              bootbox.alert({title: result.r1, message: result.r2});
            }
          });
        }
		
		function editarcarrera(carreratd){
		  limpiarcamposformcarrera(); 
          document.getElementById('btnaddcarrera').style.display = 'none'; // esconde boton agregar usuario
          document.getElementById('btnupdatecarrera').style.display = 'inline';  // muestra boton insertar usuario 	
          $("#carrera_IdCarrera").attr('value',carreratd.idcarrera);
          $("#carrera_codigocarrera").attr('value',carreratd.codigocarrera);
          $("#carrera_nombrecarrera").attr('value',carreratd.nombrecarrera);
          // $('#Modal_Usuario').modal('show');  // mostrar el modal
          // alert("nivel acceso=  "+usuariotd.fk_idNivelAcceso);
          // alert("estado=  "+usuariotd.fk_idEstados);  
        }
		
		
		function mostrartablacarrera(){ // funcion para  mostrar la tabla de centros
          // AJAx codigo para desplegar la tabla con todos los centros
          $.ajax({
            type: "post",
            url: "php/tablacarrera.php",
            dataType:"json",
            success: function(result){
              if(result.errorSelect==true){
                bootbox.alert({title: result.r1, message: result.r2});
              }
              else{
                $("#bodytcarrera").children().remove(); // limpia la tabla
                $.each(result, function(i,carreratd){ // iteraciones para desplegar cada fila de la tabla centros
                var parametro = JSON.stringify(carreratd);
                var newRow =
                "<tr>"
                  +"<td>"+carreratd.codigocarrera+"</td>"
                  +"<td>"+carreratd.nombrecarrera+"</td>"
				  +"<td>"  
                    +"<button  type='button' id='btneliminarcarrera' onClick='alertaeliminarcarrera("+carreratd.idcarrera+");' class='btn btn-danger'>"
                          +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
                    +"</button>" 
                  +"</td>"
                  +"<td>" 
                    +"<button data-toggle='modal' data-target='#Modal_carrera' type='button' id='btnupdatecarrera' onClick='editarcarrera("+parametro+");'  class='btn btn-default'>"
                      +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
                       //   
                    +"</button>" 
                  +"</td>"
               +"</tr>";
                $(newRow).appendTo("#bodytcarrera");
                });
              }
            }
          });
          //termina ajax
          return false;  
        }
		
		
		
		
		
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
		  
		  $('#btnModalELIMINARcarrera').click(function(){ // boton del modal 
              var id = $('#btnModalELIMINARcarrera').val();
              eliminarcarrera(id);
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              //document.getElementById('btnupdatecarrera').style.display = 'none'; // boton actializar desaparece dentro del modal 
              //document.getElementById('btnaddcarrera').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });  
		  
          
		   $('#btnupdatecarrera').click(function(){ // boton del modal 
			document.getElementById("btnupdatecarrera").disabled=true;
			var id= $("#carrera_IdCarrera").val();
			var codigo= $("#carrera_codigocarrera").val();
            var nombre = $("#carrera_nombrecarrera").val();
            // $('#Modal_Usuario').modal('show');  // esconder el modal
             var dataString = 'codigo='+codigo+ '&id='+ id + '&nombre='+nombre;
            $.ajax({
              type: "post",
              url: "php/editarcarrera.php", //pagina a donde se envian los datos
              data: dataString, // datos an enviar por el metodo post
              dataType:"json",	
              success: function(result){
				document.getElementById("btnupdatecarrera").disabled=false;  
                $('#Modal_carrera').modal('hide');  // esconder el modal
                bootbox.alert({title: result.r1, message: result.r2});
                mostrartablacarrera();
				limpiarcamposformcarrera();
              }
            });
          });
		  		  
		  
		  $('#btnmodaladdcarrera').click(function(){ // boton del modal 
              limpiarcamposformcarrera();
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              document.getElementById('btnupdatecarrera').style.display = 'none'; // boton actializar desaparece dentro del modal 
              document.getElementById('btnaddcarrera').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });
		        
		   
		  
		  $('#myTab a[href="#carrera"]').click(function(){ // en un click mostrar la pestana centroU
		  mostrartablacarrera();
		  });
		  
		   
		  $("#btnaddcarrera").click(function(){
		    document.getElementById("btnaddcarrera").disabled=true; // desabilita el boton mientras operamos
            //<?php $_SESSION['tab']= "carrera"; ?> //bandera entro a la pestana usuario
            var codigocarrera = $("#carrera_codigocarrera").val();
            var nombrecarrera = $("#carrera_nombrecarrera").val();
            // Returns successful data submission message when the entered information is stored in database.
				var dataString = 'codigocarrera='+ codigocarrera + '&nombrecarrera='+ nombrecarrera;
				if(codigocarrera==''||nombrecarrera==''){
				bootbox.alert('Por favor llene los campos requeridos');
				document.getElementById("btnaddcarrera").disabled=false; // desabilita el boton mientras operamos

				}
				else{
				// AJAX Code To Submit Form.
				$.ajax({
                type: "post",
                url: "php/agregarcarrera.php",
                data: dataString,
                dataType:"json",
					success: function(result){
					  var form = document.getElementById("form_carrera");
					  form.reset(); // limpia de los input
					  $('#Modal_carrera').modal('hide');  // esconder el modal
					  mostrartablacarrera();
					  bootbox.alert({title: result.r1,
					  message: result.r2});
					  document.getElementById("btnaddcarrera").disabled=false; // habilitamos el boton

					}
				});

				}
				return false;
		}); 
        });