<?php
   session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SOLICITUD</title>
</head>

<body>
<?php
include ("../modelos/clase_solicitud.php");
  include("../BD.php");
  $solicitud=new solicitud();
  $obj=new conexion();
  $obj->conectar();
  
  
  $id=$_SESSION['nro_solicitud'];
  $cod_r= $_REQUEST['cod_r'];
  $fecha_solicitud=$_REQUEST['fecha_solicitud'];
  $cod_i= $_REQUEST['cod_i'];
  $cantidad= $_REQUEST['cantidad'];
  $status= $_REQUEST['status'];
  
  $solicitud->nro_solicitud=$id;
  $solicitud->cod_r=$cod_r;
  $solicitud->fecha_solicitud=$fecha_solicitud;
  $solicitud->cod_i=$cod_i;
  $solicitud->cantidad=$cantidad;
  $solicitud->status=$status;
  
  
  if($_POST['modificar']=='Modificar'){
  $solicitud->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_SOLICITUD.php'>";	//Envio hacia otra página
	 echo "<script> alert('Solicitud Modificada con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from solicitud where nro_solicitud ='".nro_solicitud."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_SOLICITUD.php'>";	//Envio hacia otra página
	 echo "<script> alert('Solicitud Eliminado con Éxito...') </script>";
  }
?>
</body>
</html>
