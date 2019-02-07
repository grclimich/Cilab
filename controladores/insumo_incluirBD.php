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
  include ("../modelos/clase_insumo.php");
  $insumo=new insumo(); 
  $obj=new conexion();
  $obj->conectar();
 
  
  $cod_i=$_REQUEST['cod_i'];
  $tipo_p=$_REQUEST['tipo_p'];
  $descripcion= $_REQUEST['descripcion'];
  $presentacion=$_REQUEST['presentacion'];
  $almacen= $_REQUEST['almacen'];
  $observacion=$_REQUEST['observacion'];
  
  $insumo->cod_i=$cod_i;
    $insumo->tipo_p=$tipo_p;
  $insumo->descripcion=$descripcion;
  $insumo->presentacion=$presentacion;
  $insumo->almacen=$almacen;
  $insumo->observacion=$observacion;
  
  if($_REQUEST['incluir']){
  
     $insumo->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/insumo_incluir.php'>";	//Carga de nuevo la pagina
	 echo "<script> alert('Insumo Registrado con Exito...') </script>";	 
  }
?>
</body>
</html>
