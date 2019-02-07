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
  include("BD.php");
  include("clase_login.php");
  $login=new login();
  $obj=new conexion();
  $obj->conectar();
  
 $nombre_usuario=$_REQUEST['nombre_usuario'];
 $pass=$_REQUEST['pass'];
 $login->nombre_usuario=$nombre_usuario;
 $login->pass=$pass;
 
  
  if($_REQUEST['Iniciar_Sesion']){
  
    	
	 $result=$login->Iniciar_Sesion();
     $num=0;	 
	 //$result=mysql_query($strsql);//ejecuta la tira sql
	 $num=$login->contar();//cuenta cuantos filas me devolvio la BD

	  if($num==0){
	  echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=index.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Usuario no registrado') </script>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=menu/menu2.php'>"; //Envio hacia Modificar	 
	 while($registro=mysql_fetch_array($result)){	
		 $_SESSION['nombre_usuario']= $registro['nombre_usuario'];	 
	     $_SESSION['id_perfil']= $registro['id_perfil'];
	     $_SESSION['nombre_perfil']= $registro['nombre_perfil'];
	   	    }//fin del while1
		
      }//fin del else
	  }//fin del botón
?>
</body>
</html>