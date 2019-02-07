<?php
   session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
include ("clase_usuarios.php");
  include("../BD.php");
  $usuario=new usuario();
  $obj=new conexion();
  $obj->conectar();
  
  
  $id=$_SESSION['nombre_usuario'];
   $pass= $_REQUEST['pass'];
$id_usuario=$_SESSION['id_usuario'];
  
  $usuario->nombre_usuario=$id;
  $usuario->pass=$pass;
  $usuario->id_usuario=$id_usuario;

  
  if($_POST['modificar']=='Modificar'){
  $usuario->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=usuarios_buscar.php'>";	//Envio hacia otra página
	 echo "<script> alert('usuario Modificado con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from usuario where nombre_usuario ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=FORMULARIOusuario.php'>";	//Envio hacia otra página
	 echo "<script> alert('usuario Eliminado con Exito...') </script>";
  }
?>
</body>
</html>
