<!DOCTYPE HTML>
<html lang="es">
      <head>
        <title>Usuarios - aDocument 2015</title>
         <?php include("view/modulos/links.php"); ?>
      </head>
      <body onload="pone_users_registrados();">
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
         <li class="active">Inicio</li>
         </ol>
         </section>

         
       
         <section class="content">
			 <div class='col-lg-12 col-md-12 col-xs-12' style="margin-top: 1px;">
			 <div class='col-lg-8 col-md-8 col-xs-12'>
			 </div>
			 <div class='col-lg-4 col-md-4 col-xs-12'>
			 <div class='col-lg-9 col-md-9 col-xs-12' >
			 					<div class="input-group margin-bottom-sm" >
			                    <span class="input-group-addon" style='background: #5c667a;'><i class="fa fa-search" style='color: white;'></i></span>
								<input class="form-control" type="search" id="q" style='background: #5c667a; color: white;' name="q" placeholder="Search.." onkeyup="pone_users_registrados(1)">
								</div>
			 </div>
			 <div class='col-lg-3 col-md-3 col-xs-12'>
			 					<button type='button' class='btn btn-danger pull-right' onclick='nuevo_usr();' id='btn-reg-usr'>Nuevo</button>
			 </div>
			 </div>
			 </div>

  							
	         <div class='col-lg-12 col-md-12 col-xs-12'>
	         <div id='users_registrados'></div>
	         <div id='nuevo_usuario'></div>
	         </div>
         </section>
         
         
       
         
         </div>
  
  
	    <?php include('view/modulos/footer.php'); ?>
	    <div class="control-sidebar-bg"></div>
	    </div>
	  
	  
	        
	    <div class="MsjAjaxForm"></div>
	    <?php include "view/modulos/script.php"; ?>
	    <script src="view/adminLTE/plugins/morris/morris.min.js"></script>
	    <script src="view/adminLTE/plugins/morris/raphael-min.js"></script>
	    <script src="view/adminLTE/dist/js/source_parameters.js"></script> 
 		
     </body>  
    </html>   