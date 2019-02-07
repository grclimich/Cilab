<?php
class entrada_insumo{
public $cod_e;
public $cod_i;
public $lote;
public $cantidad_entrada;
public $accion_de_entrada;
public $proveedor;
public $fecha_e;
public $fecha_v;
public $observacion;

function consultar()
{
$strsql="SELECT * FROM entrada_insumo WHERE cod_e='$this->cod_e';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
   
}

function contar()
{
$strsql="SELECT * FROM entrada_insumo WHERE cod_e='$this->cod_e';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

 $strsql="INSERT INTO entrada_pro ( cod_e , cod_i, lote ,cantidad_entrada, fecha_v ) VALUES 
	        ('".$this->cod_e."', '".$this->cod_i."', '".$this->lote."','".$this->cantidad_entrada."','".$this->fecha_v."');";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 $strsqllr="SELECT * FROM insumo where cod_i='$this->cod_i'";	 
	 $result=mysql_query($strsqllr);
	 $data=mysql_fetch_array($result);
	 $cantidad=$data['n_cantidad'];
	 $cantn="$this->cantidad_entrada" +$cantidad;
	 	 
	 $strsqll="UPDATE insumo set n_cantidad='.$cantn.'  where cod_i='$this->cod_i'";
	 
	 $result=mysql_query($strsqll);//ejecuta la tira sql
	 
	 
	 $strsqlr="INSERT INTO existencia ( cod_e , cod_i, lote ,n_cantidad, fecha_v ) VALUES 
	        ('".$this->cod_e."', '".$this->cod_i."', '".$this->lote."','".$this->cantidad_entrada."','".$this->fecha_v."');";
	 $result=mysql_query($strsqlr);//ejecuta la tira sql 
	
     
}

function incluir2()
{

$strsql="INSERT INTO entrada_insumo ( cod_e , accion_de_entrada, proveedor, fecha_e, observacion) VALUES 
	        ('".$this->cod_e."', '".$this->accion_de_entrada."','".$this->proveedor."','".$this->fecha_e."','".$this->observacion."');";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 
	 	 }
function eliminar()
{

$ $strsql="delete from entrada_insumo where cod_e ='$this->cod_e'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
}
function modificar()
{

$strsql="update entrada_insumo set cod_i='".$this->cod_i."', lote='".$this->lote."', cantidad_entrada='".$this->cantidad_entrada."', accion_de_entrada='".$this->accion_de_entrada."', proveedor='".$this->proveedor."', fecha_e='".$this->fecha_e."', fecha_v='".$this->fecha_v."', observacion='".$this->observacion."' where cod_e ='$this->cod_e'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	
	 
	 
}


}
