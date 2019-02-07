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
  include("../modelos/clase_laboratorio.php");
  $laboratorio=new laboratorio();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['cod_r'];
 $laboratorio->cod_r=$_REQUEST['cod_r'];
  $_SESSION['cod_r']=$id;//terminaba en ced
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$laboratorio->consultar();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$laboratorio->contar();//cuenta cuantos filas me devolvio la BD

	 if($num==0){
	  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_LABORATORIO.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Laboratorio no registrado por favor Vuelva a Consultar...') </script>";	
	 }	
	
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/laboratorio_modificar.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	     
	     $_SESSION['nombre_2']= $registro['nombre_2'];
		 $_SESSION['direccion']= $registro['direccion'];
		 $_SESSION['municipio']= $registro['municipio'];
		  $_SESSION['telefono']= $registro['telefono'];
		 $_SESSION['nro_fax']= $registro['nro_fax'];
	   	  $_SESSION['nro_rif']= $registro['nro_rif'];
			}//fin del while  
			
      }//fin del else
	  }//fin del botón
?>
</body>
</html>