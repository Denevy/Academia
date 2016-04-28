function mostrartablaprogramacion() { // funcion para  mostrar la tabla de usuarios
  // AJAx codigo para desplegar la tabla con todos los usarios
  
  $("#contenedorprogramacion").children().remove(); // limpia la tabla
  
  $.ajax({
    type: "post",
    url: "php/tablaprogramacion.php",
    dataType:"json",
    success: function(result){
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
      }

      else{
      	
		$.each(result, function(i,programacion){ // iteraciones para desplegar cada fila de la tabla usuarios

        var parametro = JSON.stringify(programacion);
        var newbloque =
		"<div class='container' id='bloqueprogramacion'>"
			+'<br>'
			+'<div class="row">'
				+'<div class="col-md-12">'
					+'<div class="panel panel-default">'
						+'<div class="panel-heading">'
							+'<div class="col-md-1 ">'
								+'<button class="btn btn-success" id="desplegarProgramacion" onClick="mostrardetalleprogramacion('+programacion.idencabezadoProg+');" role="button" data-toggle="collapse" href="#collapse'+programacion.idencabezadoProg+'" aria-expanded="false" aria-controls="collapseExample" title="Desplegar Horario">'
							 		+"<span class='glyphicon glyphicon-collapse-down' aria-hidden='true'></span>"
								+'</button>'
							+'</div>'
							+'<div class="col-md-1 ">'
								+"<h4>"+programacion.anioPensum+" </h4>"
							+'</div>'
							
							+'<div class="col-md-2 ">'
								+"<h4>"+programacion.nombreCiclo+" </h4>"
							+'</div>'
							+'<div class="col-md-1 ">'
								+"<h4>"+programacion.NombreSeccion+" </h4>"
							+'</div>'
							+'<div class="col-md-2 col-md-offset-3">'
								+"<h4>"+programacion.fecha+" </h4>"
							+'</div>'
							+'<div class="col-md-1  ">'
								+"<button  type='button' id='btneliminarprogramacion' onClick='alertaeliminarprogramacion("+programacion.idencabezadoProg+");' class='btn btn-danger'>"
			                 		+"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
			            		+"</button>"
							+'</div>'
							+'<div class="col-md-1  ">'
								+"<button data-toggle='modal' data-target='#Modal_Programacion' type='button' id='btnmodalupdateprogramacion' onClick='editarprogramacion("+parametro+");'  class='btn btn-default'>"
			              			+"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
			               		+"</button>" 
							+'</div>'
							+'<br>'
							+'<br>'
						+'</div>'
						+'<div class="panel-body">'
							+'<div class="collapse" id="collapse'+programacion.idencabezadoProg+'">'
								+'<div class="col-md-1 ">'
									+'<button type="button" id="btnmodaladdDetalleprogramacion" onClick="modalHorarioProgramacion('+programacion.idencabezadoProg+');" class="btn btn-primary btn-lg center" data-toggle="modal" data-target="#Modal_detalleprogramacion">'
										+'<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>'
										+' Horario '
									+'</button>'
								+'</div>'
								+'<div class="col-md-3 col-xs-4 col-md-offset-8   ">'
									+'<br>'
									+'<input type="text" class="form-control" placeholder="" onkeyup="buscarDetalleprogramacion('+programacion.idencabezadoProg+',this.value);" id="InputBuscarDetalleProg">'
								+'</div>'
								+'<div class="row" id="bodydivprogramacion'+programacion.idencabezadoProg+'" value='+programacion.idencabezadoProg+'>'

								+'</div>'
							+'</div>'	
						+'</div>'
					+'</div>'
				+'</div>'
			+'</div>'
		+'</div>';		
		$(newbloque).appendTo("#contenedorprogramacion");
		});	
	  }
    }
  });
  //termina ajax
  return false;  
}
function buscarprogramacion(){
	var inputprogramacionbuscar = $('#inputprogramacionbuscar').val();
	var dataString = 'inputprogramacionbuscar='+ inputprogramacionbuscar;
	$.ajax({
    type: "post",
    url: "php/buscarprogramacion.php",
    data: dataString,
    dataType:"json",
    success: function(result){
      $("#bodytusuario").children().remove();
      if(result.errorSelect==true){
        mostrartablausuarios();
        bootbox.alert({title: result.r1, message: result.r2});
      }
      else{
      	$.each(result, function(i,programacion){ // iteraciones para desplegar cada fila de la tabla usuarios
        	var parametro = JSON.stringify(programacion);
	        var newbloque =
				"<div class='container' id='bloqueprogramacion'>"
					+'<br>'
					+'<div class="row">'
						+'<div class="col-md-12">'
							+'<div class="panel panel-default">'
								+'<div class="panel-heading">'
									+'<div class="col-md-1 ">'
										+'<button class="btn btn-success" id="desplegarProgramacion" onClick="mostrardetalleprogramacion('+programacion.idencabezadoProg+');" role="button" data-toggle="collapse" href="#collapse'+programacion.idencabezadoProg+'" aria-expanded="false" aria-controls="collapseExample" title="Desplegar Horario">'
									 		+"<span class='glyphicon glyphicon-collapse-down' aria-hidden='true'></span>"
										+'</button>'
									+'</div>'
									+'<div class="col-md-1 ">'
										+"<h4>"+programacion.anioPensum+" </h4>"
									+'</div>'
									
									+'<div class="col-md-2 ">'
										+"<h4>"+programacion.nombreCiclo+" </h4>"
									+'</div>'
									+'<div class="col-md-1 ">'
										+"<h4>"+programacion.NombreSeccion+" </h4>"
									+'</div>'
									+'<div class="col-md-2 col-md-offset-3">'
										+"<h4>"+programacion.fecha+" </h4>"
									+'</div>'
									+'<div class="col-md-1  ">'
										+" <button  type='button' id='btneliminarprogramacion' onClick='alertaeliminarprogramacion("+programacion.idencabezadoProg+");' class='btn btn-danger'>"
					                 		+"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
					            		+"</button>"
									+'</div>'
									+'<div class="col-md-1  ">'
										+"<button data-toggle='modal' data-target='#Modal_Programacion' type='button' id='btnmodalupdateprogramacion' onClick='editarprogramacion("+parametro+");'  class='btn btn-default'>"
					              			+"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
					               		+"</button>" 
									+'</div>'
									+'<br>'
									+'<br>'
								+'</div>'
								+'<div class="panel-body">'
									+'<div class="collapse" id="collapse'+programacion.idencabezadoProg+'">'
										+'<div class="col-md-1 ">'
											+'<button type="button" id="btnmodaladdDetalleprogramacion" onClick="modalHorarioProgramacion('+programacion.idencabezadoProg+');" class="btn btn-primary btn-lg center" data-toggle="modal" data-target="#Modal_detalleprogramacion">'
												+'<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>'
												+' Horario '
											+'</button>'
										+'</div>'
										+'<div class="col-md-3 col-xs-4 col-md-offset-8   ">'
											+'<br>'
											+'<input type="text" class="form-control" placeholder="" onkeyup="buscarDetalleprogramacion('+programacion.idencabezadoProg+',this.value);" id="InputBuscarDetalleProg">'
										+'</div>'
										+'<div class="row" id="bodydivprogramacion'+programacion.idencabezadoProg+'" value='+programacion.idencabezadoProg+'>'

										+'</div>'
									+'</div>'	
								+'</div>'
							+'</div>'
						+'</div>'
					+'</div>'
				+'</div>';		
			$(newbloque).appendTo("#contenedorprogramacion");
			});	
	  }
    }
  });
}
function alertaeliminarprogramacion(idencabezadoProg){
	
	$('#Modal_ProgramacionELIMINAR').modal('show');  // mostrar el modal
	$("#btnModalELIMINARprogramacion").attr('value',idencabezadoProg);
}


