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
  include("../modelos/clase_entrada_insumo.php");
  $entrada_insumo=new entrada_insumo();
  $obj=new conexion();
  $obj->conectar();
 
   $id=$_SESSION['cod_e'];
  $cod_e=$_SESSION['cod_e'];
  $cod_i= $_REQUEST['cod_i'];
  $lote= $_REQUEST['lote'];
  $cantidad_entrada=$_REQUEST['cantidad_entrada'];
  $accion_de_entrada= $_REQUEST['accion_de_entrada'];
  $proveedor=$_REQUEST['proveedor'];
  $fecha_e=$_REQUEST['fecha_e'];
  $fecha_v= $_REQUEST['fecha_v'];
  $observacion=$_REQUEST['observacion'];
  
  $entrada_insumo->cod_e=$cod_e;
  $entrada_insumo->cod_i=$cod_i;
  $entrada_insumo->lote=$lote;
  $entrada_insumo->cantidad_entrada=$cantidad_entrada;
  $entrada_insumo->accion_de_entrada=$accion_de_entrada;
  $entrada_insumo->proveedor=$proveedor;
  $entrada_insumo->fecha_v=$fecha_v;
  $entrada_insumo->fecha_e=$fecha_e;
  $entrada_insumo->observacion=$observacion;
  
  if($_POST['modificar']=='Modificar'){
  $entrada_insumo->modificar();
      
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIOINSUMOSENTRADA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Entrada Modificada con Exito...') </script>";	 
  }
  
  if($_POST['modificar']=='Eliminar'){

     $strsql="delete from entrada_insumo where cod_s ='".$id."'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIOINSUMOSENTRADA.php'>";	//Envio hacia otra página
	 echo "<script> alert('Entrada Eliminada con Exito...') </script>";
  }
?>
</body>
</html>
