<?php
   session_start();
?>

<html>
<head>
<title>Documento sin titulo</title>
</head>

<body>
<?php
	include ("../modelos/clase_presentacion.php");
	include("../BD.php");
	$presentacion=new presentacion();
	$obj=new conexion();
	$obj->conectar();
  
  
  $id=$_SESSION['cod_presentacion'];
  $clase_presentacion= $_REQUEST['clase_presentacion'];
  $presentacion->cod_presentacion=$id;
  $presentacion->clase_presentacion=$clase_presentacion;
 
  
  if($_POST['modificar']=='Modificar'){
  $presentacion->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/formulario_presentacion.php'>";	
	 echo "<script> alert('Presentacion Modificada con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from sala where cod_presentacion ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; formulario_presentacion.php'>";
	 echo "<script> alert('Presentancion Eliminada con Exito...') </script>";
  }
?>
</body>
</html>
