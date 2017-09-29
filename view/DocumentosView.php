<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        <title>Busqueda de Documentos - aDocument 2015</title>
          <?php include("view/modulos/links.php"); ?>
          
          <script type="text/javascript">
          $(document).ready(function(){
        	  lista_documentos();
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
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        ?>
      </aside>
       
     
		
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
                
          
       
        <div class="tab-content">
        <div class="tab-pane active" id="listado" >
         <form class="form-horizontal">
             <div class="panel panel-default" style="background: #F5F5DC no-repeat fixed right bottom;">      
  		     <div class="panel-body">
			      <div class="row">
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="categorias" class="control-label">Nombre Categoría:</label>
                    <select name="categorias" id="categorias"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultCat as $res) {?>
								  <option value="<?php echo $res->id_categorias; ?>" ><?php echo $res->nombre_categorias; ?> </option>
							       <?php } ?>
					</select>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
                    
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="subcategorias" class="control-label">Nombre SubCategoría:</label>
                    <select name="subcategorias" id="subcategorias"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultSub as $res) {?>
								  <option value="<?php echo $res->id_subcategorias; ?>" ><?php echo $res->nombre_subcategorias; ?> </option>
							       <?php } ?>
					</select>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
                    
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="year" class="control-label">Año:</label>
                    <select name="year" id="year"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
                                   <?php for($i = date ("Y") ; $i > 1899 ; $i--) {?>
									<option value="<?php echo $i; ?>" ><?php echo $i; ?> </option>
							       <?php } ?>
					</select>
					<span class="help-block"></span>
                    </div>	
                    </div>
                    
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="txt_ruc_cliente_proveedor" class="control-label">Identificación Cliente:</label>
                    <input type="text" class="form-control" name="txt_ruc_cliente_proveedor" id='txt_ruc_cliente_proveedor' placeholder='identificación cliente...'>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
                    <div class="col-sm-3" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="txt_nombre_cliente_proveedor" class="control-label">Nombre Cliente:</label>
                    <input type="text" class="form-control" name="txt_nombre_cliente_proveedor" id='txt_nombre_cliente_proveedor' placeholder='nombre cliente...'>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
  				  </div>
  				  
  				  
  				   <div class="row">
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="fecha_documento_desde" class="control-label">Fecha Documento Desde:</label>
                    <input type="date" class="form-control" name="fecha_documento_desde" id='fecha_documento_desde'>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="fecha_documento_hasta" class="control-label">Fecha Documento Hasta:</label>
                    <input type="date" class="form-control" name="fecha_documento_hasta" id='fecha_documento_hasta' >
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
                    
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="txt_tipo_documentos" class="control-label">Tipo Documento:</label>
                    <input type="text" class="form-control" name="txt_tipo_documentos" id='txt_tipo_documentos' placeholder='tipo documentos...'>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                    
                    <div class="col-sm-2" style="margin-left: 5px;">
                    <div class='form-group'>
                    <label for="carton_documentos" class="control-label">Número Carpeta:</label>
                    <input type="text" class="form-control" name="carton_documentos" id='carton_documentos' placeholder='número carpeta...'>
                    <span class="help-block"></span>
                    </div>	
                    </div>
                   
                    
  				  </div>
  			  </div>
  			  </div>
  			  
  			   <div id='documentos_registrados'></div>
  			  
         </form>
         </div
         </div>
		 </div>
         </section>
         </div>
		
		
        <?php include('view/modulos/footer.php'); ?>
	    <div class="control-sidebar-bg"></div>
	    </div>
       
    <div class="MsjAjaxForm"></div>
	<?php include "view/modulos/script.php"; ?>
    <script src="view/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="view/adminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>  
    <script src="view/adminLTE/plugins/noty/packaged/jquery.noty.packaged.min.js"></script> 
    <script src="view/adminLTE/dist/js/source_documentos.js"></script> 
     
    </body>  
    </html>