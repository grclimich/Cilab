<?php   
include("../BD.php");
$obj = new conexion();
$obj->conectar();  
$clase_presentacion=$_REQUEST['clase_presentacion'];  
$strsql="SELECT cod_presentacion FROM presentacion WHERE clase_presentacion='$clase_presentacion';";

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