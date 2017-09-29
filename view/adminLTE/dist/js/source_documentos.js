




function lista_documentos(pagina){
  
	   
	   var con_datos={
				  action:'ajax',
				  page:pagina
				  };
	   
	   var doc_categorias=$("#categorias").val();
	   var doc_subcategorias= $("#subcategorias").val();
	   var doc_year= $("#year").val();
	   var doc_txt_ruc_cliente_proveedor= $("#txt_ruc_cliente_proveedor").val();
	   
	   var doc_txt_nombre_cliente_proveedor= $("#txt_nombre_cliente_proveedor").val();
	   var doc_fecha_documento_hasta= $("#fecha_documento_hasta").val();
	   var doc_fecha_documento_desde= $("#fecha_documento_desde").val();
	   var doc_txt_tipo_documentos= $("#txt_tipo_documentos").val();
	   var doc_carton_documentos= $("#carton_documentos").val();
	   
	   
       $.ajax({
    	      beforeSend: function(){
               $("#documentos_registrados").html("<b>Actualizando Listado...</b>")
               },
               url: 'index.php?controller=Documentos&action=buscar&categorias='+doc_categorias+'&subcategorias='+doc_subcategorias+'&year='+doc_year+
               '&txt_ruc_cliente_proveedor='+doc_txt_ruc_cliente_proveedor+
               '&txt_nombre_cliente_proveedor='+doc_txt_nombre_cliente_proveedor+
               '&fecha_documento_hasta='+doc_fecha_documento_hasta+
               '&fecha_documento_desde='+doc_fecha_documento_desde+
               '&txt_tipo_documentos='+doc_txt_tipo_documentos+
               '&carton_documentos='+doc_carton_documentos,
               type: 'POST',
               async: true,
              data: con_datos,
               success: function(x){
                 $("#documentos_registrados").html(x);
               },
              error: function(jqXHR,estado,error){
                $("#documentos_registrados").html("Ocurrio un error al cargar la informacion de Usuarios..."+estado+"    "+error);
              }
            });
  
}


