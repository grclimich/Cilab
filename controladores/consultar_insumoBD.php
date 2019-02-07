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
  include("../modelos/clase_insumo.php");
  $insumo=new insumo();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['cod_i'];
 $insumo->cod_i=$_REQUEST['cod_i'];
  $_SESSION['cod_i']=$id;//terminaba en ced
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$insumo->consultar();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$insumo->contar();//cuenta cuantos filas me devolvio la BD

	  if($num==0){
	  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIOINSUMO.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Producto no registrado por favor vuelva a consultar...') </script>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/insumo_modificar.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	
		$_SESSION['tipo_p']= $registro['tipo_p'];     
	     $_SESSION['descripcion']= $registro['descripcion'];
		 $_SESSION['presentacion']= $registro['presentacion'];
		 $_SESSION['almacen']= $registro['almacen'];
		 $_SESSION['observacion']= $registro['observacion'];
	   	    }//fin del while1
		
      }//fin del else
	  }//fin del botón
?>
</body>
</html>