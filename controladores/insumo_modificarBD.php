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
include ("../modelos/clase_insumo.php");
  include("../BD.php");
  $insumo=new insumo();
  $obj=new conexion();
  $obj->conectar();
  
  
  $id=$_SESSION['cod_i'];
   $tipo_p= $_REQUEST['tipo_p'];
  $descripcion= $_REQUEST['descripcion'];
  $presentacion=$_REQUEST['presentacion'];
  $almacen= $_REQUEST['almacen'];
  $observacion=$_REQUEST['observacion']; 
  
  $insumo->cod_i=$id;
  $insumo->tipo_p=$tipo_p;
  $insumo->descripcion=$descripcion;
  $insumo->presentacion=$presentacion;
  $insumo->almacen=$almacen;
  $insumo->observacion=$observacion;
  
  if($_POST['modificar']=='Modificar'){
  $insumo->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIOINSUMO.php'>";	//Envio hacia otra página
	 echo "<script> alert('Insumo Modificado con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from insumo where cod_i ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIOINSUMO.php'>";	//Envio hacia otra página
	 echo "<script> alert('Insumo Eliminado con Exito...') </script>";
  }
?>
</body>
</html>
