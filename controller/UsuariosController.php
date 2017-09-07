<?php
class UsuariosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
  
    
    public function index11(){
    	
    	session_start();
    	$rol=new RolesModel();
    	$resultRol = $rol->getAll("nombre_rol");
    
    	$estado = new EstadoModel();
    	$resultEst = $estado->getAll("nombre_estado");
    	
    	$nuevo = (isset($_REQUEST['nuevo'])&& $_REQUEST['nuevo'] !=NULL)?$_REQUEST['nuevo']:'';
    	if($nuevo!=""){
    		
    		$html="";
    		$html.='<div class="panel panel-info" style="margin-top:20px;">';
    		$html.='<div class="panel-heading">';
    		$html.='<h4><i class="glyphicon glyphicon-edit"></i> Insertar Usuarios</h4>';
    		$html.='</div>';
    		$html.='<div class="panel-body">';
    		$html.='<div class="row">';
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		$html.='<label for="nombre_usuario" class="control-label">Nombres Usuario</label>';
    		$html.='<input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value=""  placeholder="Nombres">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		$html.='<label for="usuario_usuario" class="control-label">Usuario</label>';
    		$html.='<input type="text" class="form-control" id="usuario_usuario" name="usuario_usuario" value=""  placeholder="Usuario">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		$html.='<label for="clave_usuario" class="control-label">Password</label>';
    		$html.='<input type="password" class="form-control" id="clave_usuario" name="clave_usuario" value=""  placeholder="Password">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		$html.='<label for="clave_usuario_r" class="control-label">Repita Password</label>';
    		$html.='<input type="password" class="form-control" id="clave_usuario_r" name="clave_usuario_r" value=""  placeholder="Repita Password">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="row">';
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		$html.='<label for="telefono_usuario" class="control-label">Teléfono Usuario</label>';
    		$html.='<input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" value=""  placeholder="Teléfono">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		$html.='<label for="celular_usuario" class="control-label">Celular Usuario</label>';
    		$html.='<input type="text" class="form-control" id="celular_usuario" name="celular_usuario" value=""  placeholder="Celular">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="col-xs-6 col-md-6">';
    		$html.='<div class="form-group">';
    		$html.='<label for="correo_usuario" class="control-label">Correo Usuario</label>';
    		$html.='<input type="text" class="form-control" id="correo_usuario" name="correo_usuario" value=""  placeholder="Correo">';
    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		$html.='<div class="row">';
    		$html.='<div class="col-xs-6 col-md-3">';
    		$html.='<div class="form-group">';
    		
							    		$html.='<label for="id_rol" class="control-label">Rol </label>';
							    		$html.='<select name="id_rol" id="id_rol"  class="form-control" >';
							    		$html.='<option value="" selected="selected">--Seleccione--</option>';
							    		foreach ($resultRol as $res)
							    		{
							    			$html.='<option value="'.$res->id_rol.'">'.$res->nombre_rol.'</option>';
							    			 
							    		}
							    		$html.='</select> ';
							    		$html.='<span class="help-block"></span>';
    		$html.='</div>';
    		$html.='</div>';
    		
    		            
			    		
			    		$html.='<div class="col-xs-6 col-md-3">';
			    		$html.='<div class="form-group">';
			    		                                $html.=' <label for="id_estado" class="control-label">Estado </label>';
    		                                $html.=' <select name="id_estado" id="id_estado"  class="form-control" >';
    		                                $html.='<option value="" selected="selected">--Seleccione--</option>';
    		                                foreach ($resultEst as $res)
    		                                {
    		                                	$html.='<option value="'.$res->id_estado.'">'.$res->nombre_estado.'</option>';
    		                                	 
    		                                }
    										
    										$html.=' </select> ';
    		                                $html.='<span class="help-block"></span>';
    		            $html.='</div>';
    		            $html.='</div>';
    					$html.='</div>';
    			         
    			        $html.='<div class="row">';
    				    $html.='<div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; margin-top:40px">';
    				    $html.='<div class="form-group">';
    		                                  $html.='<button type="submit" id="Guardar" name="Guardar" onclick="registra_usr();" class="btn btn-success">Guardar</button>';
    		            $html.='</div>';
    				    $html.='</div>';
    				    $html.='</div>';
    			         
    			         
    			        $html.=' </div>';
    			        $html.='</div>';
    		
    		
    			        echo $html;
    			        die();
    	}
    	
    	
    }
    
    public function index10(){
    	
    	session_start();
    	$usuarios = new UsuariosModel();
    	$columnas = "usuarios.clave_usuario, usuarios.id_usuario,  usuarios.nombre_usuario, usuarios.usuario_usuario ,  usuarios.telefono_usuario, usuarios.celular_usuario, usuarios.correo_usuario, rol.nombre_rol, estado.nombre_estado, rol.id_rol, estado.id_estado ";
    	$tablas   = "public.rol,  public.usuarios, public.estado";
    	$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado";
    	$id       = "usuarios.id_usuario";
    	
    	
    	$where_to = "";
    	
    	
    	
    	
    	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    	
    	if($action == 'ajax')
    	{
    		 
    		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    		$q =    (isset($_REQUEST['q'])&& $_REQUEST['q'] !=NULL)?$_REQUEST['q']:'';
    		
    		
    			 
    			if($q!=""){$where_to=" AND (usuarios.nombre_usuario like '%$q%' OR usuarios.usuario_usuario like '%$q%' OR usuarios.correo_usuario like '%$q%' OR rol.nombre_rol like '%$q%' OR estado.nombre_estado like '%$q%')";}
    			 
    			 
    			$where_to= $where. $where_to;
    		
    		
    		$html="";
    		$resultSet=$usuarios->getCantidad("*", $tablas, $where_to);
    		$cantidadResult=(int)$resultSet[0]->total;
    		
    		
    		$per_page = 10; //la cantidad de registros que desea mostrar
    		$adjacents  = 10; //brecha entre páginas después de varios adyacentes
    		$offset = ($page - 1) * $per_page;
    	
    		$limit = " LIMIT   '$per_page' OFFSET '$offset'";
    	
    	
    		$resultSet=$usuarios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
    	
    		$count_query   = $cantidadResult;
    	
    		$total_pages = ceil($cantidadResult/$per_page);
    	
    		if ($cantidadResult>0)
    		{
    	
    			$html.='<div class="pull-left">';
    			$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
    			$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
    			$html.='</div><br><br>';
    			$html.='<section style="height:400px; overflow-y:auto;">';
    			$html.='<table class="table table-hover">';
    			$html.='<thead>';
    			$html.='<tr class="info">';
    			$html.='<th style="text-align: left;  font-size: 12px;">Nombre</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Usuario</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Teléfono</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Celular</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Correo</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Rol</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Estado</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;"></th>';
    			$html.='<th style="text-align: left;  font-size: 12px;"></th>';
    			$html.='</tr>';
    			$html.='</thead>';
    			$html.='<tbody>';
    	
    			foreach ($resultSet as $res)
    			{
    				$html.='<tr>';
    				$html.='<td style="font-size: 11px;">'.$res->nombre_usuario.'</td>';
    				$html.='<td style="font-size: 11px;">'.$res->usuario_usuario.'</td>';
    				$html.='<td style="font-size: 11px;">'.$res->telefono_usuario.'</td>';
    				$html.='<td style="font-size: 11px;">'.$res->celular_usuario.'</td>';
    				$html.='<td style="font-size: 11px;">'.$res->correo_usuario.'</td>';
    				$html.='<td style="font-size: 11px;">'.$res->nombre_rol.'</td>';
    				$html.='<td style="font-size: 11px;">'.$res->nombre_estado.'</td>';
    				$html.='<td style="font-size: 11px;">';
    					
    				
    				$html.='</td>';
    				$html.='</tr>';
    			}
    	
    			$html.='</tbody>';
    			$html.='</table>';
    			$html.='</section>';
    			$html.='<div class="table-pagination pull-right">';
    			$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
    			$html.='</div>';
    			$html.='</section>';
    	
    				
    	
    		}else{
    	
    			$html.='<div class="alert alert-warning alert-dismissable">';
    			$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    			$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
    			$html.='</div>';
    	
    		}
    	
    		echo $html;
    		die();
    	
    	
    	}else
    	{
    		//en caso de q la carga de datos venga por controlador
    			
    		$page = 1;
    			
    		$per_page = 10; //la cantidad de registros que desea mostrar
    		$adjacents  = 10; //brecha entre páginas después de varios adyacentes
    		$offset = ($page - 1) * $per_page;
    			
    		$limit = " LIMIT   '$per_page' OFFSET '$offset'";
    			
    			
    		$resultSet=$usuarios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
    			
    		$total_pages = ceil($cantidadResult/$per_page);
    			
    		$filaspaginacion=$this->paginate("index.php", $page, $total_pages, $adjacents);
    			
    	}
    	
    	
    	
    	
    }
    
    
    
    
    
    public function paginate($reload, $page, $tpages, $adjacents) {
    
    	$prevlabel = "&lsaquo; Prev";
    	$nextlabel = "Next &rsaquo;";
    	$out = '<ul class="pagination pagination-large">';
    
    	// previous label
    
    	if($page==1) {
    		$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
    	} else if($page==2) {
    		$out.= "<li><span><a href='javascript:void(0);' onclick='pone_users_registrados(1)'>$prevlabel</a></span></li>";
    	}else {
    		$out.= "<li><span><a href='javascript:void(0);' onclick='pone_users_registrados(".($page-1).")'>$prevlabel</a></span></li>";
    
    	}
    
    	// first label
    	if($page>($adjacents+1)) {
    		$out.= "<li><a href='javascript:void(0);' onclick='pone_users_registrados(1)'>1</a></li>";
    	}
    	// interval
    	if($page>($adjacents+2)) {
    		$out.= "<li><a>...</a></li>";
    	}
    
    	// pages
    
    	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
    	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
    	for($i=$pmin; $i<=$pmax; $i++) {
    		if($i==$page) {
    			$out.= "<li class='active'><a>$i</a></li>";
    		}else if($i==1) {
    			$out.= "<li><a href='javascript:void(0);' onclick='pone_users_registrados(1)'>$i</a></li>";
    		}else {
    			$out.= "<li><a href='javascript:void(0);' onclick='pone_users_registrados(".$i.")'>$i</a></li>";
    		}
    	}
    
    	// interval
    
    	if($page<($tpages-$adjacents-1)) {
    		$out.= "<li><a>...</a></li>";
    	}
    
    	// last
    
    	if($page<($tpages-$adjacents)) {
    		$out.= "<li><a href='javascript:void(0);' onclick='pone_users_registrados($tpages)'>$tpages</a></li>";
    	}
    
    	// next
    
    	if($page<$tpages) {
    		$out.= "<li><span><a href='javascript:void(0);' onclick='pone_users_registrados(".($page+1).")'>$nextlabel</a></span></li>";
    	}else {
    		$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
    	}
    
    	$out.= "</ul>";
    	return $out;
    }
   
    
    
