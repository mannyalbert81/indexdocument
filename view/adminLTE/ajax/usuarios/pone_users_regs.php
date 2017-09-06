<?php
session_start();

error_reporting(0);

$conn  = pg_connect("user=postgres port=5432 password=.Romina.2012 dbname=ad_vivienda host=186.4.203.42");

$usuarios   = pg_query($conn,"SELECT count(*) AS numrows FROM usuarios, entidades, usuarios WHERE entidades.id_entidades = plan_cuentas.id_entidades AND
		entidades.id_entidades = usuarios.id_entidades AND usuarios.id_usuarios='$_id_usuarios' AND nivel_plan_cuentas='5' AND (plan_cuentas.codigo_plan_cuentas LIKE '%".$q."%' OR plan_cuentas.nombre_plan_cuentas LIKE '%".$q."%')");
	
$columnas = "usuarios.clave_usuario, usuarios.id_usuario,  usuarios.nombre_usuario, usuarios.usuario_usuario ,  usuarios.telefono_usuario, usuarios.celular_usuario, usuarios.correo_usuario, rol.nombre_rol, estado.nombre_estado, rol.id_rol, estado.id_estado ";
$tablas   = "public.rol,  public.usuarios, public.estado";
$where    = "rol.id_rol = usuarios.id_rol AND estado.id_estado = usuarios.id_estado";
$id       = "usuarios.nombre_usuario";



$db=new ConexionMySQL();

$cadena="Select * from usuarios";
$exe=$db->consulta($cadena);
if($db->numero_de_registros($exe)>0){
  echo "<div class='box box-primary'>";
  echo "<div class='box-header'>";
  echo "<h3 class='box-title'>Usuarios registrados.</h3>";
  echo "</div>";
  echo "<div class='box-body'>";
 echo "<table id='tabla_users' class='table table-hover table-condensed'>";
 echo "<thead>";
 echo "<tr>";
 echo "<th>Nombre</th>";
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>";
 while($e=$db->buscar_array($exe)){
   echo "<tr>";
   echo "<td style='text-align: center;'>".strtoupper($e['nombre'])."</td>";
   echo "</tr>";
 }
 echo "</tbody>";
 echo "</table>";
 echo "</div>";
 echo "</div>";
}else{
 echo "<b>Actualmente no hay usuarios registrados...</b>";
}
?>