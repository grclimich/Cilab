<?php
class accion_salida{
public $id_s;
public $razon_salida;

function consultar()
{
$strsql="SELECT * FROM accion_salida WHERE id_s='$this->id_s';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM accion_salida WHERE id_s='$this->id_s';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO accion_salida (id_s,razon_salida) VALUES 
	        ('$this->id_s', '".$this->razon_salida."');";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 
	 
}
function eliminar()
{

$ $strsql="delete from accion_salida where id_s ='$this->id_s'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
}
function modificar()
{

$strsql="update accion_salida set razon_salida='".$this->razon_salida."' where id_s ='$this->id_s'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	
	 
	 
}


}