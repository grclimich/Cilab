<?php
   session_start();
?>

<html>

<head>


<title>SOLICITUD</title>

</head>

<body>
<?php
  include("../BD.php");
  include("../modelos/clase_solicitud.php");
  $solicitud=new solicitud();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['nro_solicitud'];
 $solicitud->nro_solicitud=$_REQUEST['nro_solicitud'];
 $_SESSION['nro_solicitud']=$id;
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$solicitud->consultar();
     $num=0;	 
	 
	 $num=$solicitud->contar();

	 if($num==0){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/FORMULARIO_SOLICITUD.php'>";	//Envio hacia Incluir   
	   echo "<script> alert('Solicitud no registrado por favor Vuelva a Consultar...') </script>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/solicitud_modificar.php'>"; 
	 while($registro=mysql_fetch_array($result)){	     
	     $_SESSION['cod_r']= $registro['cod_r'];
		 $_SESSION['fecha_solicitud']= $registro['fecha_solicitud'];
		 $_SESSION['cod_i']= $registro['cod_i'];
		 $_SESSION['cantidad']= $registro['cantidad'];
		 $_SESSION['status']= $registro['status'];
		}
      }
	  }
?>
</body>
</html>