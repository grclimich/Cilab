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
  include("../modelos/clase_accion_salida.php");
  $accion_salida=new accion_salida();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['id_s'];
 $accion_salida->id_s=$_REQUEST['id_s'];
  $_SESSION['id_s']=$id;//terminaba en ced
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$accion_salida->consultar();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$accion_salida->contar();//cuenta cuantos filas me devolvio la BD

	 if($num==0){
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_ACCION_DE_SALIDA.php'>";	//Envio hacia Incluir   
	 echo "<script> alert('Accion de Salida NO registrado por favor Vuelva a Consultar...') </script>";
	}
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/accion_salida_modificar.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	     
	     $_SESSION['razon_salida']= $registro['razon_salida'];
		 
	   	    }//fin del while  
      }//fin del else
	  }//fin del bot�n
?>
</body>
</html>
