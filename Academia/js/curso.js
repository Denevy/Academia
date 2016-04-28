function limpiarcamposformcurso(){
		 $("#curso_codigocurso").attr('value',"");
		 $("#curso_nombrecurso").attr('value',"");
		 $("#curso_labcurso").attr('value',"");
		}

		function alertaeliminarcurso(val){
		 $('#Modal_CursoELIMINAR').modal('show');  // mostrar el modal
		 $("#btnModalELIMINARcurso").attr('value',val);
		}
					
		function eliminarcurso(val){
			//document.getElementById("btnModalELIMINAcurso").disabled=true;
			$.ajax({
					type: "post",
					url: "php/eliminarcurso.php",
					data: "idcurso="+val,
					dataType:"json",
					success: function(result){
						document.getElementById("btnModalELIMINARcurso").disabled=false;
					  $("#bodytcurso").children().remove();
					  $('#Modal_CursoELIMINAR').modal('hide'); // ocultar el modal
					  mostrartablacurso();
					  bootbox.alert({title: result.r1, message: result.r2});
					}
				   });
		}
				
		function editarcurso(cursotd){
			limpiarcamposformcurso();
			document.getElementById('btnaddcurso').style.display = 'none'; // esconde boton agregar usuario
			document.getElementById('btnupdatecurso').style.display = 'inline';  // muestra boton insertar usuario
			 $("#curso_IdCurso").attr('value',cursotd.idcurso);
			 $("#curso_codigocurso").attr('value',cursotd.codigocurso);
			 $("#curso_nombrecurso").attr('value',cursotd.nombrecurso);
			 $("#curso_labcurso").attr('value',cursotd.labcurso1);
		}		

		function mostrartablacurso(){
			$.ajax({
					type: "post",
					url: "php/tablacurso.php",
					dataType:"json",
					success: function(result){
					  if(result.errorSelect==true){
						bootbox.alert({title: result.r1, message: result.r2});
					  }
					  else{
						$("#bodytcurso").children().remove(); // limpia la tabla
						$.each(result, function(i,cursotd){ // iteraciones para desplegar cada fila de la tabla centros
						var parametro = JSON.stringify(cursotd);
						var newRow =
						"<tr>"
						  +"<td>"+cursotd.codigocurso+"</td>"
						  +"<td>"+cursotd.nombrecurso+"</td>"
						  +"<td>"+cursotd.labcurso1+"</td>"
						   +"<td>" 
						   
							+"<button  type='button' id='btneliminarcurso' onClick='alertaeliminarcurso("+cursotd.idcurso+");' class='btn btn-danger'>"
								  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
							+"</button>" 
						  +"</td>"
						  +"<td>" 
							+"<button data-toggle='modal' data-target='#Modal_curso' type='button' id='btnupdatecurso' onClick='editarcurso("+parametro+");'  class='btn btn-default'>"
							  +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
							   //   
							+"</button>" 
						  +"</td>"
					   +"</tr>";
						$(newRow).appendTo("#bodytcurso");
						});
					  }
					}
				  });
				  //termina ajax
				  return false;  
				}
				
				
				
				
				
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
				  
				  $('#btnModalELIMINARcurso').click(function(){ // boton del modal 
					  var id = $('#btnModalELIMINARcurso').val();
					  eliminarcurso(id);
					  // var form = document.getElementById("form_usuario");
					  // form.reset(); // limpia de los input
					  //$("#btnaddusuario").style.display = 'inline';
					 // document.getElementById('btnupdatecurso').style.display = 'none'; // boton actializar desaparece dentro del modal 
					 // document.getElementById('btnaddcurso').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
				  });  
				  
				  
				   $('#btnupdatecurso').click(function(){ // boton del modal 
					document.getElementById("btnupdatecurso").disabled=true;
					var idcurso= $("#curso_IdCurso").val();
					var codigocurso= $("#curso_codigocurso").val();
					var nombrecurso = $("#curso_nombrecurso").val();
					var labcurso = $("#curso_labcurso").val();
					// $('#Modal_Usuario').modal('show');  // esconder el modal
					 var dataString = 'codigo='+codigocurso+ '&idcu='+ idcurso + '&nombre='+ nombrecurso + '&labo=' +labcurso;
					$.ajax({
					  type: "post",
					  url: "php/editarcurso.php", //pagina a donde se envian los datos
					  data: dataString, // datos an enviar por el metodo post
					  dataType:"json",	
					  success: function(result){
						document.getElementById("btnupdatecurso").disabled=false;  
						$('#Modal_curso').modal('hide');  // esconder el modal
						bootbox.alert({title: result.r1, message: result.r2});
						mostrartablacurso();
						limpiarcamposformcurso();
					  }
					});
				  });
						  
				  
				  $('#btnmodaladdcurso').click(function(){ // boton del modal 
					  limpiarcamposformcurso();
					  // var form = document.getElementById("form_usuario");
					  // form.reset(); // limpia de los input
					  //$("#btnaddusuario").style.display = 'inline';
					  document.getElementById('btnupdatecurso').style.display = 'none'; // boton actializar desaparece dentro del modal 
					  document.getElementById('btnaddcurso').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
				  });
						
				   
					  
				  $('#myTab a[href="#curso"]').click(function(){ // en un click mostrar la pestana centroU
				  mostrartablacurso();
				  });	     
				  
				  $("#btnaddcurso").click(function(){
				       document.getElementById("btnaddcurso").disabled=true; // desabilita el boton mientras operamos
						//<?php $_SESSION['tab']= "curso"; ?> //bandera entro a la pestana usuario
						var codigocurso = $("#curso_codigocurso").val();
						var nombrecurso = $("#curso_nombrecurso").val();
						var laboracurso = $("#curso_labcurso").val();
						// Returns successful data submission message when the entered information is stored in database.
							var dataString = 'codigocurso='+ codigocurso + '&nombrecurso='+ nombrecurso + '&laboracurso='+ laboracurso;
							if(codigocurso==''||nombrecurso==''||laboracurso==''){
							bootbox.alert('Por favor llene los campos requeridos');
							document.getElementById("btnaddcurso").disabled=false; // desabilita el boton mientras operamos

							}
							else{
							// AJAX Code To Submit Form.
							$.ajax({
							type: "post",
							url: "php/agregarcurso.php",
							data: dataString,
							dataType:"json",
								success: function(result){
								  var form = document.getElementById("form_curso");
								  form.reset(); // limpia de los input
								  $('#Modal_curso').modal('hide');  // esconder el modal
								  mostrartablacurso();
								  bootbox.alert({title: result.r1,
								  message: result.r2});
								  document.getElementById("btnaddcurso").disabled=false;
										}
									});

									}
						return false;
				}); 
				});