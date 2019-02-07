<?php
class usuario{
public $nombre_usuario;
public $pass;
public $id_usuario;



function consultar()
{
$strsql="SELECT * FROM usuario WHERE nombre_usuario='$this->nombre_usuario';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 return $result;
	 

}

function contar()
{
$strsql="SELECT * FROM usuario WHERE nombre_usuario='$this->nombre_usuario';";
	 
     $num=0;	 
	 $result=mysql_query($strsql);//ejecuta la tira sql
	 $num=mysql_num_rows($result);
	 return $num;
	 
}

function incluir()
{

$strsql="INSERT INTO usuario ( nombre_usuario ,pass, id_perfil) VALUES 
	        ('".$this->nombre_usuario."', '".$this->pass."',2);";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
	 
	 
}
function eliminar()
{

$strsql="delete from usuario where nombre_usuario ='$this->nombre_usuario'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	 
}
function modificar()
{

$strsql="update usuario set pass='".$this->pass."',nombre_usuario='".$this->nombre_usuario."' where id_usuario ='$this->id_usuario'";	 
   
	 $result=mysql_query($strsql);//ejecuta la tira sql	
	 
	 
}


}
