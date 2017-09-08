<!DOCTYPE HTML>
<html lang="es">
    <head>
     <title>Bienvenido - aDocument 2015</title>
      <?php include("view/modulos/links.php"); ?>
      <link rel="stylesheet" href="view/adminLTE/plugins/datatables/dataTables.bootstrap.css">
       <link rel="stylesheet" href="view/adminLTE/css/cssroles.css">
    </head>
    <body  style="background-color: #F6FADE;"  onload="lista_roles();">
     <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('view/modulos/head.php');
        ?>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('view/modulos/slide.php');
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php
          echo "IndexDocument";
          ?>
            <small><?php echo $fecha; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $helper->url("usuarios","Loguear"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Roles Usuario</li>
          </ol>
        </section>

        <!-- Para el contenido -->
        <section class="content">
        
           <!-- Your Page Content Here -->
          <div class='row'>
           <div class='col-md-12'>
             <div class='nav-tabs-custom'>
                  <ul id="myTabs" class="nav nav-tabs pull-right">
                  <li id="nav-cambiar" ><a href="#editar" data-toggle="tab">Editar</a></li>
                  <li id="nav-add"><a href="#nuevo" data-toggle="tab">Agregar</a></li>
                  <li id="nav-listado" class="active"><a href="#listado" data-toggle="tab">Listado</a></li>

                  <li class="pull-left header"><i class="fa fa-file-text"></i> Roles Usuarios.</li>
                </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="listado">
                    	<div id='listaRoles'>
           		        </div>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="nuevo">
                    <form class="form-horizontal" id="frmAgregar">

                    <div class='form-group'>
                    <label for="nombre_rol" class="col-sm-2 control-label">Nombre Rol::</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id='nombre_rol' placeholder='nombre rol...'>
                    </div>
                    </div>

                    <br>
                    <div class="btn-group">
                    <button type='button' class='btn btn-raised btn-primary btn-lg' onclick='nuevoRol();' id='btn-nuevo'><i class='fa fa-check-circle'></i> Registrar Rol.</button>
                    <button type='button' class='btn btn-danger btn-raised btn-lg' onclick='cancelaNuevoRol();' id='btn-nuevo-cancela'><i class='fa fa-times'></i> Cancelar.</button>
                    </div>
                    </form>
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="editar">
                    <form class='form-horizontal' onkeypress="return anular(event)">
                    <div id="div-codigo-buscar" class='form-group'>
                    <label for="codigo_editar" class="col-sm-2 control-label">Rol:</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id='codigo_editar' onchange='busca_articulo_cambio();'  placeholder='buscar...'>
                    </div>
                    </div>

                    <div id='info_rol_editar'></div>
                    <br>
                    <div class="btn-group">
                    <button type='button' class='btn btn-primary btn-lg' onclick='busca_articulo_cambio();' id='btn-buscar-editar'><i class='fa fa-search'></i> Buscar...</button>
                    <button type='button' class='btn btn-success btn-lg' onclick='actualizarRegistro();' id='btn-procede-editar' disabled><i class='fa fa-check-circle'></i> Actualizar...</button>
                    <button type='button' class='btn btn-danger btn-lg' onclick='cancela_editar_rol();' id='btn-cancela-editar' disabled ><i class='fa fa-recycle'></i> Cancelar...</button>
                    </div>

                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->

             </div>
           </div>

           <div class='col-md-12'>
           <div id='lista_articulos'>
           </div>
           </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php include('view/modulos/footer.php'); ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper --> 
    
    <div class="MsjAjaxForm"></div>
    <?php include "view/modulos/script.php"; ?>
    <script src="view/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="view/adminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>  
    <script src="view/adminLTE/plugins/noty/packaged/jquery.noty.packaged.min.js"></script> 
    <script src="view/adminLTE/dist/js/source_roles.js"></script> 
 		
    </body>
</html>