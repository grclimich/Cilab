<?php     
include("../BD.php");
$obj = new conexion();
$obj->conectar();  
$descripcion=$_REQUEST['descripcion'];  
$strsql="SELECT cod_i FROM insumo WHERE descripcion='$descripcion';";

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