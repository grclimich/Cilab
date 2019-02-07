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
  include("../BD.php");
  include ("../modelos/clase_municipio.php");
  $municipio=new municipio(); 
  $obj=new conexion();
  $obj->conectar();
 
  $id_m=$_REQUEST['id_m'];
  $nombre_municipio=$_REQUEST['nombre_municipio'];
  
	$municipio->id_m=$id_m;  
	$municipio->nombre_municipio=$nombre_municipio;
	
  if($_REQUEST['incluir']){
  
     $municipio->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/municipio_incluir.php'>";	//Envio hacia otra página
	 echo "<script> alert('Registro de Municipio Exitoso...') </script>";	 
  }
?>
</body>
</html>