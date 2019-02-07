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
  include("../modelos/clase_salida_insumo.php");
  $salida_insumo=new salida_insumo();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['cod_s'];
 $salida_insumo->cod_s=$_REQUEST['cod_s'];
  $_SESSION['cod_s']=$id;//terminaba en ced
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$salida_insumo->consultar();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$salida_insumo->contar();//cuenta cuantos filas me devolvio la BD

	 if($num==0){
	  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=FORMULARIO_INSUMO_SALIDA.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Salida de productos no registrado por favor vuelva a consultar...') </script>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/salida_insumo_modificar.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	     
		 $_SESSION['nro_solicitud']= $registro['nro_solicitud'];
		 $_SESSION['cod_i']= $registro['cod_i'];
		 $_SESSION['cantidad_salida']= $registro['cantidad_salida'];
		  $_SESSION['accion_de_salida']= $registro['accion_de_salida'];
		  $_SESSION['cod_r']= $registro['cod_r'];
		  $_SESSION['fecha_s']= $registro['fecha_s'];
	   	  $_SESSION['observaciones']= $registro['observaciones'];
			}//fin del while  
      }//fin del else
	  }//fin del botón
?>
</body>
</html>