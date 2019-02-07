<?php
   session_start();
?>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?php
  include("../BD.php");
  include ("../modelos/clase_presentacion.php");
  $presentacion=new presentacion(); 
  $obj=new conexion();
  $obj->conectar();
 
  $cod_presentacion=$_REQUEST['cod_presentacion'];
  $clase_presentacion=$_REQUEST['clase_presentacion'];
  
	$presentacion->cod_presentacion=$cod_presentacion;  
	$presentacion->clase_presentacion=$clase_presentacion;
	
  if($_REQUEST['incluir']){
  
     $presentacion->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/presentacion_incluir.php'>";	//Envio hacia otra página
	 echo "<script> alert('Registro de Presentacion Exitoso...') </script>";	 
  }
?>
</body>
</html>