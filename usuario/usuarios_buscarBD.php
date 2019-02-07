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
  include("clase_usuarios.php");
  $usuario=new usuario();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['nombre_usuario'];
 $usuario->nombre_usuario=$_REQUEST['nombre_usuario'];
  $_SESSION['nombre_usuario']=$id;//terminaba en ced
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$usuario->consultar();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$usuario->contar();//cuenta cuantos filas me devolvio la BD

	  if($num==0){
	  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=usuarios_incluir.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Usuario no registrado') </script>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=usuarios_modificar.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	
		$_SESSION['pass']= $registro['pass'];     
	     $_SESSION['id_usuario']= $registro['id_usuario'];
	   	    }//fin del while1
		
      }//fin del else
	  }//fin del botón
?>
</body>
</html>