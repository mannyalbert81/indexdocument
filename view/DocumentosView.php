<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        <title>Busqueda de Documentos - aDocument 2015</title>
          <?php include("view/modulos/links.php"); ?>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		    
      
 		
 		 <script>
         if (history.forward(1)){location.replace(history.forward(1))}
         </script>
			  
		<script >
		$(document).ready(function(){
		     $("#categorias").change(function() {
               var $subcategorias = $("#subcategorias");
               var id_categorias = $(this).val();
               $subcategorias.empty();
               $subcategorias.append("<option value= " +"0" +" > --TODOS--</option>");
               if(id_categorias > 0)
               {
            	   var datos = {
            			   id_categorias : $(this).val()
                   };
                $.post("<?php echo $helper->url("subCategorias","devuelveSubcategorias"); ?>", datos, function(resultSub) {
            		 		$.each(resultSub, function(index, value) {
               		 	    $subcategorias.append("<option value= " +value.id_subcategorias +" >" + value.nombre_subcategorias  + "</option>");	
                       		 });
            		 		 	 		   
            		  }, 'json');
               }
               else
               {
            	   $.post("<?php echo $helper->url("subCategorias","devuelveAllSubcategorias"); ?>", datos, function(resultSub) {
   		 		        $.each(resultSub, function(index, value) {
          		 	    $subcategorias.append("<option value= " +value.id_subcategorias +" >" + value.nombre_subcategorias  + "</option>");	
                	  });
     		  		}, 'json');
               }
               
		    });
    
		}); 
	</script>
		
	<script>
		$(document).ready(function(){
			$("#subcategorias").change(function() {
	               // obtenemos el combo de categorias
	                var $categorias = $("#categorias");
	               
					///obtengo el id seleccionado
					var id_subcategorias = $(this).val();
	               if(id_subcategorias > 0)
	               {
	            	   var datos = {
	            			   id_subcategorias : $(this).val()
	                   };
	            	   //$categorias.append("<option value= " +"0" +" >"+ id_subcategorias  +"</option>");
	                   $.post("<?php echo $helper->url("subCategorias","devuelveSubBySubcategorias"); ?>", datos, function(resultSub) {
	            		   
         		 		  $.each(resultSub, function(index, value) {
         		 			 $('#categorias').val( value.id_categorias );//To select Blue	 
         		 			//$("'#categorias > option[value="+value.id_categorias"+"]').attr('selected', 'selected'");
								
							 });
         		 		 	 		   
         		  		}, 'json');
	                   
	               }
	               else
	               {
	          		 $('#categorias').val( 0 );//To select Blue
			        }
	               
	               
			    });
		}); 
	</script>
	
		
     <script>
			function myFunction() {
			    var x = document.getElementById("categorias").value;
                    var subcategorias = document.getElementById("subcategorias");
                    $subcategorias.Empty();
				    document.getElementById("demo").innerHTML = "You selected: " + x;
			}
	</script>
	
	
	<script type="text/javascript">
		$(document).ready(function(){
		$("#btnBuscar").click(function(){
			var datafecha= $("#fecha_documento_hasta").data();
			if(datafecha.val==0)
	    	{
		    load_Documentos(1);
	    	}else
	    	{
	    		datafecha.val=0;
	    	}
			});
			load_nombre_cliente();
	      });
	
	function load_Documentos(pagina){
		 var doc_categorias=$("#categorias").val();
		 var doc_subcategorias=$("#subcategorias").val();
		 var doc_ruc_cli=$("#txt_ruc_cliente_proveedor").val();
		 var doc_nombre_cli=$("#txt_nombre_cliente_proveedor").val();
		 var doc_tipo_doc=$("#txt_tipo_documentos").val();
		 var doc_cartones_doc=$("#carton_documentos").val();
		 var doc_fecha_doc_desde=$("#fecha_documento_desde").val();
		 var doc_fecha_doc_hasta=$("#fecha_documento_hasta").val();
		 var doc_fecha_subida_desde=$("#fecha_subida_desde").val();
		 var doc_fecha_subida_hasta=$("#fecha_subida_hasta").val();
		 var doc_numero_poliza=$("#numero_poliza").val();
		 var doc_cierre_ventas=$("#cierre_ventas_soat").val();
		 var doc_fecha_poliza_desde=$("#fecha_poliza_desde").val();
		 var doc_fecha_poliza_hasta=$("#fecha_poliza_hasta").val();
		 var doc_year=$("#year").val();
		 	
		  var con_datos={
				  categorias:doc_categorias,
				  subcategorias:doc_subcategorias,
				  txt_ruc_cliente_proveedor:doc_ruc_cli,
				  txt_tipo_documentos:doc_tipo_doc,
				  txt_nombre_cliente_proveedor:doc_nombre_cli,
				  carton_documentos:doc_cartones_doc,
				  numero_poliza:doc_numero_poliza,
				  fecha_documento_desde:doc_fecha_doc_desde,
				  fecha_documento_hasta:doc_fecha_doc_hasta,
				  fecha_subida_desde:doc_fecha_subida_desde,
				  fecha_subida_hasta:doc_fecha_subida_hasta,
				  cierre_ventas_soat:doc_cierre_ventas,
				  fecha_poliza_desde:doc_fecha_poliza_desde,
				  fecha_poliza_hasta:doc_fecha_poliza_hasta,
				  year:doc_year,
				  action:'ajax',
				  page:pagina
				  };
		$("#Documentos").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("Documentos","buscar");?>",
            type : "POST",
            async: true,			
			data: con_datos,
			 beforeSend: function(objeto){
			$("#Documentos").html('<img src="view/images/ajax-loader.gif"> Cargando...');
			},
			success:function(data){
				$(".Documentos").html(data).fadeIn('slow');
				$("#Documentos").html("");
				resetfecha();
			}
		})
	}
	</script>
	
       <script>
		$(document).ready(function(){
		    $("#fecha_documento_hasta").change(function() {
		    	return validarFecha();
			  });
		    $fecha=$('#fecha_documento_hasta');
		    if ($fecha[0].type!="date"){
		    	$fecha.attr('readonly','readonly');
		    	$fecha.datepicker({
		    		changeMonth: true,
		    		changeYear: true,
		    		dateFormat: "yy-mm-dd",
		    		yearRange: "1990:2017"
		    		});
		    }
		    $fecha=$('#fecha_documento_desde');
		    if ($fecha[0].type!="date"){
		    $fecha.attr('readonly','readonly');
		    $fecha.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1990:2017"
	    		});
		    }
		}); 
	</script>
	
	<script type="text/javascript">
	function validarFecha()
	{
		    var startDate = new Date($('#fecha_documento_desde').val());
	    	var endDate = new Date($('#fecha_documento_hasta').val());
			var datafecha= $("#fecha_documento_hasta").data();
			if (startDate > endDate){
	    		$("#fecha_documento_hasta").val("");
	    		datafecha.val=1;
	    		alert('Fecha documento DESDE mayor a  fecha FINAL');	    		
	    	}else
	    	{
	    		datafecha.val=0;
	    	}
	    	var fecha_actual = new Date();
	    	
	    	if (endDate > fecha_actual){
	    		$("#fecha_documento_hasta").val("");
	    		datafecha.val=1;
	    		alert('Fecha documento mayor a fecha actual');
	    		
	    	}else
	    	{
	    		datafecha.val=0;
	    	}
	    	
	    }
	 function resetfecha()
	    {
	    	$('#fecha_documento_desde').val("");
	    	$('#fecha_documento_hasta').val("");
	    }
	</script>
	  	
	<script>
		$(document).ready(function(){
		    $("#fecha_poliza_hasta").change(function() {
			    
		    	var startDate = new Date($('#fecha_poliza_desde').val());
		    	var endDate = new Date($('#fecha_poliza_hasta').val());
		    	if (startDate > endDate){
		    		$("#fecha_poliza_hasta").val("");
		    		alert('Fecha poliza DESDE mayor a  fecha FINAL');
		    		die();
		    	}
		    	var fecha_actual = new Date();
		    	if (endDate>fecha_actual){
		    		$("#fecha_documento_hasta").val("");
		    		alert('Fecha poliza mayor a fecha actual');
		    		die();
		    	}
			  });
		}); 
	</script>
	

	<script>
		$(document).ready(function(){
		    $("#fecha_subida_hasta").change(function() {
		    	var startDate = new Date($('#fecha_subida_desde').val());
		    	var endDate = new Date($('#fecha_subida_hasta').val());
		    	if (startDate > endDate){
		    		$("#fecha_subida_hasta").val("");
		    		alert('Fecha subida DESDE mayor a  fecha FINAL');
		    		die();
		    	}
		    	var fecha_actual = new Date();
		    	if (endDate>fecha_actual){
		    		$("#fecha_documento_hasta").val("");
		    		alert('Fecha subida mayor a fecha actual');
		    		die();
		    	}
			  });
		}); 
	</script>
       
    <script type="text/javascript">
      $(document).ready(function(){
	    $("#fecha_subida_hasta").keypress(function() {
		    alert('hola');
		 if($(this).val().lenght<=10)
		 {
	    if ($(this).val().length == 2 || $(this).val().length == 5){
	         $(this).val($(this).val() + "/");
	      }
		 }else{
			 return false;
		 }
	    });
	}); 
    </script>   
               
    </head>
    <body>
    <div class="wrapper">
 
      <header class="main-header">
        <?php include('view/modulos/head.php');?>
      </header>
     
      <aside class="main-sidebar">
	  <?php include('view/modulos/slide.php');
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        ?>
      </aside>
       
     
  
        
       <?php
   
		   $sel_categorias = 0;
		   $sel_subcategorias = 0;
		   $sel_year = 0;
		   $sel_cliente_proveedor = 0;
		   $sel_tipo_documentos = 0;
		   $sel_carton_documentos = 0;
		   $sel_numero_poliza = 0;
		   $sel_cierre_ventas_soat = 0; 
		   $sel_fecha_documento_desde = "";
		   $sel_fecha_documento_hasta = "";
		   $sel_fecha_poliza_desde = "";
		   $sel_fecha_poliza_hasta = "";
		   $sel_fecha_subida_desde = "";
		   $sel_fecha_subida_hasta = "";
		   
		   if($_SERVER['REQUEST_METHOD']=='POST' )
		   {
		      $sel_categorias = $_POST['categorias'];
		      $sel_subcategorias = $_POST['subcategorias'];
		      $sel_year = $_POST['year'];
		      $sel_cliente_proveedor = $_POST['nombre_cliente_proveedor'];
		      $sel_tipo_documentos = $_POST['tipo_documentos'];
		      $sel_carton_documentos = $_POST['carton_documentos'];
		      $sel_numero_poliza = $_POST['numero_poliza'];
		      $sel_cierre_ventas_soat = $_POST['cierre_ventas_soat'];
		      $sel_fecha_documento_desde = $_POST['fecha_documento_desde'];
		      $sel_fecha_documento_hasta = $_POST['fecha_documento_hasta'];
		      $sel_fecha_poliza_desde = $_POST['fecha_poliza_desde'];
		      $sel_fecha_poliza_hasta = $_POST['fecha_poliza_hasta'];
		      $sel_fecha_subida_desde = $_POST['fecha_subida_desde'];
		      $sel_fecha_subida_hasta = $_POST['fecha_subida_hasta'];
		      
		       
		   }
		   
		?>
		
		
		
		
		
		 <div class="content-wrapper">
         <section class="content-header">
         <h1>
         <?php   echo "IndexDocument";?>
         <small><?php echo $fecha; ?></small>
         </h1>
         <ol class="breadcrumb">
         <li><a href="<?php echo $helper->url("usuarios","Loguear"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Buequeda de Documentos</li>
         </ol>
         </section>
         
         
         <section class="content">
          <div class='nav-tabs-custom'>
          		<ul id="myTabs" class="nav nav-tabs pull-right">
                  <li id="nav-listado" class="active"><a href="#listado" data-toggle="tab">Listado</a></li>
                  <li class="pull-left header"><i class="fa fa-file-text"></i> BUSQUEDA DE DOCUMENTOS.</li>
                </ul>
                
          
       
      <?php   $nombre_tipo_doc="";    $nombre_cliente="";      $ruc_cliente="";?>
      <div class="tab-pane" id="listado" >
      <form  action="<?php echo $helper->url("Documentos","index"); ?>" method="post" class="form-horizontal">
     
     
    
       	<table class="table">     	
            	
            <tr>
	    		<th class="col-sm-2">Nombre Categoría</th>
	    		<th class="col-sm-2">Nombre SubCategoía</th>
	    		<th class="col-sm-2">Año</th>
	    		<th class="col-sm-2">Identificación Cliente</th>
	    		<th >Nombre Cliente</th>
	    		
	    		
	  		</tr>
            <tr>
	            <td>
	            <select name="categorias" id="categorias"  class="form-control"   >
	                <option value="0"  > --TODOS--</option>
			    	 <?php foreach($resultCat as $resCat) {?>
					 		<?php if ($sel_categorias > 0){?>
					 			<option value="<?php echo $resCat->id_categorias; ?>"  <?php if ($resCat->id_categorias == $sel_categorias) {echo "selected"; }  ?>     > <?php echo $resCat->nombre_categorias; ?> </option>
					 		
					 		<?php  } else { ?>
					 			
					 			<option value="<?php echo $resCat->id_categorias; ?>"  > <?php echo $resCat->nombre_categorias; ?> </option>
					 		
					 		<?php }  ?>
	 		
				 	 <?php } ?>
				</select>
						        
				</td>				  
		
				<td>	       		
		          <select name="subcategorias" id="subcategorias"  class="form-control">
							<option value="0"  > --TODOS--</option>
				        <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
				        	<?php foreach($resultSub as $resSub) {?>
								<option value="<?php echo $resSub->id_subcategorias; ?>" <?php if ($resSub->id_subcategorias == $resEdit->id_subcategorias )  echo  ' selected="selected" '  ;  ?> ><?php echo $resSub->nombre_subcategorias; ?> </option>
						    <?php } ?>
					   		    
	     			     <?php } } else {?>
			
				    	 <?php foreach($resultSub as $resSub) {?>
					 		<?php if ($sel_subcategorias > 0){?>
					 				<option value="<?php echo $resSub->id_subcategorias;?>"  <?php if ($resSub->id_subcategorias == $sel_subcategorias) {echo "selected"; }  ?>     > <?php echo $resSub->nombre_subcategorias; ?> </option>
					 			<?php  } else { ?>
					 				<option value="<?php echo $resSub->id_subcategorias;?>" > <?php echo $resSub->nombre_subcategorias; ?> </option>
					 			<?php }  ?>
	 				 	 	<?php } ?>
						<?php } ?>
					</select>
		   		</td>
		
				<td>	       		
		          <select name="year" id="year"  class="form-control">
							<option value="0"  > --TODOS--</option>
				        <?php ?>
				        <?php for($i = date ("Y") ; $i > 1899 ; $i --) {?>
				         	<?php if ($sel_year > 0){?>
				         			<option value="<?php echo $i; ?>" <?php if ($i == $sel_year) {echo "selected"; }  ?>  ><?php echo $i; ?> </option>
				         		<?php  } else { ?>
				         			<option value="<?php echo $i; ?>" ><?php echo $i; ?> </option>
						    	<?php }  ?>
						    <?php } ?>
					   		    
	     			     		</select>
		   		</td>
		
		   		<td>
		   		 <?php 
		   		if($resultEdit !="" && !empty($resultCli))
		   		{
		   			$id_cliente=$resultEdit[0]->id_cliente_proveedor;
		   			
		   			foreach ($resultCli as $resCli)
		   			{
		   				if($id_cliente==$resCli->id_cliente_proveedor)
		   				{
		   					$nombre_cliente=$resCli->nombre_cliente_proveedor;
		   					$ruc_cliente = $resCli->ruc_cliente_proveedor;
		   					break;
		   				}
		   			}
		   			
		   			
		   		}
		   		?>
		   		
		   		
		   		 <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
					        	
						<input type="text" class="form-control" id="txt_ruc_cliente_proveedor_edit" name="txt_ruc_cliente_proveedor_edit" value="<?php  echo  $ruc_cliente; ?>">
                 		<input type="hidden"  id="ruc_cliente_proveedor" name="ruc_cliente_proveedor" value="<?php  echo  $resEdit->id_cliente_proveedor; ?>">	
					     <?php } } else {?>
					     
					     <input type="text" class="form-control" id="txt_ruc_cliente_proveedor" name="txt_ruc_cliente_proveedor" value=""  placeholder="Ingrese Identificación Cliente">
                 		 <input type="hidden"  id="ruc_cliente_proveedor" name="ruc_cliente_proveedor" value="0">									
						 <?php } ?>
						      		
           	 		
           		</td>
		
		   		<td>
		   		    <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
					       
					       	<input type="text" class="form-control" id="txt_nombre_cliente_proveedor_edit" name="txt_nombre_cliente_proveedor_edit" value="<?php echo  $nombre_cliente; ?>">
                 			<input type="hidden"  id="nombre_cliente_proveedor" name="nombre_cliente_proveedor" value="<?php  echo  $resEdit->id_cliente_proveedor; ?>">	
						   
						  <?php } } else {?>	
						  					 
						  <input type="text" class="form-control" id="txt_nombre_cliente_proveedor" name="txt_nombre_cliente_proveedor" value=""  placeholder="Ingrese Nombre Cliente">
                 		  <input type="hidden"  id="nombre_cliente_proveedor" name="nombre_cliente_proveedor" value="0">	
						 <?php } ?>
				         	 
					 
					<?php unset($resultCli);
						  unset($resCli);?>
		   		</td>
		
		   		</tr>
		
			
        </table>
		
		   			
		   		
		   	
      
      	<table class="table">
      
      
            <tr>
	    		
	    		<th>Fecha Documento Desde</th>
	    		<th>Fecha Documento Hasta</th>
	    		<th class="col-sm-3">Tipo Documento</th>
	    		<th class="col-sm-2">Número Carpeta</th>
	    		
	    		<th></th>
	    		
	  		</tr>
            
            <tr>
            
            	
            	<td>
            	
            	  <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
						
				 <input type="date"  name="fecha_documento_desde" id="fecha_documento_desde"  class="form-control"  value="<?php echo  date('d/m/Y', strtotime($resEdit->fecha_documentos_legal));  ?>"     /> 	
						    
				  <?php } } else {?>
				   	 <?php if ($sel_fecha_subida_desde == "" ) { ?>	
				   		<input type="date"  name="fecha_documento_desde" id="fecha_documento_desde"  class="form-control"   />
					 <?php } else {?>	
					 	<input type="date"  value="<?php echo $sel_fecha_documento_desde ?>"  name="fecha_documento_desde" id="fecha_documento_desde"   class="form-control"   />
					 <?php }?>        
				  <?php } ?>
		
            	
		   			
		   		</td>
		   		<td>
		   			<?php if ($sel_fecha_subida_desde == "" ) { ?>	
				   		<input type="date" data-val="0" name="fecha_documento_hasta"  id="fecha_documento_hasta"  class="form-control" />
					 <?php } else {?>	
					 	<input type="date" data-val="0" value="<?php echo $sel_fecha_documento_hasta ?>"  name="fecha_documento_hasta" id="fecha_documento_hasta"   class="form-control"   />
					 <?php }?>        
		   			
		   			
		   		</td>
		   		
		   		 
				 <td>
		   		<?php 
		   		if($resultEdit !="" && !empty($resultTip))
		   		{
		   			$id_tipo_documentos=$resultEdit[0]->id_tipo_documentos;
		   			
		   			foreach ($resultTip as $resTip)
		   			{
		   				if($id_tipo_documentos==$resTip->id_tipo_documentos)
		   				{
		   					$nombre_tipo_doc=$resTip->nombre_tipo_documentos;
		   					break;
		   				}
		   			}
		   			
		   			
		   		}
		   		?>
					 <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
					       	<input type="text" class="form-control" id="txt_tipo_documentos" name="txt_tipo_documentos_edit" value="<?php   echo  $nombre_tipo_doc ?>">
                 			<input type="hidden"  id="tipo_documentos" name="tipo_documentos" value="<?php  echo  $resEdit->id_tipo_documentos; ?>">
						   
						  <?php } } else {?>	
						  					 
						  <input type="text" class="form-control" id="txt_tipo_documentos" name="txt_tipo_documentos" value=""  placeholder="Ingrese Tipo Doc">
                 		  <input type="hidden"  id="tipo_documentos" name="tipo_documentos" value="0">
						 <?php } ?>
							 
				    <?php unset($resultTip);
						  unset($resTip)
					?>
		   		</td>
		
		   		<td>
		   		
		   		 <input type="text" class="form-control" id="carton_documentos" name="carton_documentos" value=""  placeholder="Ingrese Número Carpeta">
                 		 
		   			<!-- <select name="carton_documentos" id="carton_documentos"  class="form-control">
							<option value="0"  > --TODOS--</option>
					      <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
							 <?php foreach($resultCar as $resCar) {?>
								<option value="<?php echo $resCar->id_carton_documentos; ?>" <?php if ($resCar->id_carton_documentos == $resEdit->id_carton_documentos )  echo  ' selected="selected" '  ;  ?> ><?php echo $resCar->numero_carton_documentos; ?> </option>
						     <?php } ?>
					    
					      <?php } } else {?>
						 
							 <?php foreach($resultCar as $resCar) {?>
						 		<?php if ($sel_carton_documentos > 0){?>
						 			<option value="<?php echo $resCar->id_carton_documentos;?>"  <?php if ($resCar->id_carton_documentos == $sel_carton_documentos) {echo "selected"; }  ?>     > <?php echo $resCar->numero_carton_documentos; ?> </option>
					 			<?php  } else { ?>
					 			
					 				<option value="<?php echo $resCar->id_carton_documentos;?>" > <?php echo $resCar->numero_carton_documentos; ?> </option>
					 		
					 			<?php }  ?>
	 		
					 	 	<?php } ?>	
			        
						 <?php } ?>
						 
					</select>
					<?php unset($resultCar);
						  unset($resCar); ?>
						  
						   -->
		   		</td>
		
		   		<td>  	
		        	<?php if ($resultEdit !="" ) { ?>
		  	  			<input type="submit" value="Guardar" id="btnGuardar" name="btnGuardar" class="btn btn-success"/>
  	                <?php } else {?>
  	                	<input type="button" value="Buscar" id="btnBuscar" name="btnBuscar" class="btn btn-info"/>
  	                <?php } ?>
		        	
		        	
		        	
		        	
				</td>
			</tr>
      
      	</table>
      

		   		
      	
      

    
        
          <div id="Documentos" style="text-align: center;display:none;"></div><!-- Carga gif animado -->
		  <div class="Documentos"></div><!-- Datos ajax Final -->
		 
       
		 
		 
		       <select name="numero_poliza" id="numero_poliza"  class="form-control" style="visibility:hidden" >
				   		 <option value="0"  > --TODOS--</option>
		   			      <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
							 <?php foreach($resultPol as $resPol) {?>
								<option value="<?php echo $resPol->numero_poliza_documentos_legal; ?>" <?php if ($resPol->numero_poliza_documentos_legal == $resEdit->numero_poliza_documentos_legal )  echo  ' selected="selected" '  ;  ?> ><?php echo $resPol->numero_poliza_documentos_legal; ?> </option>
						     <?php } ?>
			
				
					      <?php } } else {?>
						 
							<?php foreach($resultPol as $resPol) {?>
						 		<?php if ($sel_numero_poliza > 0){?>
						 			<option value="<?php echo $resPol->numero_poliza_documentos_legal;?>"  <?php if ($resPol->numero_poliza_documentos_legal == $sel_numero_poliza) {echo "selected"; }  ?>     > <?php echo $resPol->numero_poliza_documentos_legal; ?> </option>
					 			<?php  } else { ?>
					 			
					 				<option value="<?php echo $resPol->numero_poliza_documentos_legal;?>" > <?php echo $resPol->numero_poliza_documentos_legal; ?> </option>
					 		
					 			<?php }  ?>
	 		
					 	 	<?php } ?>					        
						 <?php } ?>
		
					</select>
					<?php unset($resultPol);
						  unset($resPol); ?>
		   		
		
				
		   			<select name="cierre_ventas_soat" id="cierre_ventas_soat"  class="form-control" style="visibility:hidden">
							<option value="0"  > --TODOS--</option>
					      <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
							 <?php foreach($resultSoa as $resSoa) {?>
								<option value="<?php echo $resSoa->id_soat; ?>" <?php if ($resSoa->id_soat == $resEdit->id_soat )  echo  ' selected="selected" '  ;  ?> ><?php echo $resSoa->cierre_ventas_soat; ?> </option>
						     <?php } ?>
					    
					      <?php } } else {?>
						 
							 <?php foreach($resultSoa as $resSoa) {?>
						 		<?php if ($sel_cierre_ventas_soat > 0){?>
						 			<option value="<?php echo $resSoa->id_soat;?>"  <?php if ($resSoa->id_soat == $sel_cierre_ventas_soat) {echo "selected"; }  ?>     > <?php echo $resSoa->cierre_ventas_soat; ?> </option>
					 			<?php  } else { ?>
					 			
					 				<option value="<?php echo $resSoa->id_soat;?>" > <?php echo $resSoa->cierre_ventas_soat; ?> </option>
					 		
					 			<?php }  ?>
	 		
					 	 	<?php } ?>	
			        
						 <?php } ?>
					</select>
					<?php unset($resultSoa);
						  unset($resSoa);	?>
						  
						  
						  
						  <input type="hidden" name="fecha_subida_desde"  id="fecha_subida_desde"  class="form-control"  />
				          <input type="hidden" name="fecha_subida_hasta"  id="fecha_subida_hasta"  class="form-control"  />
							
		   			      <input type="hidden" name="fecha_poliza_desde"  id="fecha_poliza_desde"  class="form-control"  />
					 	  <input type="hidden" name="fecha_poliza_hasta"  id="fecha_poliza_hasta"  class="form-control"  />
					 	
		   		
		   		   	
        
        <!--termina paginacion ajax --> 	
  		
        </form>
        </div>
        </div>
        </section>
        </div>
		
		
		
        <?php include('view/modulos/footer.php'); ?>
	    <div class="control-sidebar-bg"></div>
	    </div>
       
    <div class="MsjAjaxForm"></div>
	<?php include "view/modulos/script.php"; ?>
    
   
 	  
    </body>  
</html>