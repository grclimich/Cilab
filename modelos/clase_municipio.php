<?php
class municipio{
public $id_m;
public $nombre_municipio;


function consultar()
{
$strsql="SELECT * FROM municipio WHERE id_m='$this->id_m';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM municipio WHERE id_m='$this->id_m';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO municipio (id_m,nombre_municipio) VALUES 
	        ('".$this->id_m."','".$this->nombre_municipio."');";	 
   
	 $result=mysql_query($strsql); 
	 
	 
}
function eliminar()
{

$ $strsql="DELETE FROM municipio WHERE id_m='$this->id_m'";	 
   
	 $result=mysql_query($strsql);
}
function modificar()
{

$strsql="UPDATE municipio SET nombre_municipio='".$this->nombre_municipio."' WHERE id_m ='$this->id_m'";	 
   
	 $result=mysql_query($strsql);
	 
	 
}


}