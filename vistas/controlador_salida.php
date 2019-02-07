<?php 
 
    session_start();
	if(!isset($_SESSION['nombre_usuario'])){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../CILAB.php'>";
	echo "<script> alert('Por Favor inicie sesion...') </script>";
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ENTRADA</title>
</head>

<body>
<?php
  
include("../BD.php");
  include("../modelos/clase_salida_insumo.php");
  $salida_insumo=new salida_insumo();
  $obj=new conexion();
  $obj->conectar();

$salida_insumo->contar();
$consulta="SELECT cod_s FROM salida_insumo";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  $_SESSION['cod_s']=$num;
   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=salida_insumo_incluir2.php'>";
?>