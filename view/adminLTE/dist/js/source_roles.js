function lista_roles(){
   $(document).ready( function (){
     $.ajax({
               beforeSend: function(){
                 $("#listaRoles").html("<b>Actualizando Listado...</b>")
               },
               url: 'index.php?controller=Roles&action=listaRoles',
               type: 'POST',
               data: null,
               success: function(x){
                 $("#listaRoles").html(x);
                 $("#tabla_roles").dataTable({
                     "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
                 } );
               },
              error: function(jqXHR,estado,error){
                $("#listaRoles").html("Ocurrio un error al cargar la informacion de compras..."+estado+"    "+error);
              }
            });
   })
}
/****************************************************/
function nuevoRol(){
    var nombre=$("#nombre_rol").val();
         
      $.ajax({
        beforeSend: function(){  },
        url: 'index.php?controller=Roles&action=InsertaRoles',
        type: 'POST',
        data: {nombre_rol:nombre},
        success: function(x){
        	console.log(x);
          $("#btn-nuevo").prop('disabled', true);
          if(x==1){
           $("#nombre_rol").prop('disabled', true);
           lista_roles();
           var n = noty({
               text: "Se registro el Rol",
               theme: 'relax',
               layout: 'center',
               type: 'information',
               timeout: 3000,
               });
           $("#nombre_rol").prop('disabled', false);
           $("#btn-nuevo").prop('disabled', false);           
           }
           if(x=="error"){
           var n = noty({
           text: "No se registro el Rol, verifique los campos...!",
           theme: 'relax',
           layout: 'center',
           type: 'information',
           timeout: 2000,
           });
           $("#btn-nuevo").prop('disabled', false);
          }
          }
          ,
          /**************************/
        error: function(jqXHR,estado,error){
          var n = noty({
           text: "Ocurrio un error al registrar el Rol!",
           theme: 'relax',
           layout: 'center',
           type: 'information',
           });
          }
       });
   }
/*******************************************************************************************/
function cancelaNuevoRol(){
    $("#nombre_rol").val("");
    $("#nombre_rol").focus();
}
/************************************************************************************/
function tabMenu(elemento){
	
	$('.nav.nav-tabs.pull-right li').removeClass('active');
    $('#'+elemento).addClass('active');
    enlace = $('#'+elemento+' a:first');
    $('#listado').tab('hide');
    $('#nuevo').tab('show');
    //$('#myTabs a[href="#' + enlace.attr('href') + '"]').tab('show');
    //$(enlace.attr('href')).tab('show');
    
   
}
/************************************************************************************/