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
  include("../BD.php");
  include ("clase_usuarios.php");
  $usuario=new usuario(); 
  $obj=new conexion();
  $obj->conectar();
 
  
  $nombre_usuario=$_SESSION['nombre_usuario'];
  $pass=$_REQUEST['pass'];
  
  $usuario->nombre_usuario=$nombre_usuario;
    $usuario->pass=$pass;

  
  if($_REQUEST['incluir']){
  
     $usuario->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=usuarios_buscar.php'>";	//Carga de nuevo la pagina
	 echo "<script> alert('usuario Registrado con Exito...') </script>";	 
  }
?>
</body>
</html>
