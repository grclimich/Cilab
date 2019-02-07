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
  include ("../modelos/clase_accion_salida.php");
  $accion_salida=new accion_salida(); 
  $obj=new conexion();
  $obj->conectar();
 
  
  $id_s=$_REQUEST['id_s'];
  $razon_salida= $_REQUEST['razon_salida'];
    
  $accion_salida->id_s=$id_s;
  $accion_salida->razon_salida=$razon_salida;
  
  if($_REQUEST['incluir']){
  
     $accion_salida->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/accion_salida_incluir.php'>";	//Envio hacia otra página
	 echo "<script> alert('Accion de Salida Registrado con Exito...') </script>";	 
  }
?>
</body>
</html>
