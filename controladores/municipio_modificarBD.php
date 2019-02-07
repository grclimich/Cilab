<?php
   session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
	include ("../modelos/clase_municipio.php");
	include("../BD.php");
	$municipio=new municipio();
	$obj=new conexion();
	$obj->conectar();
  
  
  $id=$_SESSION['id_m'];
  $nombre_municipio= $_REQUEST['nombre_municipio'];
  $municipio->id_m=$id;
  $municipio->nombre_municipio=$nombre_municipio;
 
  
  if($_POST['modificar']=='Modificar'){
  $municipio->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/formulario_municipio.php'>";	
	 echo "<script> alert('Municipio Modificado con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from sala where id_m ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; ../vistas/formulario_municipio.php'>";
	 echo "<script> alert('Municipio Eliminado con Exito...') </script>";
  }
?>
</body>
</html>
