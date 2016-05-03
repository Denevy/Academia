function limpiarcamposformciclo(){
		 $("#ciclo_nombreciclo").attr('value',"");
	
		}

		function alertaeliminarciclo(val){
		 $('#Modal_CicloELIMINAR').modal('show');  // mostrar el modal
		 $("#btnModalELIMINARciclo").attr('value',val);
		}
					
		function eliminarciclo(val){
			//document.getElementById("btnModalELIMINAcurso").disabled=true;
			$.ajax({
					type: "post",
					url: "php/eliminarciclo.php",
					data: "idciclo="+val,
					dataType:"json",
					success: function(result){
					  document.getElementById("btnModalELIMINARciclo").disabled=false;
					  $("#bodytciclo").children().remove();
					  $('#Modal_CicloELIMINAR').modal('hide'); // ocultar el modal
					  mostrartablaciclo();
					  bootbox.alert({title: result.r1, message: result.r2});
					}
				   });
		}
				
		function editarciclo(ciclotd){
			limpiarcamposformciclo();
			document.getElementById('btnaddciclo').style.display = 'none'; // esconde boton agregar usuario
			document.getElementById('btnupdateciclo').style.display = 'inline';  // muestra boton insertar usuario
			 $("#ciclo_IdCiclo").attr('value',ciclotd.idciclo);
			 $("#ciclo_nombreciclo").attr('value',ciclotd.nombreciclo);	 
		}		

		function mostrartablaciclo(){
			$.ajax({
					type: "post",
					url: "php/tablaciclo.php",
					dataType:"json",
					success: function(result){
					  if(result.errorSelect==true){
						bootbox.alert({title: result.r1, message: result.r2});
					  }
					  else{
						$("#bodytciclo").children().remove(); // limpia la tabla
						$.each(result, function(i,ciclotd){ // iteraciones para desplegar cada fila de la tabla centros
						var parametro = JSON.stringify(ciclotd);
						var newRow =
						"<tr>"
						  +"<td>"+ciclotd.nombreciclo+"</td>"
						   +"<td>" 
						   
							+"<button  type='button' id='btneliminarciclo' onClick='alertaeliminarciclo("+ciclotd.idciclo+");' class='btn btn-danger'>"
								  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
							+"</button>" 
						  +"</td>"
						  +"<td>" 
							+"<button data-toggle='modal' data-target='#Modal_ciclo' type='button' id='btnupdateciclo' onClick='editarciclo("+parametro+");'  class='btn btn-default'>"
							  +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
							   //   
							+"</button>" 
						  +"</td>"
					   +"</tr>";
						$(newRow).appendTo("#bodytciclo");
						});
					  }
					}
				  });
				  //termina ajax
				  return false;  
				}
				
				
				
				
				
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
				  
				  $('#btnModalELIMINARciclo').click(function(){ // boton del modal 
					  var id = $('#btnModalELIMINARciclo').val();
					  eliminarciclo(id);
					  // var form = document.getElementById("form_usuario");
					  // form.reset(); // limpia de los input
					  //$("#btnaddusuario").style.display = 'inline';
					 // document.getElementById('btnupdatecurso').style.display = 'none'; // boton actializar desaparece dentro del modal 
					 // document.getElementById('btnaddcurso').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
				  });  
				  
				  
				   $('#btnupdateciclo').click(function(){ // boton del modal 
					document.getElementById("btnupdateciclo").disabled=true;
					var idciclo= $("#ciclo_IdCiclo").val();
					var nombreciclo = $("#ciclo_nombreciclo").val();
					// $('#Modal_Usuario').modal('show');  // esconder el modal
					 var dataString = 'nombreciclo='+nombreciclo+ '&idcicl='+ idciclo;
					$.ajax({
					  type: "post",
					  url: "php/editarciclo.php", //pagina a donde se envian los datos
					  data: dataString, // datos an enviar por el metodo post
					  dataType:"json",	
					  success: function(result){
						document.getElementById("btnupdateciclo").disabled=false;  
						$('#Modal_ciclo').modal('hide');  // esconder el modal
						bootbox.alert({title: result.r1, message: result.r2});
						mostrartablaciclo();
						limpiarcamposformciclo();
					  }
					});
				  });
						  
				  
				  $('#btnmodaladdciclo').click(function(){ // boton del modal 
					  limpiarcamposformciclo();
					  // var form = document.getElementById("form_usuario");
					  // form.reset(); // limpia de los input
					  //$("#btnaddusuario").style.display = 'inline';
					  document.getElementById('btnupdateciclo').style.display = 'none'; // boton actializar desaparece dentro del modal 
					  document.getElementById('btnaddciclo').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
				  });
						
				   
					  
				  $('#myTab a[href="#ciclo"]').click(function(){ // en un click mostrar la pestana centroU
				  mostrartablaciclo();
				  });	     
				  
				  $("#btnaddciclo").click(function(){
				       document.getElementById("btnaddciclo").disabled=true; // desabilita el boton mientras operamos
						//<?php $_SESSION['tab']= "ciclo"; ?> //bandera entro a la pestana usuario
						var nombreciclo = $("#ciclo_nombreciclo").val();
						// Returns successful data submission message when the entered information is stored in database.
							var dataString = 'nombreciclo='+ nombreciclo;
							if(nombreciclo==''){
							bootbox.alert('Por favor llene los campos requeridos');
							document.getElementById("btnaddciclo").disabled=false; // desabilita el boton mientras operamos

							}
							else{
							// AJAX Code To Submit Form.
							$.ajax({
							type: "post",
							url: "php/agregarciclo.php",
							data: dataString,
							dataType:"json",
								success: function(result){
								  var form = document.getElementById("form_ciclo");
								  form.reset(); // limpia de los input
								  $('#Modal_ciclo').modal('hide');  // esconder el modal
								  mostrartablaciclo();
								  bootbox.alert({title: result.r1,
								  message: result.r2});
								  document.getElementById("btnaddciclo").disabled=false;
										}
									});

									}
						return false;
				}); 
				});