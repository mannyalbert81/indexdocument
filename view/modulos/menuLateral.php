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

   <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
               	 <img src="view/images/logoidocument.png" class="img-responsive" alt="Responsive image" style="margin-top: 10px;" >
                    <a href="#">
                       Brand
                    </a>
                </li>
                <li>
                    <a href="#">Home</a>
                </li>
                <!-- para el menu administracion -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMINISTRACION <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                   <li style="<?php echo getcontrolador("Usuarios",$controladores) ?>">
					<a href="index.php?controller=Usuarios&action=index"><span class="glyphicon glyphicon-user" > Usuarios</span></a>
				    </li>
                    <li style="<?php echo getcontrolador("Roles",$controladores) ?>">
					<a href="index.php?controller=Roles&action=index"> <span class=" glyphicon glyphicon-asterisk" aria-hidden="true"> Roles de Usuario</span> </a>
					</li>
					
					<li style="<?php echo getcontrolador("PermisosRoles",$controladores) ?>">
					<a href="index.php?controller=PermisosRoles&action=index"><span class="glyphicon glyphicon-plus" aria-hidden="true"> Permisos Roles</span> </a>
		            </li>
                  </ul>
                </li>
                 <!--termina menu administracion -->
                 
                  <!-- para el menu administracion -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMINISTRACION <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                   <li style="<?php echo getcontrolador("Usuarios",$controladores) ?>">
					<a href="index.php?controller=Usuarios&action=index"><span class="glyphicon glyphicon-user" > Usuarios</span></a>
				    </li>
                    <li style="<?php echo getcontrolador("Roles",$controladores) ?>">
					<a href="index.php?controller=Roles&action=index"> <span class=" glyphicon glyphicon-asterisk" aria-hidden="true"> Roles de Usuario</span> </a>
					</li>
					
					<li style="<?php echo getcontrolador("PermisosRoles",$controladores) ?>">
					<a href="index.php?controller=PermisosRoles&action=index"><span class="glyphicon glyphicon-plus" aria-hidden="true"> Permisos Roles</span> </a>
		            </li>
                  </ul>
                </li>
                 <!--termina menu administracion -->
                 
                <li>
                    <a href="#">About</a>
                </li>
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="https://twitter.com/maridlcrmn">Follow me</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
  