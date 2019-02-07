<?php
class presentacion{
public $cod_presentacion;
public $clase_presentacion;


function consultar()
{
$strsql="SELECT * FROM presentacion WHERE cod_presentacion='$this->cod_presentacion';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM presentacion WHERE cod_presentacion='$this->cod_presentacion';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO presentacion (cod_presentacion,clase_presentacion) VALUES 
	        ('".$this->cod_presentacion."','".$this->clase_presentacion."');";	 
   
	 $result=mysql_query($strsql); 
	 
	 
}
function eliminar()
{

$ $strsql="DELETE FROM presentacion WHERE cod_presentacion='$this->cod_presentacion'";	 
   
	 $result=mysql_query($strsql);
}
function modificar()
{

$strsql="UPDATE presentacion SET clase_presentacion='".$this->clase_presentacion."' WHERE cod_presentacion ='$this->cod_presentacion'";	 
   
	 $result=mysql_query($strsql);
	 
	 
}


}