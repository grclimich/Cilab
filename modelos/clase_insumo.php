<?php
class insumo{
public $cod_i;
public $tipo_p;
public $descripcion;
public $n_cantidad;
public $presentacion;
public $almacen;
public $observacion;

function consultar()
{
$strsql="SELECT * FROM insumo WHERE cod_i='$this->cod_i';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM insumo WHERE cod_i='$this->cod_i';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO insumo ( cod_i ,tipo_p, descripcion ,presentacion, almacen, observacion) VALUES 
	        ('".$this->cod_i."', '".$this->tipo_p."', '".$this->descripcion."','".$this->presentacion."','".$this->almacen."','".$this->observacion."');";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 
	 
}
function eliminar()
{

$strsql="delete from insumo where cod_i ='$this->cod_i'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
}
function modificar()
{

$strsql="update insumo set tipo_p='".$this->tipo_p."',descripcion='".$this->descripcion."', presentacion='".$this->presentacion."', almacen='".$this->almacen."', observacion='".$this->observacion."' where cod_i ='$this->cod_i'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	
	 
	 
}


}