function eliminarprogramacion(id){
  document.getElementById("btnModalELIMINARprogramacion").disabled=true;
  $.ajax({
    type: "post",
    url: "php/eliminarprogramacion.php",
    data: "idprogramacion="+id,
    dataType:"json",
    success: function(result){
      document.getElementById("btnModalELIMINARprogramacion").disabled=false;
      // alert(id);
      $('#Modal_ProgramacionELIMINAR').modal('hide'); // ocultar el modal
      mostrartablaprogramacion();
      bootbox.alert({title: result.r1, message: result.r2});
    }
  });
}
function editarprogramacion(parametro){
	loadmodalformpensum();
	document.getElementById('btnaddprogramacion').style.display = 'none';
	document.getElementById('btnupdateprogramacion').style.display = 'inline';
	
	$("#programacion_idprogramacion").attr('value',parametro.idencabezadoProg);

  	$('#selectaniopensum option:first-child').prop("value",parametro.fk_idpensum);
	$('#selectaniopensum option:first-child').prop("text",parametro.anioPensum);

	$('#selectciclopensumform option:first-child').prop("value",parametro.fk_idciclo);
	$('#selectciclopensumform option:first-child').prop("text",parametro.nombreCiclo);

	$('#selectseccionpensumform option:first-child').prop("value",parametro.fk_idSecciones);
	$('#selectseccionpensumform option:first-child').prop("text",parametro.NombreSeccion);

	// Modal_Programacion
}
function	selectseccionprogramacion(){
	$("#selectseccionpensumform").children().remove();
  	var newRow =  "<option value=''>Elija un Seccion</option>";
    $(newRow).appendTo("#selectseccionpensumform");
	$.ajax({
	  type: "post",
	  async:false,
	  cache:false,
	  url: "php/modalformselectseccion.php", //pagina a donde se envian los datos
	  dataType:"json",
	  success: function(result){
	  	$("#selectseccionpensumform").children().remove();
		  	var newRow =  "<option value=''>Elija un Seccion</option>";
	        $(newRow).appendTo("#selectseccionpensumform");
	        // alert(idpensum);
		  if(result.errorSelect==true){
		    bootbox.alert({title: result.r1, message: result.r2});
		  }
		  else{
		  	$("#selectseccionpensumform").children().remove();
		  	var newRow =  "<option value=''>Elija un Seccion</option>";
	        $(newRow).appendTo("#selectseccionpensumform");
		    $.each(result, function(i,seccion){ // iteraciones para desplegar cada fila de la tabla usuarios
			     newRow =   "<option  value="+seccion.idSecciones+">"+seccion.NombreSeccion+"</option>";
			    $(newRow).appendTo("#selectseccionpensumform");
		    });
		  }
	  }
	});
}
function selectpensumprogramacion(){
	$.ajax({
	  type: "post",
	  async:false,
	  cache:false, 
      url: "php/loadmodalformprogramacion.php", //pagina a donde se envian los datos
	  dataType:"json",
	  success: function(result){
		  if(result.errorSelect==true){
		    bootbox.alert({title: result.r1, message: result.r2});
		  }
		  else{
		  	$("#selectaniopensum").children().remove();
		  	newRow =  "<option value=''>Elija un Pensum</option>";
	        $(newRow).appendTo("#selectaniopensum");
		    
		    $.each(result, function(i,pensum){ // iteraciones para desplegar cada fila de la tabla usuarios
			    newRow =  "<option  value="+pensum.idpensum +">"+pensum.anioPensum+"</option>";
			    $(newRow).appendTo("#selectaniopensum");
		    });

		  }
		  document.getElementById("carga").style.display="none";
	  }
	});
	
}
function loadmodalformpensum(){
	document.getElementById("carga").style.display="inline";
	document.getElementById('btnupdateprogramacion').style.display = 'none';
	document.getElementById('btnaddprogramacion').style.display = 'inline';
	$("#selectciclopensumform").children().remove(); // limpiamos el select del ciclo
	var	newRow =  "<option value=''>Elija un Ciclo</option>";
	$(newRow).appendTo("#selectciclopensumform");
	$("#selectseccionpensumform").children().remove();
  	var newRow =  "<option value=''>Elija un Seccion</option>";
    $(newRow).appendTo("#selectseccionpensumform");
    selectpensumprogramacion();
    selectseccionprogramacion();
}
function selectciclopensum(){  // lo llamamos con click al input pensum del modal el codigo esta dentro de la etiqueta
	$("#selectciclopensumform").children().remove(); // limpiamos el select del ciclo
	var	newRow =  "<option value=''>Elija un Ciclo</option>";
	$(newRow).appendTo("#selectciclopensumform");
	var idpensum = $("#selectaniopensum").val();
	$.ajax({
	  type: "post",
	  url: "php/modalformselectciclo.php", //pagina a donde se envian los datos
	  data: "idpensum="+idpensum, // datos an enviar por el metodo post
	  dataType:"json",
	  success: function(result){
	  	$("#selectciclopensumform").children().remove();
		  	var newRow =  "<option value=''>Elija un Ciclo</option>";
	        $(newRow).appendTo("#selectciclopensumform");
	        // alert(idpensum);
		  if(result.errorSelect==true){
		    bootbox.alert({title: result.r1, message: result.r2});
			}
		  else{
		  	$("#selectciclopensumform").children().remove();
		  	var newRow =  "<option value=''>Elija un Ciclo</option>";
	        $(newRow).appendTo("#selectciclopensumform");
		    
		    $.each(result, function(i,ciclo){ // iteraciones para desplegar cada fila de la tabla usuarios
			     newRow =   "<option  value="+ciclo.idciclo+">"+ciclo.nombreCiclo+"</option>";
			    $(newRow).appendTo("#selectciclopensumform");
		    });
		  }
	  }
	});
}
function mostrardetalleprogramacion(idencabezadoProg){
// limpia la tabla
   document.getElementById("desplegarProgramacion").disabled=true;
   $("#bodydivprogramacion"+idencabezadoProg).children().remove();
   var dataString = 'idencabezadoProg='+ idencabezadoProg;
  //alert(idencabezadoProg);
   $.ajax({
    type: "post",
    async:false,
	cache:false,
    data: dataString,
    url: "php/tablaDetalleProgramacion.php",
    dataType:"json",
    success: function(result){
      if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
        document.getElementById("desplegarProgramacion").disabled=false;
      }
      else{
      	var newRow = 
        '<table class="table table-hover">'
	        +'<thead>'
	          +'<th>Dia</th>'
	          +'<th>Inicio</th>'
	          +'<th>Fin</th>'
	                      
	          +'<th>Carné</th>'
	          +'<th>Docente</th>'
	          +'<th>Cod Curso</th>'
	          +'<th>Curso</th>'
	          +'<th>Lab</th>'
	        +'</thead>'
	        +'<tbody id="tbodyprogramacion'+idencabezadoProg+'">'
	        +'</tbody>'
	      +'</table>';	
	    $(newRow).appendTo($("#bodydivprogramacion"+idencabezadoProg));
		$.each(result, function(i,idDetalleProg){ // iteraciones para desplegar cada fila de la tabla usuarios
	     var   parametro = JSON.stringify(idDetalleProg);
	        newRow = 		      
		          	"<tr>"
			          +"<td>"+idDetalleProg.nombreDia+"</td>"
			          +"<td>"+idDetalleProg.horaIni+"</td>"
			          +"<td>"+idDetalleProg.horaFin+"</td>"
			          
			          +"<td>"+idDetalleProg.carnet+"</td>"
			          +"<td>"+idDetalleProg.nombre+"</td>"
			          +"<td>"+idDetalleProg.codigoCurso+"</td>"
			          +"<td>"+idDetalleProg.nombreCurso+"</td>"
			          +"<td>"+idDetalleProg.lab+"</td>"
			          +"<td>" 
			            +"<button  type='button' id='btnalertaeliminarDetalleProgrmacion' onClick='alertaeliminarDetalleProgrmacion("+parametro+");' class='btn btn-danger'>"
			                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
			            +"</button>" 
			          +"</td>"
			          +"<td>" 
			            +"<button data-toggle='modal' data-target='#Modal_detalleprogramacion' type='button' id='btnupdateDetalleProgrmacion' onClick='updateDetalleProgrmacion("+parametro+");'  class='btn btn-default'>"
			              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
			            +"</button>" 
			          +"</td>"
			        +"</tr>";
	        $(newRow).appendTo($("#tbodyprogramacion"+idencabezadoProg));
        });
		document.getElementById("desplegarProgramacion").disabled=false;
      }
    }
  });
  //termina ajax
}
function buscarDetalleprogramacion(idencabezadoProg,val){
	
	var dataString = 'InputBuscarDetalleProg='+ val+ '&idencabezadoProg='+ idencabezadoProg;
	$.ajax({
    type: "post",
    url: "php/buscarDetalleprogramacion.php",
    data: dataString,
    dataType:"json",
    success: function(result){
    if(result.errorSelect==true){
        bootbox.alert({title: result.r1, message: result.r2});
        
      }
      else{
      	$("#bodydivprogramacion"+idencabezadoProg).children().remove();
      	var newRow = 
        '<table class="table table-hover">'
	        +'<thead>'
	          +'<th>Dia</th>'
	          +'<th>Inicio</th>'
	          +'<th>Fin</th>'
	          +'<th>Carné</th>'
	          +'<th>Docente</th>'
	          +'<th>Cod Curso</th>'
	          +'<th>Curso</th>'
	          +'<th>Lab</th>'
	        +'</thead>'
	        +'<tbody id="tbodyprogramacion'+idencabezadoProg+'">'
	        +'</tbody>'
	      +'</table>';	
	    $(newRow).appendTo($("#bodydivprogramacion"+idencabezadoProg));
		$.each(result, function(i,idDetalleProg){ // iteraciones para desplegar cada fila de la tabla usuarios
	     var   parametro = JSON.stringify(idDetalleProg);
	        newRow = 		      
		          	"<tr>"
			          +"<td>"+idDetalleProg.nombreDia+"</td>"
			          +"<td>"+idDetalleProg.horaIni+"</td>"
			          +"<td>"+idDetalleProg.horaFin+"</td>"
			          +"<td>"+idDetalleProg.carnet+"</td>"
			          +"<td>"+idDetalleProg.nombre+"</td>"
			          +"<td>"+idDetalleProg.codigoCurso+"</td>"
			          +"<td>"+idDetalleProg.nombreCurso+"</td>"
			          +"<td>"+idDetalleProg.lab+"</td>"
			          +"<td>" 
			            +"<button  type='button' id='btnalertaeliminarDetalleProgrmacion' onClick='alertaeliminarDetalleProgrmacion("+parametro+");' class='btn btn-danger'>"
			                  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
			            +"</button>" 
			          +"</td>"
			          +"<td>" 
			            +"<button data-toggle='modal' data-target='#Modal_detalleprogramacion' type='button' id='btnupdateDetalleProgrmacion' onClick='updateDetalleProgrmacion("+parametro+");'  class='btn btn-default'>"
			              +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
			            +"</button>" 
			          +"</td>"
			        +"</tr>";
	        $(newRow).appendTo($("#tbodyprogramacion"+idencabezadoProg));

        });
		
      }
    }
  });
  //termina ajax
}
function modalHorarioProgramacion(idencabezadoProg){
	document.getElementById('btnaddModal_detalleprogramacion').style.display = 'inline';
	document.getElementById('btnupdateModal_detalleprogramacion').style.display = 'none';
	$("#horaIniInput").val('');
	$("#horaFinInput").val('');
	$("#btnaddModal_detalleprogramacion").attr('value',idencabezadoProg);
	$.ajax({
	  type: "post",
	  async:false,
	  url: "php/modalSelectDiaDetalle.php", //pagina a donde se envian los datos
	  dataType:"json",
	  success: function(result){
	  		$("#selectDIAform").children().remove();
		  	var newRow =  "<option value='false'>Elija un DIA</option>";
		    $(newRow).appendTo("#selectDIAform");
	        if(result.errorSelect==true){
		    bootbox.alert({title: result.r1, message: result.r2});
			}
		  else{
		  	$("#selectDIAform").children().remove();
		  	var newRow =  "<option value='false'>Elija un DIA</option>";
		    $(newRow).appendTo("#selectDIAform");
		    $.each(result, function(i,dia){ // iteraciones para desplegar cada fila de la tabla usuarios
			     newRow =   "<option  value="+dia.iddia+">"+dia.nombreDia+"</option>";
			    $(newRow).appendTo("#selectDIAform");
		    });
		  }
	  }
	});
	$.ajax({
	  type: "post",
	  async:false,
	  url: "php/modalSelectDocenteDetalle.php", //pagina a donde se envian los datos
	  dataType:"json",
	  success: function(result){
	  		$("#selectDocenteform").children().remove();
		  	var newRow =  "<option value='false'>Elija un Docente</option>";
		    $(newRow).appendTo("#selectDocenteform");
	        if(result.errorSelect==true){
		    bootbox.alert({title: result.r1, message: result.r2});
		    }
		  else{
		  	$("#selectDocenteform").children().remove();
		  	var newRow =  "<option value='false'>Elija un Docente</option>";
		    $(newRow).appendTo("#selectDocenteform");
		    $.each(result, function(i,Docente){ // iteraciones para desplegar cada fila de la tabla usuarios
			     newRow =   "<option  value="+Docente.iddocente+">"+Docente.carnet+" "+Docente.nombre+" "+Docente.profesion+"</option>";
			    $(newRow).appendTo("#selectDocenteform");
		    });
		  }
	  }
	});
	$.ajax({
	  type: "post",
	  async:false,
	  url: "php/modalSelectCursoDetalle.php", //pagina a donde se envian los datos
	  dataType:"json",
	  success: function(result){
	  		$("#selectCursoform").children().remove();
		  	var newRow =  "<option value='false'>Elija un Curso</option>";
		    $(newRow).appendTo("#selectCursoform");
	        if(result.errorSelect==true){
		    bootbox.alert({title: result.r1, message: result.r2});
			}
		  else{
		  	$("#selectCursoform").children().remove();
		  	var newRow =  "<option value='false'>Elija un Curso</option>";
		    $(newRow).appendTo("#selectCursoform");
		    $.each(result, function(i,curso){ // iteraciones para desplegar cada fila de la tabla usuarios
			     newRow =   "<option  value="+curso.idcurso+">"+curso.codigoCurso+" "+curso.nombreCurso+" "+curso.lab+"</option>";
			    $(newRow).appendTo("#selectCursoform");
		    });
		  }
	  }
	});
}
function updateDetalleProgrmacion(parametro){
	modalHorarioProgramacion(parametro.fk_idencabezadoProg);
	document.getElementById('btnaddModal_detalleprogramacion').style.display = 'none';
	document.getElementById('btnupdateModal_detalleprogramacion').style.display = 'inline';
	$("#btnupdateModal_detalleprogramacion").prop('value',parametro.fk_idencabezadoProg);
	$("#programacion_idHorarios").attr('value',parametro.idhorarios);
	$("#horaIniInput").val(parametro.horaIni);
	$("#horaFinInput").val(parametro.horaFin);
	$('#selectDIAform option:first-child').prop("value",parametro.fk_iddia);
	$('#selectDIAform option:first-child').prop("text",parametro.nombreDia);

	$('#selectDocenteform option:first-child').prop("value",parametro.fk_iddocente);
	$('#selectDocenteform option:first-child').prop("text",parametro.nombre);

	$('#selectCursoform option:first-child').prop("value",parametro.fk_idcurso);
	$('#selectCursoform option:first-child').prop("text",parametro.nombreCurso);

}
function alertaeliminarDetalleProgrmacion(parametro){
	// alert(parametro.fk_idencabezadoProg);
	$('#Modal_DetalleProgramacionELIMINAR').modal('show');  // mostrar el modal
	$("#btnModalELIMINARDetalleprogramacion").attr('value',parametro.idhorarios);
	$("#btnModalELIMINARDetalleprogramacion2").attr('value',parametro.fk_idencabezadoProg);
}
function eliminarDetalleprogramacion(idhorarios,fk_idencabezadoProg){
  document.getElementById("btnModalELIMINARDetalleprogramacion").disabled=true;
  var dataString = 'idhorarios='+ idhorarios  ;
  $.ajax({
    type: "post",
    url: "php/eliminarDetalleprogramacion.php",
    data: dataString,
    dataType:"json",
    success: function(result){
      document.getElementById("btnModalELIMINARDetalleprogramacion").disabled=false;
      // alert(id);
      $('#Modal_DetalleProgramacionELIMINAR').modal('hide'); // ocultar el modal
      mostrardetalleprogramacion(fk_idencabezadoProg) ;
      bootbox.alert({title: result.r1, message: result.r2});
    }
  });
}
$(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
	$("#btnaddprogramacion").click(function(){
	  	document.getElementById("btnaddprogramacion").disabled=true; // desabilita el boton mientras operamos
	    var selectaniopensum = $("#selectaniopensum").val();
	    var selectseccionpensumform = $("#selectseccionpensumform").val();
	    var selectciclopensumform = $("#selectciclopensumform").val();
		var dataString = 'selectaniopensum='+ selectaniopensum + '&selectseccionpensumform='+ selectseccionpensumform + '&selectciclopensumform='+ selectciclopensumform  ;
	    if(!selectaniopensum||!selectseccionpensumform|| !selectciclopensumform){
	      bootbox.alert('Por favor llene los campos requeridos');
	      document.getElementById("btnaddprogramacion").disabled=false;
	      mostrartablaprogramacion() ;
	    }
	    else{
	    // AJAX Code To Submit Form.
	      $.ajax({
	        type: "post",
	        url: "php/guardarencabezadoprogr.php",
	        data: dataString,
	        dataType:"json",
	        success: function(result){
	          // var form = document.getElementById("form_usuario");
	          // form.reset(); // limpia de los input
	          $('#Modal_Programacion').modal('hide');  // esconder el modal
				//  mostrartablausuarios();
	          bootbox.alert({title: result.r1,
	          message: result.r2});
	          document.getElementById("btnaddprogramacion").disabled=false; // habilitamos el boton
	          mostrartablaprogramacion() ;
	        }
	      });
	    }
	    return false;
	 });

	$('#myTab a[href="programacion"]').click(function(){ // en un click mostrar la pestana usuarios
		document.getElementById("carga").style.display="inline";
	    mostrartablaprogramacion() ;

	});
	$('#btnupdateprogramacion').click(function(){ // en un click mostrar la pestana usuarios
	    document.getElementById("btnupdateprogramacion").disabled=true; // desabilita el boton mientras operamos
	    var programacion_idprogramacion = $("#programacion_idprogramacion").val();
	    var selectaniopensum = $("#selectaniopensum").val();
	    var selectseccionpensumform = $("#selectseccionpensumform").val();
	    var selectciclopensumform = $("#selectciclopensumform").val();
		var dataString = 'programacion_idprogramacion='+ programacion_idprogramacion +'&selectaniopensum='+ selectaniopensum + '&selectseccionpensumform='+ selectseccionpensumform + '&selectciclopensumform='+ selectciclopensumform  ;
	    if(!selectaniopensum||!selectseccionpensumform|| !selectciclopensumform){
	      bootbox.alert('Por favor llene los campos requeridos');
	      document.getElementById("btnupdateprogramacion").disabled=false;
	      mostrartablaprogramacion() ;
	    }
	    else{
	    // AJAX Code To Submit Form.
	      $.ajax({
	        type: "post",
	   //      async:false,
	 		// cache:false,
	        url: "php/updateprogramacion.php",
	        data: dataString,
	        dataType:"json",
	        success: function(result){
	          // var form = document.getElementById("form_usuario");
	          // form.reset(); // limpia de los input
	          $('#Modal_Programacion').modal('hide');  // esconder el modal
			  bootbox.alert({title: result.r1,
	          message: result.r2});
	          document.getElementById("btnupdateprogramacion").disabled=false; // habilitamos el boton
	          mostrartablaprogramacion() ;
	        }
	      }); 
	    }  
	});
	$('#btnModalELIMINARprogramacion').click(function(){ // boton del modal  para la programacion
		var id = $('#btnModalELIMINARprogramacion').val();
		eliminarprogramacion(id);
		$("#btnModalELIMINARprogramacion").attr('value',"");  //limpiar la variable del boton
	});
	$('#btnModalELIMINARDetalleprogramacion').click(function(){ // boton del modal para el DETALLE DE LA PROGRAMACION
		var idhorarios = $('#btnModalELIMINARDetalleprogramacion').val();
		var fk_idencabezadoProg = $('#btnModalELIMINARDetalleprogramacion2').val();
		eliminarDetalleprogramacion(idhorarios,fk_idencabezadoProg);
		$("#Modal_DetalleProgramacionELIMINAR").attr('value',"");  //limpiar la variable del boton
		$("#btnModalELIMINARDetalleprogramacion2").attr('value',"");  //limpiar la variable del boton
	});


	$('#btnaddModal_detalleprogramacion').click(function(){ // boton del modal 
		document.getElementById("btnaddModal_detalleprogramacion").disabled=true;
		var idencabezadoProg = $('#btnaddModal_detalleprogramacion').val();
		$("#btnaddModal_detalleprogramacion").attr('value',"");  //limpiar la variable del boton
		 // desabilita el boton mientras operamos
		var horaIniInput = $("#horaIniInput").val();
		var horaFinInput = $("#horaFinInput").val();
		var selectDIAform = $("#selectDIAform").val();
	    var selectDocenteform = $("#selectDocenteform").val();
	    var selectCursoform = $("#selectCursoform").val();
		if(selectDIAform=="false" || horaIniInput=="" || horaFinInput==""  || selectDocenteform=="false"||selectCursoform=="false" ){
	      document.getElementById("btnaddModal_detalleprogramacion").disabled=false;
	      bootbox.alert('Por favor llene los campos requeridos');
	      mostrardetalleprogramacion(idencabezadoProg) ;
	    }
	    else{
	    	var dataString = 'selectDIAform='+ selectDIAform + '&selectDocenteform='+ selectDocenteform + '&selectCursoform='+ selectCursoform   + '&horaIniInput='+ horaIniInput  + '&horaFinInput='+ horaFinInput + '&idencabezadoProg='+ idencabezadoProg ;
	    // AJAX Code To Submit Form.
	      $.ajax({
	        type: "post",
	        url: "php/guardarDetalleprogr.php",
	        data: dataString,
	        dataType:"json",
	        success: function(result){
	          $('#Modal_detalleprogramacion').modal('hide');  // esconder el modal
			  bootbox.alert({title: result.r1,
	          message: result.r2});
	          document.getElementById("btnaddModal_detalleprogramacion").disabled=false; // habilitamos el boton
	          mostrardetalleprogramacion(idencabezadoProg) ;
	        }
	      });
	    }
	});
	$('#btnupdateModal_detalleprogramacion').click(function(){ // boton del modal 
		var fk_idencabezadoProg = $('#btnupdateModal_detalleprogramacion').val();
		var programacion_idHorarios = $('#programacion_idHorarios').val();
		document.getElementById("btnupdateModal_detalleprogramacion").disabled=true; // desabilita el boton mientras operamos
		var horaIniInput = $("#horaIniInput").val();
		var horaFinInput = $("#horaFinInput").val();
		var selectDIAform = $("#selectDIAform").val();
	    var selectDocenteform = $("#selectDocenteform").val();
	    var selectCursoform = $("#selectCursoform").val();
		var dataString = 'selectDIAform='+ selectDIAform + '&selectDocenteform='+ selectDocenteform + '&selectCursoform='+ selectCursoform   + '&horaIniInput='+ horaIniInput  + '&horaFinInput='+ horaFinInput + '&programacion_idHorarios='+ programacion_idHorarios + '&fk_idencabezadoProg='+ fk_idencabezadoProg ;
	    if(selectDIAform=="false" || horaIniInput=="" || horaFinInput==""  || selectDocenteform=="false"||selectCursoform=="false" ){
	      bootbox.alert('Por favor llene los campos requeridos');
	      document.getElementById("btnupdateModal_detalleprogramacion").disabled=false;
	      mostrardetalleprogramacion(fk_idencabezadoProg) ;
	    }
	    else{
	    // AJAX Code To Submit Form.
	    	$.ajax({
				type: "post",
				url: "php/editarDetalleprogr.php",
				data: dataString,
				dataType:"json",
				success: function(result){
					mostrardetalleprogramacion(fk_idencabezadoProg) ;
				  	$('#Modal_detalleprogramacion').modal('hide');  // esconder el modal
				  	bootbox.alert({title: result.r1,
				  	message: result.r2});
					document.getElementById("btnupdateModal_detalleprogramacion").disabled=false; // habilitamos el boton
			          
			    }
		    });
	    }
	});
});

