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
  include("../modelos/clase_salida_insumo.php");
  $salida_insumo=new salida_insumo();
  $obj=new conexion();
  $obj->conectar();
   
  $cod_s=$_REQUEST['cod_s'];
  $lote=$_REQUEST['lote'];
  $cod_i=$_REQUEST['cod_i'];
  $cantidad_salida=$_REQUEST['cantidad_salida'];
  $fecha_s= $_REQUEST['fecha_s'];
  $observaciones=$_REQUEST['observaciones'];
  
  $observaciones = ucwords($observaciones);// La Primera Letra de cada palabra en Mayusculas
  
  $salida_insumo->cod_s=$cod_s;
  $salida_insumo->lote=$lote;
  $salida_insumo->cod_i=$cod_i;
  $salida_insumo->cantidad_salida=$cantidad_salida;
  $salida_insumo->accion_de_salida=1;
  $salida_insumo->fecha_s=$fecha_s;
  $salida_insumo->observaciones=$observaciones;
  
  
  if($_POST['incluir']=='Agregar'){
	
	$salida_insumo->incluirsn();
	
	 $_SESSION['cod_s']=$cod_s;
	 $_SESSION['fecha_s']=$fecha_s;
	 $_SESSION['observaciones']=$observaciones;
	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/salida_caussasnaturales2.php'>";

  } else{
   $salida_insumo->cod_s=$_SESSION['cod_s'];
   $salida_insumo->lote= $_SESSION['lote'];
   $salida_insumo->cod_i= $_SESSION['cod_i'];
   $salida_insumo->cantidad_salida= $_SESSION['cantidad_salida'];
   $salida_insumo->accion_de_salida= $_SESSION['accion_salida'];
   $salida_insumo->fecha_s= $_SESSION['fecha_s'];
   $salida_insumo->observaciones=$_SESSION['observaciones'];
  
	$salida_insumo->nro_solicitud=999;
	$salida_insumo->cod_r=999;
	
	if($cod_i!=0){
    $salida_insumo->incluirsn();
	}
	
	
	 $salida_insumo->incluir2();
	
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../menu/menu2.php'>";	//Envio hacia otra página
	 echo "<script> alert('Salida Registrada con Exito...') </script>";	 
  }
  ?>
</body>
</html>