<?php
class salida_insumo{
public $cod_s;
public $nro_solicitud;
public $cod_i;
public $cantidad_salida;
public $accion_de_salida;
public $cod_r;
public $fecha_s;
public $observaciones;
public $lote;
function incluirsn()
{
 
	 $strsqllr="SELECT * FROM insumo where cod_i='$this->cod_i'";	 
	 $result1=mysql_query($strsqllr);
	 $data=mysql_fetch_array($result1);
	 $cantidad=$data['n_cantidad'];
	
if   ($this->cantidad_salida<=$cantidad)
	 {
	 $cantn=$cantidad-$this->cantidad_salida;
   	 
	 
	 $strsqlr="INSERT sali_pro ( cod_s, cantidad_salida, cod_i) values( '".$this->cod_s."', '".$this->cantidad_salida."','".$this->cod_i."');";
	 $result1=mysql_query($strsqlr);//ejecuta la tira sql
	 	 
	 $strsqll="UPDATE insumo set n_cantidad='.$cantn.'  where cod_i='$this->cod_i'";
	 
	 $result1=mysql_query($strsqll);//ejecuta la tira sql
     $srt="select * from existencia where lote='$this->lote' and cod_i='$this->cod_i'";
	 $res=mysql_query($srt);
	 if($res)
	 {
	 $data=mysql_fetch_array($res);
	 $exi=$data['n_cantidad'];
	 $exin=$exi-$this->cantidad_salida;
	 echo $exin;
	 echo $this->cod_i;
	 echo $this->lote;
	 $strsqll="UPDATE existencia set n_cantidad='$exin'  where cod_i='$this->cod_i' and lote='$this->lote' ";
	  $res2=mysql_query($strsqll);
	 }
	 	 	 	
}
else
	 {
	 echo "<script> alert ('Error no se proceso la salida')</script>";
	 }
}

function consultar()
{
$strsql="SELECT * FROM salida_insumo WHERE cod_s='$this->cod_s';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM salida_insumo WHERE cod_s='$this->cod_s';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{
 
	 $strsqllr="SELECT * FROM insumo where cod_i='$this->cod_i'";	 
	 $result1=mysql_query($strsqllr);
	 $data=mysql_fetch_array($result1);
	 $cantidad=$data['n_cantidad'];
	
if ($this->cantidad_salida<=$cantidad)
 {
          $str1="select * from existencia where cod_i='$this->cod_i' and  fecha_v>='$this->fecha_s' and n_cantidad>0  order by fecha_v";
$res1=mysql_query($str1);

$can=$this->cantidad_salida;
           while ($data=mysql_fetch_array($res1)){
             $cant1=$data['n_cantidad'];
             $lote=$data['lote'];
             $id=$data['id_existencia'];  
              if ($can>=$cant1)
{              
$can=$can-$cant1;
$cant1=0;
$x=0;
 }       
else{

$x=$cant1-$can;
$can=0;

}          

 $strsqll="UPDATE existencia set n_cantidad='.$x.'  where cod_i='$this->cod_i' and  id_existencia='$id'";
 $result1=mysql_query($strsqll);//ejecuta la tira sql	
}
	 $cantn=$cantidad-$this->cantidad_salida;
$strsql="INSERT INTO salida_insumo ( cod_s, nro_solicitud, accion_de_salida, cod_r, fecha_s, observaciones) VALUES 
	        ('".$this->cod_s."','".$this->nro_solicitud."','".$this->accion_de_salida."','".$this->cod_r."','".$this->fecha_s."','".$this->observaciones."');";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 


 $strsqll="UPDATE soli_pro set status='Aprobado'  where nro_solicitud='$this->nro_solicitud' and cod_i='$this->cod_i'";
 $result1=mysql_query($strsqll);//ejecuta la tira sql	


	 $strsqlr="INSERT sali_pro ( cod_s, cantidad_salida, cod_i) values( '".$this->cod_s."', '".$this->cantidad_salida."','".$this->cod_i."');";
	 $result1=mysql_query($strsqlr);//ejecuta la tira sql
	 
	 
	 $strsqll="UPDATE insumo set n_cantidad='.$cantn.'  where cod_i='$this->cod_i'";
	 
	 $result1=mysql_query($strsqll);//ejecuta la tira sql	
}
else
	 {
	 echo "<script> alert ('Error! excede la cantidad del producto')</script>";
	 }
	 }
function incluir2()
{

$strsql="INSERT INTO salida_insumo ( cod_s, nro_solicitud, accion_de_salida, cod_r, fecha_s, observaciones) VALUES 
	        ('".$this->cod_s."','".$this->nro_solicitud."','".$this->accion_de_salida."','".$this->cod_r."','".$this->fecha_s."','".$this->observaciones."');";	 
   
}
function eliminar()
{

$ $strsql="delete from salida_insumo where cod_s ='$this->cod_s'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
}
function modificar()
{

$strsql="update salida_insumo set nro_solicitud='".$this->nro_solicitud."',cod_i='".$this->cod_i."',cantidad_salida='".$this->cantidad_salida."', accion_de_salida='".$this->accion_de_salida."', cod_r='".$this->cod_r."', fecha_s='".$this->fecha_s."', observaciones='".$this->observaciones."' where cod_s ='$this->cod_s'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	
	 
	 
}


}
