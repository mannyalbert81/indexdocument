<?php
class UsuariosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
  
 
    public function index12(){
    	 
    	session_start();
    	
    	$i=0;
    	$usuarios = new UsuariosModel();
    	$columnas = "usuarios.id_usuario";
    	$tablas   = "public.rol,  public.usuarios, public.estado";
    	$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado";
    	$id       = "usuarios.id_usuario";
    	 
    	 
    	 
    	$resultSet = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
    	 
    	$i=count($resultSet);
    	 
    	$html="";
    	if($i>0)
    	{
    
    		$html .= "<div class='col-lg-3 col-xs-6'>";
    		$html .= "<div class='small-box bg-green'>";
    		$html .= "<div class='inner'>";
    		$html .= "<h3>$i</h3>";
    		$html .= "<p>Usuarios Registrados.</p>";
    		$html .= "</div>";
    		
    		
    		$html .= "<div class='icon'>";
    		$html .= "<i class='ion ion-person-add'></i>";
    		$html .= "</div>";
    		$html .= "<a href='index.php?controller=Usuarios&action=index' class='small-box-footer'>Operaciones con usuarios <i class='fa fa-arrow-circle-right'></i></a>";
    		$html .= "</div>";
    		$html .= "</div>";
    		
    			 
    	}else{
    		 
    		$html = "<b>Actualmente no hay usuarios registrados...</b>";
    	}
    	 
    	echo $html;
    	die();
    	 
    	 
    	 
    	 
    	 
    	 
    	 
    }
   
    
    public function index10(){
    	
    	session_start();
    	$usuarios = new UsuariosModel();
    	$columnas = "usuarios.clave_usuario, usuarios.id_usuario,  usuarios.nombre_usuario, usuarios.usuario_usuario ,  usuarios.telefono_usuario, usuarios.celular_usuario, usuarios.correo_usuario, rol.nombre_rol, estado.nombre_estado, rol.id_rol, estado.id_estado ";
    	$tablas   = "public.rol,  public.usuarios, public.estado";
    	$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado";
    	$id       = "usuarios.id_usuario";
    	
    	
    	
    	$resultSet = $usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
    	
    	
    	$html="";
    	if(!empty($resultSet))
    	{
    		
    		$html .= "<div class='box box-primary'>";
    		$html .= "<div class='box-header'>";
    		$html .= "</div>";
    		$html .= "<div class='box-body'>";
    		$html .= "<table id='tabla_usuarios' class='table table-hover table-condensed'>";
    		$html .= "<thead>";
    		$html .= "<tr>";
    			$html.='<th style="text-align: left;  font-size: 12px;">Nombre</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Usuario</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Teléfono</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Celular</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Correo</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Rol</th>';
    			$html.='<th style="text-align: left;  font-size: 12px;">Estado</th>';
    		
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
    			
    				$html.='</tr>';
    			}
    	
    			$html .= "</tbody>";
    			$html .= "</table>";
    			$html .= "</div>";
    			$html .= "</div>";
    				
    	
    		}else{
    	
    			$html = "<b>Actualmente no hay usuarios registrados...</b>";
    		}
    	
    		echo $html;
    		die();
    	
    	
    	
    	
    	
    	
    	
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
			
		
			$usuarios = new UsuariosModel();

			
					
					$this->view("Usuarios",array(
							"resultRol"=>$resultRol, "resultEst"=>$resultEst
				
					));
				
		}
		else 
		{
			$this->view("Login",array(
					"resultSet"=>""
		
			));
			
			
			
		}
		
	}
	
	public function InsertaUsuarios(){
			
		session_start();
		$resultado = null;
		$usuarios=new UsuariosModel();
	
	
		if (isset ($_POST["nombre_usuario"]) )
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
	
	        if (strpos($resultado, "Error") !== false) {
	        	echo "error";
	        }else{
	        	echo "1";
	        }
	
		}
	
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
