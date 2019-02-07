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
include ("../modelos/clase_laboratorio.php");
  include("../BD.php");
  $laboratorio=new laboratorio();
  $obj=new conexion();
  $obj->conectar();
  
  
  $id=$_SESSION['cod_r'];
  $nombre_2= $_REQUEST['nombre_2'];
  $direccion=$_REQUEST['direccion'];
  $municipio=$_REQUEST['municipio'];
  $telefono=$_REQUEST['telefono'];
  $nro_rif=$_REQUEST['nro_rif'];
  $nro_fax=$_REQUEST['nro_fax'];
  $laboratorio->cod_r=$id;
  $laboratorio->nombre_2=$nombre_2;
  $laboratorio->direccion=$direccion;
  $laboratorio->municipio=$municipio;
  $laboratorio->telefono=$telefono;
  $laboratorio->nro_rif=$nro_rif;
  $laboratorio->nro_fax=$nro_fax;
  if($_POST['modificar']=='Modificar'){
  $laboratorio->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_LABORATORIO.php'>";	//Envio hacia otra página
	 echo "<script> alert('Laboratorio Modificado con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from insumo where cod_r ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_LABORATORIO.php'>";	//Envio hacia otra página
	 echo "<script> alert('Laboratorio Eliminado con Exito...') </script>";
  }
?>
</body>
</html>
