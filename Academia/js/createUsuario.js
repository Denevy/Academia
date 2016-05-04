    function mostrartablaUser() 
      { 
          $.ajax({
            type: "post",
            url: "php/tablaUsuario.php",
            dataType:"json",
            success: function(result){
              if(result.errorSelect==true){
                bootbox.alert({title: result.r1, message: result.r2});
              }
              else{
                $("#bodytuser").children().remove(); // limpia la tabla
                $.each(result, function(i,usuariotd){ // iteraciones para desplegar cada fila de la tabla centros
                var parametro = JSON.stringify(usuariotd);
                var newRow =
                "<tr>"
                  +"<td>"+usuariotd.idUser+"</td>"
                  +"<td>"+usuariotd.passUser+"</td>"
                  +"<td>"+usuariotd.nameUser+"</td>"
                  +"<td>"+usuariotd.estadoUser+"</td>"
                  +"<td>"+usuariotd.levelUser+"</td>"
                  +"<td>"+usuariotd.carreraUser+"</td>"
                  +"<td>"+usuariotd.centroUser+"</td>"
               +"</tr>";
                $(newRow).appendTo("#bodytUser");
               alert(newRow);
                });
              }
            }
          });
          //termina ajax
          return false;  
        }
      
        $(document).ready(function(){ // funcion que inicia uan vez el documento este cargado completamente   
          $('#myTab a[href="#user"]').click(function(){ // en un click mostrar la pestana centroU
          mostrartablaUser();
          });
      });