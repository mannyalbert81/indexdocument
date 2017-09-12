<?php

class PermisosRolesController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}

	public function index12(){
	
		session_start();
		 
		$i=0;
		$permisos_rol = new PermisosRolesModel();
		$columnas = "permisos_rol.id_permisos_rol";
		$tablas   = "public.controladores,  public.permisos_rol, public.rol";
		$where    = " controladores.id_controladores = permisos_rol.id_controladores AND permisos_rol.id_rol = rol.id_rol";
		$id       = " permisos_rol.id_permisos_rol";
		$resultSet = $permisos_rol->getCondiciones($columnas ,$tablas ,$where, $id);
	
		$i=count($resultSet);
	
		$html="";
		if($i>0)
		{
	
			$html .= "<div class='col-lg-3 col-xs-6'>";
			$html .= "<div class='small-box bg-red'>";
			$html .= "<div class='inner'>";
			$html .= "<h3>$i</h3>";
			$html .= "<p>Permisos Registrados.</p>";
			$html .= "</div>";
	
	
			$html .= "<div class='icon'>";
			$html .= "<i class='ion ion-stats-bars'></i>";
			$html .= "</div>";
			$html .= "<a href='index.php?controller=PermisosRoles&action=index' class='small-box-footer'>Operaciones con permisos <i class='fa fa-arrow-circle-right'></i></a>";
			$html .= "</div>";
			$html .= "</div>";
	
	
		}else{
			 
			$html = "<b>Actualmente no hay permisos registrados...</b>";
		}
	
		echo $html;
		die();
	
	
	}
	
	public function lista_permisos(){
		 
		session_start();
	    $permisos_rol = new PermisosRolesModel();
	    $columnas = "permisos_rol.id_permisos_rol, rol.nombre_rol, permisos_rol.nombre_permisos_rol, controladores.nombre_controladores, permisos_rol.ver_permisos_rol, permisos_rol.editar_permisos_rol, permisos_rol.borrar_permisos_rol  ";
	    $tablas   = "public.controladores,  public.permisos_rol, public.rol";
	    $where    = " controladores.id_controladores = permisos_rol.id_controladores AND permisos_rol.id_rol = rol.id_rol";
	    $id       = " permisos_rol.id_permisos_rol";
	    	
		 
		$resultSet = $permisos_rol->getCondiciones($columnas ,$tablas ,$where, $id);
		 
		 
		$html="";
		if(!empty($resultSet))
		{
	
			$html .= "<div class='box box-primary'>";
			$html .= "<div class='box-header'>";
			$html .= "</div>";
			$html .= "<div class='box-body'>";
			$html .= "<table id='tabla_permisos' class='table table-hover table-condensed'>";
			$html .= "<thead>";
			$html .= "<tr>";
			$html.='<th style="text-align: left;  font-size: 12px;">Nombre Permisos Rol</th>';
			$html.='<th style="text-align: left;  font-size: 12px;">Nombre Rol</th>';
			$html.='<th style="text-align: left;  font-size: 12px;">Nombre Controlador</th>';
			$html.='<th style="text-align: left;  font-size: 12px;">Ver</th>';
			$html.='<th style="text-align: left;  font-size: 12px;">Editar</th>';
			$html.='<th style="text-align: left;  font-size: 12px;">Borrar</th>';
			
	
			$html.='</tr>';
			$html.='</thead>';
			$html.='<tbody>';
			 
			foreach ($resultSet as $res)
			{
				
			$ver="";
			$editar="";
			$borrar="";
			
				if ($res->ver_permisos_rol =="t"){ $ver="Si";}else{$ver="No";};
				if ($res->editar_permisos_rol == "t"){ $editar= "Si";}else{$editar= "No";};
				if ($res->borrar_permisos_rol == "t"){ $borrar= "Si";}else{$borrar= "No";};
			
				$html.='<tr>';
				$html.='<td style="font-size: 11px;">'.$res->nombre_permisos_rol.'</td>';
				$html.='<td style="font-size: 11px;">'.$res->nombre_rol.'</td>';
				$html.='<td style="font-size: 11px;">'.$res->nombre_controladores.'</td>';
				$html.='<td style="font-size: 11px;">'.$ver.'</td>';
				$html.='<td style="font-size: 11px;">'.$editar.'</td>';
				$html.='<td style="font-size: 11px;">'.$borrar.'</td>';
				$html.='</tr>';
			}
			 
			$html .= "</tbody>";
			$html .= "</table>";
			$html .= "</div>";
			$html .= "</div>";
	
			 
		}else{
			 
			$html = "<b>Actualmente no hay permisos registrados...</b>";
		}
		 
		echo $html;
		die();
		 
		 
		 
		 
		 
		 
		 
	}
	
	

	public function index(){
	
		session_start();
	
	
		if (isset(  $_SESSION['usuario_usuario']) )
		{
	
			$permisos_rol = new PermisosRolesModel();
			
		     		$rol = new RolesModel();
					$resultRol=$rol->getAll("nombre_rol");
					
					$controladores=new ControladoresModel();
					$resultCon=$controladores->getAll("nombre_controladores");
			
				
					$this->view("PermisosRoles",array(
							"resultCon"=>$resultCon, "resultRol"=>$resultRol
					));
		}
		else
		{
	
			$this->view("Login",array(
					"resultSet"=>""
		
						));
		}
	
	}
	
	
	public function InsertaPermisosRoles(){

		session_start();
		
		$resultado = null;
		$permisos_rol=new PermisosRolesModel();
	
		if (isset ($_POST["nombre_permisos_rol"]) )
			
		{
			$_nombre_permisos_rol = $_POST["nombre_permisos_rol"];
			$_id_controladores = $_POST["id_controladores"];
			$_ver_permisos_rol = $_POST["ver_permisos_rol"];
			$_editar_permisos_rol = $_POST["editar_permisos_rol"];
			$_borrar_permisos_rol = $_POST["borrar_permisos_rol"];
			$_id_rol = $_POST["id_rol"];
		
			 
				$funcion = "ins_permisos_rol";
				$parametros = " '$_nombre_permisos_rol' ,'$_id_controladores' , '$_ver_permisos_rol' , '$_editar_permisos_rol', '$_borrar_permisos_rol', '$_id_rol' ";
         		$permisos_rol->setFuncion($funcion);
				$permisos_rol->setParametros($parametros);
				$resultado=$permisos_rol->Insert();
				

				if (strpos($resultado, "Error") !== false) {
					echo "error";
				}else{
					echo "1";
				}
			
	
		}
		
	}
	
	

	
}
?>