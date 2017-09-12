<?php

class RolesController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}

	public function index12(){
	
		session_start();
			
		$i=0;
		$roles=new RolesModel();
		$columnas = " id_rol";
		$tablas   = "rol";
		$where    = "id_rol >0 ";
		$id       = "id_rol";
			
		$resultSet = $roles->getCondiciones($columnas ,$tablas ,$where, $id);
			
		
	
		$i=count($resultSet);
	
		$html="";
		if($i>0)
		{
	
			$html .= "<div class='col-lg-3 col-xs-6'>";
			$html .= "<div class='small-box bg-yellow'>";
			$html .= "<div class='inner'>";
			$html .= "<h3>$i</h3>";
			$html .= "<p>Roles Registrados.</p>";
			$html .= "</div>";
	
	
			$html .= "<div class='icon'>";
			$html .= "<i class='ion ion-calendar'></i>";
			$html .= "</div>";
			$html .= "<a href='index.php?controller=Roles&action=index' class='small-box-footer'>Operaciones con Roles <i class='fa fa-arrow-circle-right'></i></a>";
			$html .= "</div>";
			$html .= "</div>";
	
	
		}else{
	
			$html = "<b>Actualmente no hay permisos registrados...</b>";
		}
	
		echo $html;
		die();
	
	
	}

	public function index(){
	
		//Creamos el objeto usuario
     	$roles=new RolesModel();
					//Conseguimos todos los usuarios
		$resultSet=$roles->getAll("id_rol");
				
		$resultEdit = "";

		
		session_start();

	
		if (isset(  $_SESSION['usuario_usuario']) )
		{

			$nombre_controladores = "Roles";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $roles->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
			if (!empty($resultPer))
			{
				if (isset ($_GET["id_rol"])   )
				{

					$nombre_controladores = "Roles";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $roles->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
						
					if (!empty($resultPer))
					{
					
						$_id_rol = $_GET["id_rol"];
						$columnas = " id_rol, nombre_rol ";
						$tablas   = "rol";
						$where    = "id_rol = '$_id_rol' "; 
						$id       = "nombre_rol";
							
						$resultEdit = $roles->getCondiciones($columnas ,$tablas ,$where, $id);

					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Editar Roles"
					
						));
					
					
					}
					
				}
		
				
				$this->view("Roles",array(
						"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			
				));
		
				
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Roles"
				
				));
				
				exit();	
			}
				
		}
		else 
		{
				$this->view("Login",array(
						"resultSet"=>""
			
				));
		
		}
	
	}
	
	public function InsertaRoles(){
			
		session_start();
		
		$permisos_rol=new PermisosRolesModel();
		$nombre_controladores = "Roles";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{
			
			$resultado = null;
			$roles=new RolesModel();
			
			
			if (isset ($_POST['nombre_rol']))				
			{
				
				$_nombre_rol = $_POST["nombre_rol"];
				 
				$funcion = "ins_rol";
				$parametros = " '$_nombre_rol'  ";
					
				$roles->setFuncion($funcion);
		
				$roles->setParametros($parametros);
		
				$resultado=$roles->Insert();
				
				//ver estado del insertado
				if (strpos($resultado, "Error") !== false) {
					//hyaerror
					echo "error";
				}else{
					//no hay error
					echo "1";
				}
			}
			
		}
		else
		{
			
		}
		
	}
	
	public function borrarId()
	{
		session_start();
		$permisos_rol=new PermisosRolesModel();
		$nombre_controladores = "Roles";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosBorrar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
		$html="";	
		if (!empty($resultPer))
		{
			if(isset($_POST["id_rol"]))
			{
				$id_rol=(int)$_POST["id_rol"];
		
				$roles=new RolesModel();
				
				$roles->deleteBy(" id_rol",$id_rol);
				
			}
		
		}
		else
		{
			
		}
		
	}
	
	
	public function Reporte(){
	
		//Creamos el objeto usuario
		$roles=new RolesModel();
		//Conseguimos todos los usuarios
		
	
	
		session_start();
	
	
		if (isset(  $_SESSION['usuario']) )
		{
			$resultRep = $roles->getByPDF("id_rol, nombre_rol", " nombre_rol != '' ");
			$this->report("Roles",array(	"resultRep"=>$resultRep));
	
		}
					
	
	}
	
	public function listaRoles()
	{
		$roles=new RolesModel();
		$html="";
		
		session_start();
		
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			$nombre_controladores = "Roles";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $roles->getPermisosVer(" controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
				
				$columnas = " id_rol, nombre_rol ";
				$tablas   = "rol";
				$where    = "1=1";
				$id       = "nombre_rol";
					
				$dtRoles = $roles->getCondiciones($columnas ,$tablas ,$where, $id);
				
				if(!empty($dtRoles))
				{
					
					$html .= "<div class='box box-primary'>";
					$html .= "<div class='box-header'>";
					$html .= "<h3 class='box-title'>Roles registrados.</h3>";
					$html .= "</div>";
					$html .= "<div class='box-body'>";
					$html .= "<table id='tabla_roles' class='table table-hover table-condensed'>";
					$html .= "<thead>";
					$html .= "<tr>";
					$html .= "<th></th><th style='text-align: left;  font-size: 14px;'>Codigo</th><th style='text-align: left;  font-size: 14px;'>Descripcion Rol</th>";
					$html .= "</tr>";
					$html .= "</thead>";
					$html .= "<tbody>";
					
					foreach ($dtRoles as $res)
					{
					
						$html .= "<tr><td></td>";
						$html .= "<td style='font-size: 13px;'>".$res->id_rol."</td>";
						$html .= "<td style='font-size: 13px;'>".$res->nombre_rol."</td>";
						$html .= "</tr>";
					}
					$html .= "</tbody>";
					$html .= "</table>";
					$html .= "</div>";
					$html .= "</div>";
				}else{
					$html = "<b>Actualmente no hay roles registrados...</b>";
				}
			}
			else
			{
				$html ="";
			}
		}
		
			echo $html;
		
	}
	
	public function editarRoles()
	{
		$roles=new RolesModel();
		$html="";
		session_start();
		
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			if(isset($_POST['id_rol']))
			{
				$idrol=$_POST['id_rol'];
				$dtRoles = $roles->getBy("id_rol='$idrol'");
				
				if(!empty($dtRoles))
				{
					foreach ($dtRoles as $res)
					{
						$html.=$this->agregarelementoFormulario("",$res->id_rol,'id_rol','hidden');
						
						$html.=$this->agregarelementoFormulario("Nombre Rol:",$res->nombre_rol,'nombre_rol_edit');
						
					}
				}else{$html="0";}
				
			}
		}else 
		{
			$html ="";
		}
		
		echo $html;
	}
	
	public function actualizarRoles()
	{
		$roles=new RolesModel();
		$html="";
		session_start();
	
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			if(isset($_POST['id_rol']))
			{
				if($_POST['id_rol']>0)
				{
					$edit_nombre=$_POST['nombre_rol'];
					$edit_id=$_POST['id_rol'];
					$colval = " nombre_rol = '$edit_nombre'";
					$tabla = "rol";
					$where = "id_rol = '$edit_id'";
					$resultado=$roles->UpdateBy($colval, $tabla, $where);
					
					$html="1";
				}
			}
		}else
		{
			$html ="";
		}
	
		echo $html;
	}
	
	 private function agregarelementoFormulario($titulo=null,$value=null,$key=null,$type='text')
	{
		return  "<div class='form-group'>
				 <label class='col-sm-2 control-label' for='$key'>$titulo</label>
			     <div class='col-sm-3'>
			     <input type='$type' id='$key' class='form-control' value='$value' />
			    </div>
			    </div>";
	}
	
}
?>