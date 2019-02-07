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
include ("../modelos/clase_accion_entrada.php");
  include("../BD.php");
  $accion_entrada=new accion_entrada();
  $obj=new conexion();
  $obj->conectar();
  
  
  $id=$_SESSION['id_e'];
  $razon_entrada= $_REQUEST['razon_entrada'];
  $accion_entrada->id_e=$id;
  $accion_entrada->razon_entrada=$razon_entrada;
  
  if($_POST['modificar']=='Modificar'){
  $accion_entrada->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_ACCION_DE_ENTRADA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Accion de Entrada Modificada con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from accion_entrada where id_e ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=FORMULARIO_ACCION_DE_ENTRADA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Accion de Entrada Eliminada con Exito...') </script>";
  }
?>
</body>
</html>
