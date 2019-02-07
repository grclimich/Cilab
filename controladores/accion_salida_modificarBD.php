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
include ("../modelos/clase_accion_salida.php");
  include("../BD.php");
  $accion_salida=new accion_salida();
  $obj=new conexion();
  $obj->conectar();
  
  
  $id=$_SESSION['id_s'];
  $razon_salida= $_REQUEST['razon_salida'];
  $accion_salida->id_s=$id;
  $accion_salida->razon_salida=$razon_salida;
  
  if($_POST['modificar']=='Modificar'){
  $accion_salida->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_ACCION_DE_SALIDA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Accion de Salida Moficada con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from accion_salida where id_s ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_ACCION_DE_SALIDA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Accion de Salida Eliminada con Exito...') </script>";
  }
?>
</body>
</html>
