<?php   
include("../BD.php");
$obj = new conexion();
$obj->conectar();  
$nombre_2=$_REQUEST['nombre_2'];  
$strsql="SELECT cod_r FROM laboratorio_receptor WHERE nombre_2='$nombre_2';";

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