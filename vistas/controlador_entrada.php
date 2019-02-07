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
  include("../modelos/clase_entrada_insumo.php");
  $entrada_insumo=new entrada_insumo();
  $obj=new conexion();
  $obj->conectar();

$entrada_insumo->contar();
$consulta="SELECT cod_e FROM entrada_insumo";
$result=mysql_query($consulta);
$num=0;
$num=mysql_num_rows($result);
$num++;
  $_SESSION['cod_e']=$num;
   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=entrada_insumo_incluir.php'>";	//Envio hacia otra página
?>
