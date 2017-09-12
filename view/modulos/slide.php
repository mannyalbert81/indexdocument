<?php 
$controladores=$_SESSION['controladores'];
 function getcontrolador($controlador,$controladores){
 	$display="display:none";
 	
 	if (!empty($controladores))
 	{
 	foreach ($controladores as $res)
 	{
 		if($res->nombre_controladores==$controlador)
 		{
 			$display= "display:block";
 			break;
 			
 		}
 	}
 	}
 	
 	return $display;
 }
?>


<section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="view/images/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nombre_usuario'] ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>

         
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
         
            <li class="treeview"  style="<?php echo getcontrolador("MenuAdministracion",$controladores) ?>">
              <a href="#"><i class="fa fa-cogs"></i> <span>ADMINISTRACIÓN.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li style="<?php echo getcontrolador("Usuarios",$controladores) ?>"><a href="<?php echo $helper->url("Usuarios","index"); ?>"><i class="fa fa-user"></i> Usuarios</a></li>
                <li style="<?php echo getcontrolador("Roles",$controladores) ?>"><a href="<?php echo $helper->url("Roles","index"); ?>"><i class="fa fa-asterisk"></i> Roles Usuarios</a></li>
                <li style="<?php echo getcontrolador("PermisosRoles",$controladores) ?>"><a href="<?php echo $helper->url("PermisosRoles","index"); ?>"><i class="fa fa-unlock-alt"></i> Permisos Roles</a></li>
              </ul>
            </li>
            
            
             <li class="treeview">
              <a href="#"><i class="fa fa-cogs"></i> <span>GESTIÓN </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DOCUMENTAL.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $helper->url("Documentos","index"); ?>"><i class="fa fa-user"></i> Búsqueda de </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Documentos</a></li>
                <li><a href="<?php echo $helper->url("DocumentosClienteProveedor","index"); ?>"><i class="fa fa-asterisk"></i> Búsqueda Categorias + </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cliente / Proveedor + </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agencias</a></li>
                <li><a href="<?php echo $helper->url("DocumentosNumeroCredito","index"); ?>"><i class="fa fa-unlock-alt"></i> Búsqueda Categorias + </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Número de Crédito</a></li>
              </ul>
            </li>
            
            
               <li class="treeview">
              <a href="#"><i class="fa fa-cogs"></i> <span>INFORMES.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $helper->url("Categorias","ReporteTotal"); ?>"><i class="fa fa-user"></i> Documentos por </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categorías</a></li>
                <li><a href="<?php echo $helper->url("SubCategorias","ReporteTotal"); ?>"><i class="fa fa-asterisk"></i> Documentos por </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SubCategorías</a></li>
                <li><a href="<?php echo $helper->url("Documentos","BuscaxCarton"); ?>"><i class="fa fa-unlock-alt"></i> Documentos por Carpeta</a></li>
                <li><a href="<?php echo $helper->url("CartonDocumentos","ReporteTotal"); ?>"><i class="fa fa-unlock-alt"></i> Listado de Carpetas </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registrados</a></li>
              </ul>
            </li>
            
            
             <li class="treeview"  style="<?php echo getcontrolador("MenuUtilitarios",$controladores) ?>">
              <a href="#"><i class="fa fa-cogs"></i> <span>UTILITARIOS.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li style="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="<?php echo $helper->url("Documentos","ActualizarDocumentos"); ?>"><i class="fa fa-user"></i> Actualizar Documentos</a></li>
                <li style="<?php echo getcontrolador("RegistroCartonDocumentos",$controladores) ?>"><a href="<?php echo $helper->url("RegistroCartonDocumentos","index"); ?>"><i class="fa fa-asterisk"></i> Registrar Carpeta</a></li>
                <li style="<?php echo getcontrolador("Categorias",$controladores) ?>"><a href="<?php echo $helper->url("Categorias","index"); ?>"><i class="fa fa-unlock-alt"></i> Categorias</a></li>
                <li style="<?php echo getcontrolador("SubCategorias",$controladores) ?>"><a href="<?php echo $helper->url("SubCategorias","index"); ?>"><i class="fa fa-unlock-alt"></i> Subcategorias</a></li>
              </ul>
            </li>
            
          </ul><!-- /.sidebar-menu -->
          
</section>