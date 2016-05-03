function limpiarcamposformcentro(){
 $("#centro_codigocentro").attr('value',"");
 $("#centro_nombrecentro").attr('value',"");
}

function alertaeliminarcentro(val){
 $('#Modal_CentroELIMINAR').modal('show');  // mostrar el modal
 $("#btnModalELIMINARcentro").attr('value',val);
}
	      	
function eliminarcentro(val){
    $.ajax({
            type: "post",
            url: "php/eliminarcentrou.php",
            data: "idcentro="+val,
            dataType:"json",
            success: function(result){
			  document.getElementById("btnModalELIMINARcentro").disabled=false;
              $("#bodytcentrou").children().remove();
              $('#Modal_CentroELIMINAR').modal('hide'); // ocultar el modal
              mostrartablacentros();
              bootbox.alert({title: result.r1, message: result.r2});
            }
           });
}
		
function editarcentro(centrotd){
    document.getElementById('btnaddcentro').style.display = 'none'; // esconde boton agregar usuario
    document.getElementById('btnupdatecentro').style.display = 'inline';  // muestra boton insertar usuario
    limpiarcamposformcentro();
     $("#centro_IdCentro").attr('value',centrotd.idcentrou);
     $("#centro_codigocentro").attr('value',centrotd.codigocentrou);
     $("#centro_nombrecentro").attr('value',centrotd.nombrecentrou);
}		

function mostrartablacentros(){
    $.ajax({
            type: "post",
            url: "php/tablacentrou.php",
            dataType:"json",
            success: function(result){
              if(result.errorSelect==true){
                bootbox.alert({title: result.r1, message: result.r2});
              }
              else{
                $("#bodytcentrou").children().remove(); // limpia la tabla
                $.each(result, function(i,centrotd){ // iteraciones para desplegar cada fila de la tabla centros
                var parametro = JSON.stringify(centrotd);
                var newRow =
                "<tr>"
                  +"<td>"+centrotd.codigocentrou+"</td>"
                  +"<td>"+centrotd.nombrecentrou+"</td>"
				  
				   +"<td>" 
				   
                    +"<button  type='button' id='btneliminarcentro' onClick='alertaeliminarcentro("+centrotd.idcentrou+");' class='btn btn-danger'>"
                          +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
                    +"</button>" 
                  +"</td>"
                  +"<td>" 
                    +"<button data-toggle='modal' data-target='#Modal_centro' type='button' id='btnupdatecentro' onClick='editarcentro("+parametro+");'  class='btn btn-default'>"
                      +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
                       //   
                    +"</button>" 
                  +"</td>"
               +"</tr>";
                $(newRow).appendTo("#bodytcentrou");
                });
              }
            }
          });
          //termina ajax
          return false;  
        }		
		
        $(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
		  
		  $('#btnModalELIMINARcentro').click(function(){ // boton del modal 
              var id = $('#btnModalELIMINARcentro').val();
              eliminarcentro(id);
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
             // document.getElementById('btnupdatecentro').style.display = 'none'; // boton actializar desaparece dentro del modal 
             // document.getElementById('btnaddcentro').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
        });  
		  
          
		   $('#btnupdatecentro').click(function(){ // boton del modal 
			document.getElementById("btnupdatecentro").disabled=true;
			var id= $("#centro_IdCentro").val();
			var codigo= $("#centro_codigocentro").val();
            var nombre = $("#centro_nombrecentro").val();
            // $('#Modal_Usuario').modal('show');  // esconder el modal
             var dataString = 'codigo='+codigo+ '&id='+ id + '&nombre='+nombre;
            $.ajax({
              type: "post",
              url: "php/editarcentrou.php", //pagina a donde se envian los datos
              data: dataString, // datos an enviar por el metodo post
              dataType:"json",	
              success: function(result){
                document.getElementById("btnupdatecentro").disabled=false;
				$('#Modal_centro').modal('hide');  // esconder el modal
                bootbox.alert({title: result.r1, message: result.r2});
                mostrartablacentros();
				limpiarcamposformcentro();
              }
            });
          });
		  		  
		  
		  $('#btnmodaladdcentro').click(function(){ // boton del modal 
              limpiarcamposformcentro();
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              document.getElementById('btnupdatecentro').style.display = 'none'; // boton actializar desaparece dentro del modal 
              document.getElementById('btnaddcentro').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });
		        
		   
			  
		  $('#myTab a[href="#centroU"]').click(function(){ // en un click mostrar la pestana centroU
		  mostrartablacentros();
		  });	     
		  
		  $("#btnaddcentro").click(function(){
		    document.getElementById("btnaddcentro").disabled=true; // desabilita el boton mientras operamos
           // <?php $_SESSION['tab']= "centroU"; ?> //bandera entro a la pestana usuario
            var codigocentro = $("#centro_codigocentro").val();
            var nombrecentro = $("#centro_nombrecentro").val();
            // Returns successful data submission message when the entered information is stored in database.
				var dataString = 'codigocentro='+ codigocentro + '&nombrecentro='+ nombrecentro;
				if(codigocentro==''||nombrecentro==''){
				bootbox.alert('Por favor llene los campos requeridos');
				document.getElementById("btnaddcentro").disabled=false;
				}
				else{
				// AJAX Code To Submit Form.
				$.ajax({
                type: "post",
                url: "php/agregarcentrou.php",
                data: dataString,
                dataType:"json",
					success: function(result){
					  var form = document.getElementById("form_centro");
					  form.reset(); // limpia de los input
					  $('#Modal_centro').modal('hide');  // esconder el modal
					  mostrartablacentros();
					  bootbox.alert({title: result.r1,
					  message: result.r2});
					  document.getElementById("btnaddcentro").disabled=false;

					}
				});

				}
				return false;
		}); 
        });	