public function index(){
	
		session_start();
		if (isset(  $_SESSION['usuario_usuario']) )
		{
				//Creamos el objeto usuario
			$rol=new RolesModel();
			$resultRol = $rol->getAll("nombre_rol");
			
			
			$estado = new EstadoModel();
			$resultEst = $estado->getAll("nombre_estado");
			
			$resultMenu=array(0=>'--TODOS--',1=>'Nombre', 2=>'Usuario', 3=>'Correo', 4=>'Rol');
			
	
			$usuarios = new UsuariosModel();

			$nombre_controladores = "Usuarios";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $usuarios->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
			
			
					$columnas = "usuarios.clave_usuario, usuarios.id_usuario,  usuarios.nombre_usuario, usuarios.usuario_usuario ,  usuarios.telefono_usuario, usuarios.celular_usuario, usuarios.correo_usuario, rol.nombre_rol, estado.nombre_estado, rol.id_rol, estado.id_estado ";
					$tablas   = "public.rol,  public.usuarios, public.estado";
					$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado";
					$id       = "usuarios.nombre_usuario"; 
			
					
					//Conseguimos todos los usuarios
					$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
					
					
					if (isset ($_POST["criterio"])  && isset ($_POST["contenido"])  )
				{
						
					
					/*	
					$columnas = "documentos_legal.id_documentos_legal,  documentos_legal.fecha_documentos_legal, categorias.nombre_categorias, subcategorias.nombre_subcategorias, tipo_documentos.nombre_tipo_documentos, cliente_proveedor.nombre_cliente_proveedor, carton_documentos.numero_carton_documentos, documentos_legal.paginas_documentos_legal, documentos_legal.fecha_desde_documentos_legal, documentos_legal.fecha_hasta_documentos_legal, documentos_legal.ramo_documentos_legal, documentos_legal.numero_poliza_documentos_legal, documentos_legal.ciudad_emision_documentos_legal, soat.cierre_ventas_soat,   documentos_legal.creado  ";
					$tablas   = "public.documentos_legal, public.categorias, public.subcategorias, public.tipo_documentos, public.carton_documentos, public.cliente_proveedor, public.soat";
					$where    = "categorias.id_categorias = subcategorias.id_categorias AND subcategorias.id_subcategorias = documentos_legal.id_subcategorias AND tipo_documentos.id_tipo_documentos = documentos_legal.id_tipo_documentos AND carton_documentos.id_carton_documentos = documentos_legal.id_carton_documentos AND cliente_proveedor.id_cliente_proveedor = documentos_legal.id_cliente_proveedor   AND documentos_legal.id_soat = soat.id_soat ";
					$id       = "documentos_legal.fecha_documentos_legal, carton_documentos.numero_carton_documentos";
					*/	
					
					
					
					$columnas = " usuarios.clave_usuario, usuarios.id_usuario,  usuarios.nombre_usuario, usuarios.usuario_usuario ,  usuarios.telefono_usuario, usuarios.celular_usuario, usuarios.correo_usuario, rol.nombre_rol, estado.nombre_estado, rol.id_rol, estado.id_estado ";
					$tablas   = "public.rol,  public.usuarios, public.estado";
					$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado";
					$id       = "usuarios.nombre_usuario"; 
					

					$criterio = $_POST["criterio"];
					$contenido = $_POST["contenido"];
						
					
					//$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
						
					if ($contenido !="")
					{
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						
							
						switch ($criterio) {
							case 0:
								$where_0 = " ";
								break;
							case 1:
								//Ruc Cliente/Proveedor
								$where_1 = " AND  usuarios.nombre_usuario LIKE '$contenido'";
								break;
							case 2:
								//Nombre Cliente/Proveedor
								$where_2 = " AND usuarios.usuario_usuario LIKE '$contenido'";
								break;
							case 3:
								//Número Carton
								$where_3 = " AND usuarios.correo_usuario LIKE '$contenido'";
								break;
							case 4:
								//Número Poliza
								$where_4 = " AND rol.nombre_rol LIKE '$contenido' ";
								break;
							
						}
							
							
							
						$where_to  = $where .  $where_0 . $where_1 . $where_2 . $where_3 . $where_4 ;
							
							
						$resul = $where_to;
						
						//Conseguimos todos los usuarios con filtros
						$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where_to, $id);
							
							
							
							
					}
				}
					
					
					
					
					$resultEdit = "";
			
					if (isset ($_GET["id_usuario"])   )
					{
						$_id_usuario = $_GET["id_usuario"];
						$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado AND usuarios.id_usuario = '$_id_usuario' "; 
						$resultEdit = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id); 
					}
			
					
					$this->view("Usuarios",array(
							"resultSet"=>$resultSet, "resultRol"=>$resultRol, "resultEdit" =>$resultEdit, "resultEst"=>$resultEst, "resultMenu"=>$resultMenu
				
					));
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Usuarios"
			
				));
			
			
			}
			
		
		}
		else 
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
			
			
			
		}
		
	}
	
	public function InsertaUsuarios(){
			
		$resultado = null;
		$usuarios=new UsuariosModel();
	
	
		
		//_nombre_categorias character varying, _path_categorias character varying
		if (isset ($_POST["usuario_usuario"]) && isset ($_POST["nombre_usuario"]) && isset ($_POST["clave_usuario"]) && isset($_POST["id_rol"])  )
		{
            
		
			
			$_nombre_usuario     = $_POST["nombre_usuario"];
			
			$_clave_usuario      = $_POST["clave_usuario"];
			
			$_telefono_usuario   = $_POST["telefono_usuario"];
			$_celular_usuario    = $_POST["celular_usuario"];
			$_correo_usuario     = $_POST["correo_usuario"];
		    $_id_rol             = $_POST["id_rol"];
		    $_id_estado          = $_POST["id_estado"];
		    $_usuario_usuario     = $_POST["usuario_usuario"];
	
	
			$funcion = "ins_usuarios";
			$parametros = " '$_nombre_usuario' ,'$_clave_usuario' , '$_telefono_usuario', '$_celular_usuario', '$_correo_usuario' , '$_id_rol', '$_id_estado' , '$_usuario_usuario'";
			$usuarios->setFuncion($funcion);
	        $usuarios->setParametros($parametros);
	        $resultado=$usuarios->Insert();
	
			/*
			 $this->view("Categorias",array(
			 "resultado"=>$resultado
			 ));
	
			*/
	
		}
		$this->redirect("Usuarios", "index");
			
	}
	
	public function borrarId()
	{
		if(isset($_GET["id_usuario"]))
		{
			$id_usuario=(int)$_GET["id_usuario"];
	
			$usuarios=new UsuariosModel();
				
			$usuarios->deleteBy(" id_usuario",$id_usuario);
				
				
		}
	
		$this->redirect("Usuarios", "index");
	}
	
    
    
    public function Login(){
    
    	//Creamos el objeto usuario
    	$usuarios=new UsuariosModel();
    
    	//Conseguimos todos los usuarios
    	$allusers=$usuarios->getLogin();
    	 
    	//Cargamos la vista index y l e pasamos valores
    	$this->view("Login",array(
    			"allusers"=>$allusers
    	));
    }
    public function Bienvenida(){
    
    	//Creamos el objeto usuario
    	$usuarios=new UsuariosModel();
    	
    	//Conseguimos todos los usuarios
    	$allusers=$usuarios->getLogin();
    	
    	//Cargamos la vista index y l e pasamos valores
    	$this->view("Bienvenida",array(
    			"allusers"=>$allusers
    	));
    }
    
    
    
    
    public function Loguear(){
    	
    	header("Expires: Sat, 01 De enero de 2000 00:00:00 GMT"); header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); header("Cache-Control: post-check=0, pre-check=0",false); session_cache_limiter("must-revalidate");
    	
    	
    	if (isset ($_POST["usuario"]) && ($_POST["clave"] ) )
    	
    	{
    		$usuarios=new UsuariosModel();
    		$_usuario = $_POST["usuario"];
    		$_clave =   $_POST["clave"];
    		
    		
    		
    		
    		$where = "  usuario_usuario = '$_usuario' AND  clave_usuario ='$_clave' ";
    	
    		$result=$usuarios->getBy($where);

    		$usuario_usuario = "";
    		$id_rol  = "";
    		$nombre_usuario = "";
    		$correo_usuario = "";
    		$ip_usuario = "";
    		
    		if ( !empty($result) )
    		{ 
    			foreach($result as $res) 
    			{
    				$id_usuario  = $res->id_usuario;
    				$usuario_usuario  = $res->usuario_usuario;
	    			$id_rol           = $res->id_rol;
	    			$nombre_usuario   = $res->nombre_usuario;
	    			$correo_usuario   = $res->correo_usuario;
	    			
    			}	
    			//obtengo ip
    			$ip_usuario = $usuarios->getRealIP();
    			
    			
    			///registro sesion
    			$usuarios->registrarSesion($id_usuario, $usuario_usuario, $id_rol, $nombre_usuario, $correo_usuario, $ip_usuario, $_clave);
    			
    			//inserto en la tabla
    			$_id_usuario = $_SESSION['id_usuario'];
    			$_ip_usuario = $_SESSION['ip_usuario'];
    			
    			$sesiones = new SesionesModel();

    			$funcion = "ins_sesiones";
    			
    			$parametros = " '$_id_usuario' ,'$_ip_usuario' ";
    			$sesiones->setFuncion($funcion);
				
				$_id_rol=$_SESSION['id_rol'];
    			$usuarios->MenuDinamico($_id_rol);
    			
    			$sesiones->setParametros($parametros);
    			
    			
    			$resultado=$sesiones->Insert();
    			
    		    $this->view("Bienvenida",array(
    				"allusers"=>$_usuario
	    		));
    		}
    		else
    		{
    			
	    		$this->view("Login",array(
	    				"allusers"=>""
	    		));
    		}
    		
    	} 
    	else
    	{
    		session_start();
    		
    		if(isset($_SESSION['id_usuario']))
    		{
    			$_usuario=$_SESSION['nombre_usuario'];
    			
    			$this->view("Bienvenida",array(
    					"allusers"=>$_usuario
    			));
    			
    		}else{
    		
    		$this->view("Login",array(
    				"allusers"=>""
    		));
    	   }
    		
    	}
    	
    }
    
	public function  cerrar_sesion ()
	{
		session_start();
		session_destroy();
		$this->redirect("Usuarios", "Loguear");
	}
	
	
	public function Actualiza ()
	{
		session_start();
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			//Creamos el objeto usuario
			$usuarios = new UsuariosModel();
		
						
					
				$resultEdit = "";
					
				$_id_usuario = $_SESSION['id_usuario'];
				$where    = " usuarios.id_usuario = '$_id_usuario' ";
				$resultEdit = $usuarios->getBy($where);
				

				if ( isset($_POST["guardar"]) )
				{

					$_nombre_usuario     = $_POST["nombre_usuario"];
					$_clave_usuario      = $_POST["clave_usuario"];
					$_telefono_usuario   = $_POST["telefono_usuario"];
					$_celular_usuario    = $_POST["celular_usuario"];
					$_correo_usuario     = $_POST["correo_usuario"];
					$_usuario_usuario     = $_POST["usuario_usuario"];
					
					$colval   = " nombre_usuario = '$_nombre_usuario' , clave_usuario = '$_clave_usuario'   , telefono_usuario = '$_telefono_usuario' ,  celular_usuario = '$_celular_usuario' , correo_usuario = '$_correo_usuario' , usuario_usuario = '$_usuario_usuario'    ";
					$tabla    = "usuarios";
					$where    = " id_usuario = '$_id_usuario' ";
					
					$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
					
					
					$this->view("Login",array(
							"allusers"=>""
					));
					
					
				}
				else
				{
					$this->view("ActualizarUsuario",array(
							"resultEdit" =>$resultEdit
								
					));
					
				}
				
				
					
		
			
		
		}
		else
		{
			$this->view("ErrorSesion",array(
			"resultSet"=>""
			));
					
		}
		
	}
	
	
	
}
?>
