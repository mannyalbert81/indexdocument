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
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        
        ?>
      </aside>
 
       
	   <?php
       $sel_menu = "";
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	$sel_menu=$_POST['criterio'];
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
         <li class="active">Inicio</li>
         </ol>
         </section>

       
       
       
       
      
        <section class="content">
         <div class='col-lg-12'>
         <div id='users_registrados'></div>
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