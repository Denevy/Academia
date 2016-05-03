 function limpiarcamposformdocente(){ 
          $("#docente_carnetdocente").attr('value',""); 
          $("#docente_nombredocente").attr('value',"");
          $("#docente_profesiondocente").attr('value',"");
          $("#docente_telefonodocente").attr('value',"");
          $("#docente_correodocente").attr('value',"");
          $("input[name=docente_nacceso]").attr('checked',false);
          $("input[name=docente_estado]").attr('checked',false);
      
      }

    function alertaeliminardocente(val){
          $('#Modal_DocenteEliminar').modal('show');  // mostrar el modal
          $("#btnModalELIMINARdocente").attr('value',val);
      
        }
     
    function eliminardocente(val){
       // $('#Modal_DocenteEliminar').modal('show');  // mostrar el modal 
    //  $('#Modal_DocenteEliminar').modal('hide'); // ocultar el modal
      // alert(val);
      $.ajax({
        type: "post",
        url: "php/eliminardocente.php",
        data: "iddocente="+val,
        dataType:"json",
        success: function(result){
         document.getElementById("btnModalELIMINARdocente").disabled=false;
		 $("#bodytdocente").children().remove();
         $('#Modal_DocenteELIMINAR').modal('hide');
          mostrartabladocente();
          bootbox.alert({title: result.r1, message: result.r2});
        }
      });
    }

    function editardocente(docentetd){
          limpiarcamposformdocente(); 
          document.getElementById('btnadddocente').style.display = 'none'; // esconde boton agregar usuario
          document.getElementById('btnupdatedocente').style.display = 'inline';  // muestra boton insertar usuario
              
          $("#docente_IdDocente").attr('value',docentetd.idoce);
      $("#docente_carnetdocente").attr('value',docentetd.carnetdoce);
      $("#docente_nombredocente").attr('value',docentetd.nombredoce);
      $("#docente_profesiondocente").attr('value',docentetd.profesiondoce);
      $("#docente_telefonodocente").attr('value',docentetd.telefonodoce);
          $("#docente_correodocente").attr('value',docentetd.correodoce);
      $("input[name=docente_nacceso][value="+docentetd.restricciondoce+" ]").prop('checked',true);
          $("input[name=docente_estado][value="+docentetd.estadodoce+" ]").prop('checked',true);
     
      
       
          // $('#Modal_Usuario').modal('show');  // mostrar el modal
          // alert("nivel acceso=  "+usuariotd.fk_idNivelAcceso);
          // alert("estado=  "+usuariotd.fk_idEstados);  
        }


    
    function mostrartabladocente() 
      { 
          $.ajax({
            type: "post",
            url: "php/tabladocente.php",
            dataType:"json",
            success: function(result){
              if(result.errorSelect==true){
                bootbox.alert({title: result.r1, message: result.r2});
              }
              else{
                $("#bodytdocente").children().remove(); // limpia la tabla
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
           
                    +"<button  type='button' id='btneliminardoc' onClick='alertaeliminardocente("+docetd.idoce+");' class='btn btn-danger'>"
                          +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
                    +"</button>" 
                  +"</td>"
                  +"<td>" 
                    +"<button data-toggle='modal' data-target='#Modal_Docente' type='button' id='btnupdatedocente' onClick='editardocente("+parametro+");'  class='btn btn-default'>"
                      +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
                       //   
                    +"</button>" 
                  +"</td>"
               +"</tr>";
                $(newRow).appendTo("#bodytdocente");
                });
              }
            }
          });
          //termina ajax
          return false;  
        }
    
    
    
    
    
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente
      
       $('#btnModalELIMINARdocente').click(function(){ // boton del modal 
              var id = $('#btnModalELIMINARdocente').val();
              eliminardocente(id);
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              //document.getElementById('btnupdatedocente').style.display = 'none'; // boton actializar desaparece dentro del modal 
              //document.getElementById('btnadddocente').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });
      
      
      $('#btnupdatedocente').click(function(){ // boton del modal 
      document.getElementById("btnupdatedocente").disabled=true;
	  var id= $("#docente_IdDocente").val();
      var carnet= $("#docente_carnetdocente").val();
      var nombre= $("#docente_nombredocente").val();
      var profesion= $("#docente_profesiondocente").val();
      var telefono= $("#docente_telefonodocente").val();
      var correo= $("#docente_correodocente").val();
      var acceso= $("input[name=docente_nacceso]:checked").val();
      var estado= $("input[name=docente_estado]:checked").val();
      
            // $('#Modal_Usuario').modal('show');  // esconder el modal
             var dataString = 'carnet='+carnet+ '&id='+ id + '&nombre='+ nombre + '&profesion='+ profesion + '&telefono='+ telefono + '&correo='+ correo + '&acceso='+ acceso + '&estado='+ estado;
            $.ajax({
              type: "post",
              url: "php/editardocente.php", //pagina a donde se envian los datos
              data: dataString, // datos an enviar por el metodo post
              dataType:"json",  
              success: function(result){
                document.getElementById("btnupdatedocente").disabled=false;
				$('#Modal_Docente').modal('hide');  // esconder el modal
                bootbox.alert({title: result.r1, message: result.r2});
                mostrartabladocente();
				limpiarcamposformdocente();
              }
            });
          });
      
      
       $('#btnmodaladddocente').click(function(){ // boton del modal 
              limpiarcamposformdocente();
              // var form = document.getElementById("form_usuario");
              // form.reset(); // limpia de los input
              //$("#btnaddusuario").style.display = 'inline';
              document.getElementById('btnupdatedocente').style.display = 'none'; // boton actializar desaparece dentro del modal 
              document.getElementById('btnadddocente').style.display = 'inline'; // mostrar boton agregar usuario dentro del modal
          });
      
      $('#myTab a[href="#docente"]').click(function(){ // en un click mostrar la pestana centroU
      mostrartabladocente();
      });
      
      
       $("#btnadddocente").click(function(){
            document.getElementById("btnadddocente").disabled=true; // desabilita el boton mientras operamos
            //<?php $_SESSION['tab']= "docente"; ?> //bandera entro a la pestana usuario
            var carnet = $("#docente_carnetdocente").val();
            var nombre = $("#docente_nombredocente").val();
            var profesion = $("#docente_profesiondocente").val();
            var telefono = $("#docente_telefonodocente").val();
            var correo = $("#docente_correodocente").val();
            var nacceso = $("input[name=docente_nacceso]:checked").val();
            var estado = $("input[name=docente_estado]:checked").val();
            var dataString = 'carnet='+ carnet + '&nombre='+ nombre + '&profesion='+ profesion + '&telefono='+ telefono +  '&correo='+ correo + '&nacceso='+ nacceso + '&estado='+ estado ;
            if(carnet==''||nombre==''|| profesion==''|| telefono=='' || correo=='' || nacceso=='' || estado==''){
              bootbox.alert('Por favor llene los campos requeridos');
              document.getElementById("btnadddocente").disabled=false;
			  	
            }
            else{
            // AJAX Code To Submit Form.
              $.ajax({
                type: "post",
                url: "php/agregardocente.php",
                data: dataString,
                dataType:"json",
                success: function(result){
                  var form = document.getElementById("form_docente");
                  form.reset(); // limpia de los input
                  $('#Modal_Docente').modal('hide');  // esconder el modal
                  mostrartabladocente();
                  bootbox.alert({title: result.r1,
                  message: result.r2});
                  document.getElementById("btnadddocente").disabled=false; // habilitamos el boton
                }
              });
            }
            return false;
          });
        });