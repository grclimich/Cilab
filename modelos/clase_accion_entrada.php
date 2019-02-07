<?php
class accion_entrada{
public $id_e;
public $razon_entrada;

function consultar()
{
$strsql="SELECT * FROM accion_entrada WHERE id_e='$this->id_e';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM accion_entrada WHERE id_e='$this->id_e';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO accion_entrada (id_e,razon_entrada) VALUES 
	        ('".$this->id_e."', '".$this->razon_entrada."');";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 
	 
}
function eliminar()
{

$ $strsql="delete from accion_entrada where id_e ='$this->id_e'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
}
function modificar()
{

$strsql="update accion_entrada set razon_entrada='".$this->razon_entrada."' where id_e ='$this->id_e'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	
	 
	 
}


}