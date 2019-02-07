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
 
  $id=$_SESSION['cod_s'];
  $nro_solicitud=$_REQUEST['nro_solicitud'];
  $cod_i=$_REQUEST['cod_i'];
  $cantidad_salida=$_REQUEST['cantidad_salida'];
  $accion_de_salida= $_REQUEST['accion_de_salida'];
  $cod_r=$_REQUEST['cod_r'];
  $fecha_s= $_REQUEST['fecha_s'];
  $observaciones=$_REQUEST['observaciones'];
  
	$salida_insumo->cod_s=$id;
  $salida_insumo->nro_solicitud=$nro_solicitud;
  $salida_insumo->cod_i=$cod_i;
  $salida_insumo->cantidad_salida=$cantidad_salida;
  $salida_insumo->accion_de_salida=$accion_de_salida;
  $salida_insumo->cod_r=$cod_r;
  $salida_insumo->fecha_s=$fecha_s;
  $salida_insumo->observaciones=$observaciones;
  
  if($_POST['modificar']=='Modificar'){
  $salida_insumo->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_INSUMO_SALIDA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Salida Modificada con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from salida_insumo where cod_s ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_INSUMO_SALIDA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Salida Eliminada con Exito...') </script>";
  }
?>
</body>
</html>
