<?php
class laboratorio{
public $cod_r;
public $nombre_2;
public $direccion;
public $municipio;
public $telefono;
public $nro_fax;
public $nro_rif;

function consultar()
{
$strsql="SELECT * FROM laboratorio_receptor WHERE cod_r='$this->cod_r';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM laboratorio_receptor WHERE cod_r='$this->cod_r';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO laboratorio_receptor (cod_r, nombre_2, direccion, municipio, telefono, nro_fax, nro_rif) VALUES 
	        ('".$this->cod_r."','".$this->nombre_2."','".$this->direccion."', '".$this->municipio."', '".$this->telefono."','".$this->nro_fax."','".$this->nro_rif."');";	 
   
	 $result=mysql_query($strsql); 
	 
	 
}
function eliminar()
{

$ $strsql="DELETE FROM laboratorio_receptor WHERE cod_r='$this->cod_r'";	 
   
	 $result=mysql_query($strsql);
}
function modificar()
{

$strsql="UPDATE laboratorio_receptor SET nombre_2='".$this->nombre_2."', direccion='".$this->direccion."', municipio='".$this->municipio."', telefono='".$this->telefono."', nro_fax='".$this->nro_fax."', nro_rif='".$this->nro_rif."' WHERE cod_r ='$this->cod_r'";	 
   
	 $result=mysql_query($strsql);
	 
	 
}


}