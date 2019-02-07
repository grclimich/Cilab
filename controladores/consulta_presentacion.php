<?php
   session_start();
?>

<html>
<head>
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
  include("../BD.php");
  include("../modelos/clase_presentacion.php");
  $presentacion=new presentacion();
  $obj=new conexion();
  $obj->conectar();
  
 $id=$_REQUEST['cod_presentacion'];
 $presentacion->cod_presentacion=$_REQUEST['cod_presentacion'];
  $_SESSION['cod_presentacion']=$id;
  
  if($_REQUEST['consultar']){
  
    	
	 $result=$presentacion->consultar();
     $num=0;	 
	 
	 $num=$presentacion->contar();

	 if($num==0){
	   echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/presentacion_incluir.php'>";	
	 }
	 else{	 
	 echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/presentacion_modificar.php'>"; 
	 while($registro=mysql_fetch_array($result)){	     
	     $_SESSION['clase_presentacion']= $registro['clase_presentacion'];
		} 
      }
	  }
?>
</body>
</html>