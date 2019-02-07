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
  include("../modelos/clase_entrada_insumo.php");
  $entrada_insumo=new entrada_insumo();
  $obj=new conexion();
  $obj->conectar();
 
  
  $cod_e=$_REQUEST['cod_e'];
  $cod_i=$_REQUEST['cod_i'];
  $lote= $_REQUEST['lote'];
  $cantidad_entrada=$_REQUEST['cantidad_entrada'];
  $accion_de_entrada= $_REQUEST['accion_de_entrada'];
  $proveedor=$_REQUEST['proveedor'];
  $fecha1=$_REQUEST['fecha_e'];
  $fecha2= $_REQUEST['fecha_v'];
  $observacion=$_REQUEST['observacion'];
   
$dia = substr($fecha1, 0, 2);
$mes   = substr($fecha1, 3, 2);
$ano = substr($fecha1, -4);

$fecha_e = $ano . '-' . $mes . '-' . $dia; 
   
   $dia = substr($fecha2, 0, 2);
$mes   = substr($fecha2, 3, 2);
$ano = substr($fecha2, -4);

$fecha_v = $ano . '-' . $mes . '-' . $dia; 
   
  $observacion = ucwords($observacion);// La Primera Letra de cada palabra en Mayusculas  
	
  $entrada_insumo->cod_e=$cod_e;
  $entrada_insumo->cod_i=$cod_i;
  $entrada_insumo->lote=$lote;
  $entrada_insumo->cantidad_entrada=$cantidad_entrada;
  $entrada_insumo->accion_de_entrada=$accion_de_entrada;
  $entrada_insumo->proveedor=$proveedor;
  $entrada_insumo->fecha_v=$fecha_v;
  $entrada_insumo->fecha_e=$fecha_e;
  $entrada_insumo->observacion=$observacion;
  
  if($_REQUEST['incluir']){
  
  
  
     $entrada_insumo->incluir();

	$_SESSION['cod_e']=$cod_e;
 $_SESSION['accion_de_entrada']=$accion_de_entrada;
 $_SESSION['proveedor']=$proveedor;
 $_SESSION['fecha_e']=$fecha1;
 $_SESSION['observacion']=$observacion;
   
  
  echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=../vistas/entrada_insumo_incluir2.php'>";	//Envio hacia otra página
  }else
  {

    
	
     if($cod_i!=0){
	$entrada_insumo->incluir();
	 }
	 
  
     
     $entrada_insumo->incluir2();
	 
	$_SESSION['cod_e']=$cod_e;
	$_SESSION['accion_de_entrada']=$accion_de_entrada;
	$_SESSION['proveedor']=$proveedor;
	$_SESSION['fecha_e']=$fecha_e;
	$_SESSION['observacion']=$observacion;
	echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=../menu/menu2.php'>";	//Envio hacia otra página
	echo "<script> alert('Entrada Registrada con Exito...') </script>";	 
  } 