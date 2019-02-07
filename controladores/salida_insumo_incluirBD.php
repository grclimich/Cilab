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
  $nro_solicitud=$_REQUEST['nro_solicitud'];
  $cod_i=$_REQUEST['cod_i'];
  $cantidad_salida=$_REQUEST['cantidad_salida'];
  $accion_de_salida= $_REQUEST['accion_de_salida'];
  $cod_r=$_REQUEST['cod_r'];
  $fecha3= $_REQUEST['fecha_s'];
  $observaciones=$_REQUEST['observaciones'];
  
    $dia = substr($fecha3, 0, 2);
$mes   = substr($fecha3, 3, 2);
$ano = substr($fecha3, -4);

$fecha_s = $ano . '-' . $mes . '-' . $dia; 

  $observaciones = ucwords($observaciones);// La Primera Letra de cada palabra en Mayusculas
  
  $salida_insumo->cod_s=$cod_s;
  $salida_insumo->nro_solicitud=$nro_solicitud;
  $salida_insumo->cod_i=$cod_i;
  $salida_insumo->cantidad_salida=$cantidad_salida;
  $salida_insumo->accion_de_salida=$accion_de_salida;
  $salida_insumo->cod_r=$cod_r;
  $salida_insumo->fecha_s=$fecha_s;
  $salida_insumo->observaciones=$observaciones;
  
   
  
  if($_REQUEST['incluir']){
	  
     $salida_insumo->incluir();
	 $_SESSION['cod_s']=$cod_s;
	 $_SESSION['nro_solicitud']=$nro_solicitud;
	 $_SESSION['accion_de_salida']=$accion_de_salida;
	 $_SESSION['cod_r']=$cod_r;
	 $_SESSION['fecha_s']=$fecha3;
	 $_SESSION['observaciones']=$observaciones;
	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/salida_insumo_incluir3.php'>";	//Envio hacia otra página

  } else
  {
  if($cod_i!=0){
     $salida_insumo->incluir();
	 }
     $salida_insumo->incluir2();
	 
	 $_SESSION['cod_s']=$cod_s;
	 $_SESSION['nro_solicitud']=$nro_solicitud;
	 $_SESSION['accion_de_salida']=$accion_de_salida;
	 $_SESSION['cod_r']=$cod_r;
	 $_SESSION['fecha_s']=$fecha_s;
	 $_SESSION['observaciones']=$observaciones;
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../menu/menu2.php'>";	//Envio hacia otra página
	 echo "<script> alert('Salida Registrada con Exito...') </script>";	 
  }
  
  
  ?>
</body>
</html>