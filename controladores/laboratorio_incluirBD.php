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
  include ("../modelos/clase_laboratorio.php");
  $laboratorio=new laboratorio(); 
  $obj=new conexion();
  $obj->conectar();
 
  
  $cod_r=$_REQUEST['cod_r'];
  $nombre_2=$_REQUEST['nombre_2'];
  $direccion= $_REQUEST['direccion'];
  $municipio=$_REQUEST['municipio'];
  $telefono=$_REQUEST['telefono'];
  $nro_fax= $_REQUEST['nro_fax'];
  $nro_rif=$_REQUEST['nro_rif'];
  
  $laboratorio->cod_r=$cod_r;
  $laboratorio->nombre_2=$nombre_2;
  $laboratorio->direccion=$direccion;
  $laboratorio->municipio=$municipio;
  $laboratorio->telefono=$telefono;
  $laboratorio->nro_fax=$nro_fax;
  $laboratorio->nro_rif=$nro_rif;
  
  if($_REQUEST['incluir']){
  
     $laboratorio->incluir();
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/laboratorio_incluir.php'>";//carga la pagina de nuevo
	 echo "<script> alert('Laboratorio Registrado con Exito...') </script>";	 
  }
?>
</body>
</html>
