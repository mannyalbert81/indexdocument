   <!DOCTYPE HTML>
<html lang="es">
      <head>
        <title>Permisos Rol - aDocument 2015</title>
         <?php include("view/modulos/links.php"); ?>
         
		
          <link rel="stylesheet" href="view/adminLTE/plugins/datatables/dataTables.bootstrap.css">
          
      
      </head>
      <body onload="lista_permisos();">
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
          <div class='nav-tabs-custom'>
          		<ul id="myTabs" class="nav nav-tabs pull-right">
                  <li id="nav-cambiar"><a href="#cambios" data-toggle="tab" >Actualizar</a></li>
                  <li id="nav-add"><a href="#nuevo" data-toggle="tab">Agregar</a></li>
                  <li id="nav-listado" class="active"><a href="#listado" data-toggle="tab">Listado</a></li>
                  <li class="pull-left header"><i class="fa fa-file-text"></i> Panel de Permisos Roles.</li>
                </ul>
         
         
 		   <div class="tab-content">
           <div class="tab-pane active" id="listado">
           <div id='permisos_registrados'></div>
           </div>
                  
                  
            <div class="tab-pane" id="nuevo">
            <form class="form-horizontal">
              <div class='form-group'>
                    <label for="nombre_permisos_rol" class="col-sm-2 control-label">Nombre Permisos Rol:</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="nombre_permisos_rol" id='nombre_permisos_rol' placeholder='nombre permiso rol...'>
                    </div>
                    </div>
            
             
			
		  
		  <div class='form-group'>
                    <label for="id_rol" class="col-sm-2 control-label">Rol:</label>
                    <div class="col-sm-3">
                     <select name="id_rol" id="id_rol"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultRol as $res) {?>
										<option value="<?php echo $res->id_rol; ?>" ><?php echo $res->nombre_rol; ?> </option>
							    
							        <?php } ?>
								   </select> 
                    </div>
                    </div>
		    
		 
			  <div class='form-group'>
                    <label for="id_controladores" class="col-sm-2 control-label">Controlador:</label>
                    <div class="col-sm-3">
                     <select name="id_controladores" id="id_controladores"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultCon as $res) {?>
										<option value="<?php echo $res->id_controladores; ?>" ><?php echo $res->nombre_controladores; ?> </option>
							    
							        <?php } ?>
								   </select> 
                    </div>
                    </div>
            
         
                <div class='form-group'>
                    <label for="ver_permisos_rol" class="col-sm-2 control-label">Ver:</label>
                    <div class="col-sm-3">
                     <select name="ver_permisos_rol" id="ver_permisos_rol"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
                                  <option value="TRUE">Permitir</option>
						          <option value="FALSE">Denegar</option>
				    </select> 
                    </div>
                    </div>
                    
                    
                    <div class='form-group'>
                    <label for="editar_permisos_rol" class="col-sm-2 control-label">Editar:</label>
                    <div class="col-sm-3">
                     <select name="editar_permisos_rol" id="editar_permisos_rol"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
                                  <option value="TRUE">Permitir</option>
						          <option value="FALSE">Denegar</option>
				    </select> 
                    </div>
                    </div>
                    
                     <div class='form-group'>
                    <label for="borrar_permisos_rol" class="col-sm-2 control-label">Borrar:</label>
                    <div class="col-sm-3">
                     <select name="borrar_permisos_rol" id="borrar_permisos_rol"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
                                  <option value="TRUE">Permitir</option>
						          <option value="FALSE">Denegar</option>
				    </select> 
                    </div>
                    </div>
	
	    <br>
               
                  
                    <div class="btn-group">
                    <button type='button' class='btn btn-raised btn-primary btn-lg' onclick='NuevoPermiso();' id='btn-nuevo'><i class='fa fa-check-circle'></i> Registrar Permiso.</button>
                    <button type='button' class='btn btn-danger btn-raised btn-lg' onclick='CancelaNuevoPermiso();' id='btn-nuevo-cancela'><i class='fa fa-times'></i> Cancelar.</button>
                    </div>
                    </form>
                  </div>
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
   
	 
    <script src="view/adminLTE/dist/js/source_permisos.js"></script> 
 	
 	
 		
 		
     </body>  
    </html>   