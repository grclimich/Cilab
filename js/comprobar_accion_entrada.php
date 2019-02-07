<?php     
include("../BD.php");
$obj = new conexion();
$obj->conectar();  
$razon_entrada=$_REQUEST['razon_entrada'];  
$strsql="SELECT id_e FROM accion_entrada WHERE razon_entrada='$razon_entrada';";

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