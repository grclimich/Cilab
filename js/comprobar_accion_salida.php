<?php   
include("../BD.php");
$obj = new conexion();
$obj->conectar();  
$razon_salida=$_REQUEST['razon_salida'];  
$strsql="SELECT razon_salida FROM accion_salida WHERE razon_salida='$razon_salida';";

$num=0;
$result=mysql_query($strsql);  
$num=mysql_num_rows($result);  
if($result){

$a= $num;
if($a!=0){
 
  echo 1;  
}  
else  
{  

  echo 0;  
}  
}
?>  