<?php
   session_start();
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<?php
  include("../BD.php");
  include("../modelos/clase_municipio.php");
  $municipio=new municipio();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['id_m'];
 $municipio->id_m=$_REQUEST['id_m'];
  $_SESSION['id_m']=$id;
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$municipio->consultar();
     $num=0;	 
	 
	 $num=$municipio->contar();

	 if($num==0){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_MUNICIPIO.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Municipio no registrado por favor vuelva a consultar...') </script>";		
	}
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/municipio_modificar.php'>"; 
	 while($registro=mysql_fetch_array($result)){	     
	     $_SESSION['nombre_municipio']= $registro['nombre_municipio'];
		} 
      }
	  }
?>
</body>
</html>