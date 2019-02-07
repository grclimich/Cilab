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
  
 $id=$_REQUEST['cod_e'];
 $entrada_insumo->cod_e=$_REQUEST['cod_e'];
  $_SESSION['cod_e']=$id;//terminaba en ced
  $dia = substr($fecha1, 0, 2);
$mes   = substr($fecha1, 3, 2);
$ano = substr($fecha1, -4);
// fechal final 
$fecha_e = $ano . '-' . $mes . '-' . $dia; 

  $dia = substr($fecha2, 0, 2);
$mes   = substr($fecha2, 3, 2);
$ano = substr($fecha2, -4);
// fechal final 
$fecha_v = $ano . '-' . $mes . '-' . $dia;

  if($_REQUEST['consultar']){
  
    	
	 $result=$entrada_insumo->consultar();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$entrada_insumo->contar();//cuenta cuantos filas me devolvio la BD

	 if($num==0){
	  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIOINSUMOSENTRADA.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Entrada no registrado por favor vuelva a consultar...') </script>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/entrada_insumo_modificar.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	     
	     $_SESSION['cod_i']= $registro['cod_i'];
		 $_SESSION['lote']= $registro['lote'];
		 $_SESSION['cantidad_entrada']= $registro['cantidad_entrada'];
		  $_SESSION['accion_de_entrada']= $registro['accion_de_entrada'];
		 $_SESSION['proveedor']= $registro['proveedor'];
	   	   $fecha1= $registro['$fecha_v'];
		   $fecha2= $registro['fecha_e'];
	   	  $_SESSION['observacion']= $registro['observacion'];
			}//fin del while 
$_SESSION['fecha_v']=date("d-m-Y",strtotime($fecha1)); 
		 $_SESSION['fecha_e']=date("d-m-Y",strtotime($fecha2)); 			
      }//fin del else
	  }//fin del botón
?>
</body>
</html>