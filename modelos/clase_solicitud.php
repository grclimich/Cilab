<?php
class solicitud{
public $nro_solicitud;
public $cod_r;
public $cantidad;
public $status;

public $fecha_solicitud;

function consultar()
{
$strsql="SELECT * FROM solicitud WHERE nro_solicitud='$this->nro_solicitud';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 return $result;
}

function contar()
{
$strsql="SELECT * FROM solicitud WHERE nro_solicitud='$this->nro_solicitud';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);
	 $num=mysql_num_rows($result);
	 return $num;
	 
}
function incluir2()
{

$strsql="INSERT INTO solicitud (nro_solicitud, fecha_solicitud, status, cod_r) VALUES 
	        ('".$this->nro_solicitud."','".$this->fecha_solicitud."','".$this->status."','".$this->cod_r."');";	 
   
	 $result=mysql_query($strsql);  
	
     
}
function incluir()
{
     $v='Pendiente';
	 
	 $strsqll="INSERT INTO soli_pro (nro_solicitud, cantidad, cod_i,status) VALUES 
	        ('".$this->nro_solicitud."','".$this->cantidad."','".$this->cod_i."','$v');";	 
   	 $result1=mysql_query($strsqll); 
	 
}
function eliminar()
{

$ $strsql="DELETE FROM solicitud WHERE nro_solicitud='$this->nro_solicitud'";
   
	 $result=mysql_query($strsql);
}
function modificar()
{

$strsql="UPDATE solicitud SET cod_r='".$this->cod_r."', fecha_solicitud='".$this->fecha_solicitud."', status='".$this->status."' WHERE nro_solicitud ='$this->nro_solicitud'"; 
  
	 $result=mysql_query($strsql);
	 
$strsql="UPDATE soli_pro SET cod_i='".$this->cod_i."', cantidad='".$this->cantidad."' WHERE nro_solicitud ='$this->nro_solicitud'"; 
  
	 $result=mysql_query($strsql);
	 
	 
}


}
