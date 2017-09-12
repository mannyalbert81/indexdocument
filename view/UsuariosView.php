<!DOCTYPE HTML>
<html lang="es">
      <head>
        <title>Usuarios - aDocument 2015</title>
         <?php include("view/modulos/links.php"); ?>
           <link rel="stylesheet" href="view/adminLTE/plugins/datatables/dataTables.bootstrap.css">
      </head>
      <body onload="lista_usuarios();">
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
         <li class="active">Usuarios</li>
         </ol>
         </section>

         
       
         <section class="content">
          <div class='nav-tabs-custom'>
          		<ul id="myTabs" class="nav nav-tabs pull-right">
                  <li id="nav-cambiar"><a href="#cambios" data-toggle="tab" >Actualizar</a></li>
                  <li id="nav-add"><a href="#nuevo" data-toggle="tab">Agregar</a></li>
                  <li id="nav-listado" class="active"><a href="#listado" data-toggle="tab">Listado</a></li>
                  <li class="pull-left header"><i class="fa fa-file-text"></i> Panel de Usuarios.</li>
                </ul>
         
         
 		   <div class="tab-content">
           <div class="tab-pane active" id="listado">
           <div id='users_registrados'></div>
           </div>
                  
                  
            <div class="tab-pane" id="nuevo">
            <form class="form-horizontal">
              <div class='form-group'>
                    <label for="nombre_usuario" class="col-sm-2 control-label">Nombres:</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="nombre_usuario" id='nombre_usuario' placeholder='nombre usuario...'>
                    <span class="help-block"></span>
                    </div>
                    </div>
            
              <div class='form-group'>
                    <label for="usuario_usuario" class="col-sm-2 control-label">Usuario:</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="usuario_usuario" id='usuario_usuario' placeholder='usuario...'>
                    </div>
                    </div>
           
			 <div class='form-group'>
                    <label for="clave_usuario" class="col-sm-2 control-label">Password:</label>
                    <div class="col-sm-3">
                    <input type="password" class="form-control" name="clave_usuario" id='clave_usuario' placeholder='password...'>
                    </div>
                    </div>
			
           
		     <div class='form-group'>
                    <label for="clave_usuario_r" class="col-sm-2 control-label">Repita Password:</label>
                    <div class="col-sm-3">
                    <input type="password" class="form-control" name="clave_usuario_r" id='clave_usuario_r' placeholder='confirme password...'>
                    </div>
                    </div>
                    
                    
		      <div class='form-group'>
                    <label for="telefono_usuario" class="col-sm-2 control-label">Teléfono:</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control cantidades" name="telefono_usuario" id='telefono_usuario' placeholder='teléfono...' >
                    </div>
                    </div>
		   
             <div class='form-group'>
                    <label for="celular_usuario" class="col-sm-2 control-label">Celular:</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control cantidades" name="celular_usuario" id='celular_usuario' placeholder='celular...' >
                    </div>
                    </div>
              
		 	 <div class='form-group'>
                    <label for="correo_usuario" class="col-sm-2 control-label">Correo:</label>
                    <div class="col-sm-3">
                    <input type="email" class="form-control" name="correo_usuario" id='correo_usuario' placeholder='mail addres...'>
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
                    <label for="id_estado" class="col-sm-2 control-label">Estado:</label>
                    <div class="col-sm-3">
                     <select name="id_estado" id="id_estado"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultEst as $res) {?>
										<option value="<?php echo $res->id_estado; ?>" ><?php echo $res->nombre_estado; ?> </option>
							    
							        <?php } ?>
								   </select> 
                    </div>
                    </div>
            
         
	
	    <br>
               
                  
                    <div class="btn-group">
                    <button type='button' class='btn btn-raised btn-primary btn-lg' onclick='NuevoUsuario();' id='btn-nuevo'><i class='fa fa-check-circle'></i> Registrar Usuario.</button>
                    <button type='button' class='btn btn-danger btn-raised btn-lg' onclick='CancelaNuevoUsuario();' id='btn-nuevo-cancela'><i class='fa fa-times'></i> Cancelar.</button>
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
   
	 
    <script src="view/adminLTE/dist/js/source_parameters.js"></script> 
 	
 	
 		
 		
     </body>  
    </html>   