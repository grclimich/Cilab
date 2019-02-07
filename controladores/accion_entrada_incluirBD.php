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
  include ("../modelos/clase_accion_entrada.php");
  $accion_entrada=new accion_entrada(); 
  $obj=new conexion();
  $obj->conectar();
 
  
  $id_e=$_REQUEST['id_e'];
  $razon_entrada= $_REQUEST['razon_entrada'];
    
  $accion_entrada->id_e=$id_e;
  $accion_entrada->razon_entrada=$razon_entrada;
  
  if($_REQUEST['incluir']){
  
     $accion_entrada->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/accion_entrada_incluir.php'>";
	 echo "<script> alert('Accion de Entrada Registrada con Exito...') </script>";	 
  }
?>
</body>
</html>
