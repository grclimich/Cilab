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
  include("../BD.php");
  include ("../modelos/clase_solicitud.php");
  $solicitud=new solicitud(); 
  $obj=new conexion();
  $obj->conectar();
 
  $nro_solicitud=$_SESSION['nro_solicitud'];
  $cod_r=$_REQUEST['cod_r'];
  $cod_i=$_REQUEST['cod_i'];
  $cantidad=$_REQUEST['cantidad'];
  $fecha3=$_REQUEST['fecha_solicitud']; 
  $status=$_REQUEST['status'];

  
$dia = substr($fecha3, 0, 2);
$mes   = substr($fecha3, 3, 2);
$ano = substr($fecha3, -4);

$fecha_solicitud = $ano . '-' . $mes . '-' . $dia; 
  
  
  $status = ucwords($status);// La Primera Letra de cada palabra en Mayusculas
  
  $solicitud->nro_solicitud=$nro_solicitud;
  $solicitud->cod_r=$cod_r;
  $solicitud->cod_i=$cod_i;
  $solicitud->cantidad=$cantidad;
  $solicitud->fecha_solicitud=$fecha_solicitud;
  $solicitud->status=$status;

  
  if($_REQUEST['incluir']){
  
     $solicitud->incluir();

	  $_SESSION['nro_solicitud']=$nro_solicitud;
	  $_SESSION['cod_r']=$cod_r;
	  $_SESSION['fecha_solicitud']=$fecha3;
	  $_SESSION['status']=$status;
	  
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/solicitud_incluir2.php'>";	//Envio hacia otra página
  }else
  {
  
   if($cod_i!=0){
	$solicitud->incluir();
	 }

     
     $solicitud->incluir2();
	  $_SESSION['nro_solicitud']=$nro_solicitud;
	  $_SESSION['cod_r']=$cod_r;
	  $_SESSION['fecha_solicitud']=$fecha_solicitud;
	  $_SESSION['status']=$status;
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../menu/menu2.php'>";	//Envio hacia otra página
	 echo "<script> alert('Solicitud Registrado con Exito...') </script>";	 
  }
  
?>
</body>
</html>
