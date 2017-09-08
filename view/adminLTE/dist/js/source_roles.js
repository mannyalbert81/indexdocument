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
                     'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                     'columnDefs': [ {
                    	 sTitle: 'Accion',
                         mDataProp: '1',
                    	 searchable: false,
                         orderable: false,
                         width: '1%',
                         className: 'dt-body-center',
                         targets:   0,
                         render: function(data) {
                             acciones = '<span data-id="'+data+'" data-value="Eliminar" class="accionesTabla eliminar" data-toggle="tooltip" title="Eliminar Registro" ><i class="fa fa-trash-o" style="color:red"></i> </a></span>'
                             +'<span data-id="'+data+'" data-value="Editar" class="accionesTabla edit" data-toggle="tooltip" title="Editar Registro" ><i class="fa fa-pencil"></i> </a></span>';
                             return acciones
                         }
                        
                     } ],
                     'order': [[ 1, 'asc' ]],
                     
                     
                 } );
               },
              error: function(jqXHR,estado,error){
                $("#listaRoles").html("Ocurrio un error al cargar la informacion de compras..."+estado+"    "+error);
              }
            });
     
	     $(document).on('click', '.accionesTabla', function() {
	
	 	    var id = $(this).data('id');
	 	    var val = $(this).data('value');
	
	 	    switch (val) {
	 	        case "Editar":
	 	        	EditarRegistro(id);
	 	            break;
	 	        case "Ver":
	 	            alert(id + " Ver");
	 	            break;
	 	        case "Eliminar":
	 	            alert(id + " Eliminar");    
	 	            break;
	 	        default:
	 	            alert("No existe el valor");
	 	            break;
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
           tabpagina('listado');
           cancelaNuevoRol();
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
	
	enlace = $('#'+elemento+' a:first');
	$('#myTabs a[href="'+enlace.attr('href')+'"]').tab('show'); 
}
/************************************************************************************/
function tabpagina(pagetab){
	
	$('#myTabs a[href="#'+pagetab+'"]').tab('show'); 
}
/************************************************************************************/
function eliminaRegistro(pagetab){
	
	$('#myTabs a[href="#'+pagetab+'"]').tab('show'); 
}
/************************************************************************************/
function EditarRegistro(identificador){
	
	$(document).ready(function(){
        $.ajax({
        beforeSend: function(){
        	$('#div-codigo-buscar').html('');
        	$('#btn-buscar-editar').css('display','none');
        	$('#myTabs a[href="#editar"]').tab('show'); 
         },
        url: 'index.php?controller=Roles&action=editarRoles',
        type: 'POST',
        data: {id_rol:identificador},
        success: function(x){
            if(x==0){
             alert("El codigo del rol, no existe...");
             // $("#btn-buscar-cambio").prop('disabled', false);
            }else{
            //$("#codigo_busqueda_cambio").prop('disabled', true);
            $("#info_rol_editar").html(x);
            $('#btn-procede-editar').prop('disabled', false);
            $('#btn-cancela-editar').prop('disabled', false);
           
            }
         },
         error: function(jqXHR,estado,error){
         }
         });
        });
	
	
}
/************************************************************************************/
function actualizarRegistro(){
	
	$(document).ready(function(){
        $.ajax({
        beforeSend: function(){
        	$('#div-codigo-buscar').html('');
        	$('#myTabs a[href="#editar"]').tab('show'); 
         },
        url: 'index.php?controller=Roles&action=actualizarRoles',
        type: 'POST',
        data: {id_rol:$('#id_rol').val(),nombre_rol:$('#nombre_rol').val()},
        success: function(x){
            if(x==0){
             alert("El codigo del rol, no existe...");
             // $("#btn-buscar-cambio").prop('disabled', false);
            }else{
            //$("#codigo_busqueda_cambio").prop('disabled', true);
            $("#info_rol_editar").html(x);
            }
         },
         error: function(jqXHR,estado,error){
         }
         });
        });
	
	
}
/************************************************************************************/