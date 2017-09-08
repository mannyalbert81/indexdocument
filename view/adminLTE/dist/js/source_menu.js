/************************************************************************************/
function vita_usuarios(){
   $(document).ready( function (){
     $.ajax({
               beforeSend: function(){
                 $("#users_registrados").html("<b>Actualizando Listado...</b>")
               },
               url: 'index.php?controller=Usuarios&action=index10',
               type: 'POST',
               data: null,
               success: function(x){
                 $("#users_registrados").html(x);
                 $("#tabla_usuarios").dataTable({
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
                 } );
               },
              error: function(jqXHR,estado,error){
                $("#users_registrados").html("Ocurrio un error al cargar la informacion de Usuarios..."+estado+"    "+error);
              }
            });
   })
}


/************************************************************************************/